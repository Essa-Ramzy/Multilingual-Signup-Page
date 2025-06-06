@extends('layouts.app')

@section('content')
<main>
  <div class="container my-5 py-4">
      <div class="row">
          <div class="col-md-7 mx-auto">
              <div class="card shadow-sm">
                  <div class="card-body text-center py-5 m-auto">
                      <div class="mb-5">
                          <i class="bi bi-check-circle-fill text-success" style="font-size: 5rem;"></i>
                      </div>
                      <h2 class="mb-4">{{ __('messages.registration_success') }}</h2>
                      <p class="lead mb-5">
                          {{ session('success', __('messages.thank_you')) }}
                      </p>
                      <div class="mt-5 mb-3">
                          <a href="{{ route('registration.form') }}" class="btn btn-primary btn-lg">{{ __('messages.back_home') }}</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection 