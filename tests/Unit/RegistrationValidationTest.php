<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class RegistrationValidationTest extends TestCase
{
  use RefreshDatabase, WithFaker;

  public function setUp(): void
  {
    parent::setUp();
    Storage::fake('public');
  }

  public function test_registration_validation_rejects_invalid_data()
  {
    $response = $this->post(route('registration.submit'), [
      'full_name' => '',
      'user_name' => 'ab', // Too short
      'phone' => 'not-a-phone',
      'whatsapp' => 'not-a-whatsapp',
      'address' => '',
      'email' => 'not-an-email',
      'password' => 'short', // Too short and missing required characters
      'password_confirmation' => 'different', // Doesn't match
      'user_image' => UploadedFile::fake()->create('document.pdf', 100) // Wrong file type
    ]);

    // Assert the response redirects back with errors
    $response->assertRedirect();
    $response->assertSessionHasErrors([
      'full_name',
      'user_name',
      'phone',
      'whatsapp',
      'address',
      'email',
      'password',
      'user_image'
    ]);
  }

  public function test_registration_requires_whatsapp_validation()
  {
    // Clear any existing session data
    Session::forget(['whatsapp_validated', 'validated_whatsapp_number']);

    $password = 'Password123!';
    $image = UploadedFile::fake()->image('profile.jpg');

    $response = $this->post(route('registration.submit'), [
      'full_name' => 'Test Student',
      'user_name' => 'teststudent',
      'phone' => '+1234567890',
      'whatsapp' => '+1234567890',
      'address' => '123 Test Street',
      'email' => 'test@example.com',
      'password' => $password,
      'password_confirmation' => $password,
      'user_image' => $image
    ]);

    // Assert the response redirects back with WhatsApp validation error
    $response->assertRedirect();
    $response->assertSessionHasErrors('whatsapp');
  }
}