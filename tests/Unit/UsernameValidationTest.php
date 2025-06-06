<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsernameValidationTest extends TestCase
{
  use RefreshDatabase;

  public function test_username_validation_endpoint_with_unique_username()
  {
    // Make the request with a unique username
    $response = $this->postJson(route('check.username'), [
      'username' => 'uniqueusername123'
    ]);

    // Assert response is successful and contains expected data
    $response->assertStatus(200)
      ->assertJson([
        'valid' => true,
        'message' => __('messages.username_available')
      ]);
  }

  public function test_username_validation_endpoint_with_existing_username()
  {
    // Create a user with the username we'll test
    User::factory()->create([
      'user_name' => 'existinguser'
    ]);

    // Make the request with the existing username
    $response = $this->postJson(route('check.username'), [
      'username' => 'existinguser'
    ]);

    // Assert response shows username is not available
    $response->assertStatus(200)
      ->assertJson([
        'valid' => false,
        'message' => __('messages.username_taken')
      ]);
  }
}