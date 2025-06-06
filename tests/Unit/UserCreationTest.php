<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserCreationTest extends TestCase
{
  use RefreshDatabase;

  public function test_user_can_be_created_in_database()
  {
    $userData = [
      'full_name' => 'Test User',
      'user_name' => 'testuser',
      'phone' => '+1234567890',
      'whatsapp' => '+1234567890',
      'address' => '123 Test Street',
      'email' => 'test@example.com',
      'user_image' => 'profile-123456.jpg',
      'password' => Hash::make('Password123!'),
    ];

    $user = User::create($userData);

    // Assert user was created with the correct attributes
    $this->assertDatabaseHas('users', [
      'id' => $user->id,
      'full_name' => 'Test User',
      'user_name' => 'testuser',
      'phone' => '+1234567890',
      'whatsapp' => '+1234567890',
      'address' => '123 Test Street',
      'email' => 'test@example.com',
      'user_image' => 'profile-123456.jpg',
    ]);

    // Assert password was hashed correctly
    $this->assertTrue(Hash::check('Password123!', $user->password));
  }
}