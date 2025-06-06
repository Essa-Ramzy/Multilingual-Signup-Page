<?php

namespace App\Http\Controllers;

use App\Mail\NewUserRegistered;
use App\Models\User;
use App\Services\UploadService;
use App\Services\WhatsAppValidationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
  protected $uploadService;
  protected $whatsAppService;

  public function __construct(UploadService $uploadService, WhatsAppValidationService $whatsAppService)
  {
    $this->uploadService = $uploadService;
    $this->whatsAppService = $whatsAppService;
  }

  /**
   * Show the registration form
   */
  public function showRegistrationForm()
  {
    return view('registration.form');
  }

  /**
   * Handle user registration
   */
  public function register(Request $request)
  {
    // Validate form data
    $validator = Validator::make($request->all(), [
      'full_name' => 'required|string|max:100',
      'user_name' => 'required|string|min:4|max:20|regex:/^\w+$/|unique:users',
      'phone' => 'required|string|regex:/^(\+?2)?01[0-25]\d{8}$/',
      'whatsapp' => 'required|string|regex:/^(\+?2)?01[0-25]\d{8}$/',
      'address' => 'required|string',
      'email' => 'required|string|email|max:100',
      'password' => [
        'required',
        'string',
        'min:8',
        'regex:/[0-9]/',
        'regex:/[^A-Za-z0-9]/',
      ],
      'password_confirmation' => 'required|same:password',
      'user_image' => 'required_without:image_data|image|mimes:jpg,jpeg,png|max:5120',
      'image_data' => 'required_without:user_image|string',
    ], [
      'user_name.regex' => __('validation.custom.user_name.regex', ['attribute' => __('validation.attributes.user_name')]),
      'phone.regex' => __('validation.custom.phone.regex', ['attribute' => __('validation.attributes.phone')]),
      'whatsapp.regex' => __('validation.custom.whatsapp.regex', ['attribute' => __('validation.attributes.whatsapp')]),
      'password.regex' => __('validation.custom.password.regex'),
      'password_confirmation.same' => __('validation.custom.password_confirmation.same'),
      'user_image.max' => __('validation.custom.user_image.max', ['max' => 5]),
      'user_image.required_without' => __('validation.custom.user_image.required'),
      'image_data.required_without' => __('validation.custom.user_image.required'),
    ]);

    if ($validator->fails()) {
      return redirect()->back()
        ->withErrors($validator)
        ->withInput($request->except(['password', 'password_confirmation']));
    }

    // Check if WhatsApp number has been validated
    if (
      !Session::has('whatsapp_validated') || Session::get('whatsapp_validated') !== true ||
      Session::get('validated_whatsapp_number') !== $request->whatsapp
    ) {
      return redirect()->back()
        ->withErrors(['whatsapp' => __('validation.custom.whatsapp.not_validated')])
        ->withInput($request->except(['password', 'password_confirmation']));
    }

    // Upload image from file or from base64 data
    if ($request->hasFile('user_image')) {
      $uploadResult = $this->uploadService->uploadImage($request->file('user_image'));
    } else if ($request->filled('image_data')) {
      $uploadResult = $this->uploadService->uploadBase64Image($request->image_data);
    } else {
      return redirect()->back()
        ->withErrors(['user_image' => __('validation.custom.user_image.required')])
        ->withInput($request->except(['password', 'password_confirmation']));
    }

    if (!$uploadResult['success']) {
      return redirect()->back()
        ->withErrors(['user_image' => implode(', ', $uploadResult['errors'])])
        ->withInput($request->except(['password', 'password_confirmation']));
    }

    // Create new user
    $user = User::create([
      'full_name' => $request->full_name,
      'user_name' => $request->user_name,
      'phone' => $request->phone,
      'whatsapp' => $request->whatsapp,
      'address' => $request->address,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'user_image' => $uploadResult['filename'],
    ]);

    // Send notification email
    Mail::to(config('mail.admin_email', 'admin@example.com'))->send(new NewUserRegistered($user));

    // Clear validation session data after successful registration
    Session::forget(['whatsapp_validated', 'validated_whatsapp_number', 'whatsapp_validation_result']);

    return redirect()->route('registration.success')
      ->with('success', 'Registration successful! Your account has been created.');
  }

  /**
   * Show the success page
   */
  public function showSuccess()
  {
    return view('registration.success');
  }

  /**
   * Validate WhatsApp number via AJAX
   */
  public function validateWhatsApp(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'whatsapp_number' => 'required|string|regex:/^(\+?2)?01[0-25]\d{8}$/',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'message' => __('messages.invalid_whatsapp')
      ]);
    }

    $result = $this->whatsAppService->validateNumber($request->whatsapp_number);

    // If validation was successful, store in session
    if ($result['success'] === true && isset($result['valid'])) {
      Session::put('whatsapp_validated', true);
      Session::put('validated_whatsapp_number', $request->whatsapp_number);
      Session::put('whatsapp_validation_result', $result);
    }

    return response()->json($result);
  }

  /**
   * Check if username exists via AJAX
   */
  public function checkUsername(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'username' => 'required|string|min:4|max:20|regex:/^\w+$/',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'valid' => false,
        'message' => __('messages.username_format_error')
      ]);
    }

    $exists = User::where('user_name', $request->username)->exists();

    return response()->json([
      'valid' => !$exists,
      'message' => $exists ? __('messages.username_taken') : __('messages.username_available')
    ]);
  }
}