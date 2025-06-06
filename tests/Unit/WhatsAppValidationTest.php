<?php

namespace Tests\Feature;

use App\Services\WhatsAppValidationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class WhatsAppValidationTest extends TestCase
{
  use RefreshDatabase, WithFaker;

  public function test_whatsapp_validation_endpoint()
  {
    // Mock the WhatsApp validation service
    $mockService = $this->createMock(WhatsAppValidationService::class);
    $mockService->method('validateNumber')
      ->with('+201234567890')
      ->willReturn([
        'success' => true,
        'valid' => true,
        'message' => 'WhatsApp number is valid'
      ]);

    $this->app->instance(WhatsAppValidationService::class, $mockService);

    // Make the request to validate WhatsApp
    $response = $this->postJson(route('validate.whatsapp'), [
      'whatsapp_number' => '+201234567890'
    ]);

    // Assert response is successful and contains expected data
    $response->assertStatus(200)
      ->assertJson([
        'success' => true,
        'valid' => true
      ]);

    // Assert that validation result was stored in session
    $this->assertTrue(Session::has('whatsapp_validated'));
    $this->assertEquals('+201234567890', Session::get('validated_whatsapp_number'));
  }
}