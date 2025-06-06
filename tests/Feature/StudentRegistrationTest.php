<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Mail\NewUserRegistered;
use App\Services\UploadService;
use App\Services\WhatsAppValidationService;

class StudentRegistrationTest extends TestCase
{
  use RefreshDatabase, WithFaker;

  public function setUp(): void
  {
    parent::setUp();
    Storage::fake('public');
    Mail::fake();
  }

  /**
   * Test successful student registration.
   */
  public function test_student_can_register_successfully()
  {
    // Mock the upload service
    $uploadService = $this->createMock(UploadService::class);
    $uploadService->method('uploadImage')
      ->willReturn([
        'success' => true,
        'filename' => 'profile.jpg'
      ]);
    $this->app->instance(UploadService::class, $uploadService);

    // Mock WhatsApp validation service if needed
    $whatsAppService = $this->createMock(WhatsAppValidationService::class);
    $this->app->instance(WhatsAppValidationService::class, $whatsAppService);

    // Simulate WhatsApp validation being successful
    Session::put('whatsapp_validated', true);
    $whatsappNumber = '+201234567890';
    Session::put('validated_whatsapp_number', $whatsappNumber);

    $image = UploadedFile::fake()->image('profile.jpg');

    $password = 'Password123!';

    $response = $this->post(route('registration.submit'), [
      'full_name' => 'Test Student',
      'user_name' => 'teststudent',
      'phone' => '01234567890',
      'whatsapp' => $whatsappNumber,
      'address' => '123 Test Street',
      'email' => 'test@example.com',
      'password' => $password,
      'password_confirmation' => $password,
      'user_image' => $image
    ]);

    // Assert the user was created in the database
    $this->assertDatabaseHas('users', [
      'full_name' => 'Test Student',
      'user_name' => 'teststudent',
      'email' => 'test@example.com',
    ]);

    // Assert the response redirects to success page
    $response->assertRedirect(route('registration.success'));

    // Follow redirect to make sure success message is displayed
    $successResponse = $this->get(route('registration.success'));
    $successResponse->assertSee('Registration successful');

    // Assert that email notification was sent
    Mail::assertSent(NewUserRegistered::class);
  }
}