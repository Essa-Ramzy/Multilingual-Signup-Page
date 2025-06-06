<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class WhatsAppValidationService
{
  protected $apiKey;
  protected $apiHost;

  public function __construct()
  {
    $this->apiKey = config('whatsapp.rapidapi_key');
    $this->apiHost = config('whatsapp.rapidapi_host');
  }

  /**
   * Validates if a number is a valid WhatsApp number
   *
   * @param string $phoneNumber The phone number to validate
   * @return array Response array with 'success', 'valid', and 'message' keys
   */
  public function validateNumber($phoneNumber)
  {
    if (Session::has('whatsapp_validated') && Session::get('validated_whatsapp_number') === $phoneNumber) {
      return Session::get('whatsapp_validation_result');
    }

    if (empty($phoneNumber)) {
      return [
        'success' => false,
        'message' => 'Please enter a WhatsApp number to validate'
      ];
    }

    // Format phone number - remove + if present
    $phoneNumber = trim($phoneNumber);
    if (str_starts_with($phoneNumber, '+')) {
      $phoneNumber = substr($phoneNumber, 1);
    }

    if (strlen($phoneNumber) === 11) {
      $phoneNumber = '2' . $phoneNumber;
    }

    // Basic validation first (to avoid unnecessary API calls)
    if (!preg_match('/^201[0-25]\d{8}$/', $phoneNumber)) {
      return [
        'success' => false,
        'message' => 'Please enter a valid phone number (e.g. +201234567890)'
      ];
    }


    try {
      $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'x-rapidapi-host' => $this->apiHost,
        'x-rapidapi-key' => $this->apiKey
      ])->post("https://{$this->apiHost}/WhatsappNumberHasItWithToken", [
            'phone_number' => $phoneNumber
          ]);

      if ($response->successful()) {
        $responseData = $response->json();

        if (isset($responseData['status']) && $responseData['status'] === 'valid') {
          return [
            'success' => true,
            'message' => 'Valid WhatsApp Number',
            'valid' => true
          ];
        } else {
          return [
            'success' => true,
            'message' => 'Invalid WhatsApp Number',
            'valid' => false
          ];
        }
      } else {
        // API failed, provide fallback validation
        return [
          'success' => false,
          'message' => 'Number format is valid (API validation failed)',
        ];
      }
    } catch (_) {
      // API call exception, provide fallback validation
      return [
        'success' => false,
        'message' => 'Number format is valid (API validation failed)'
      ];
    }
  }
}