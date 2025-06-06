@extends('layouts.app')

@section('content')
<main class="container-fluid py-5 justify-content-center">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="row g-0">
                    <!-- Image Side -->
                    <div class="col-lg-4 d-none d-lg-block image-side">
                        <div class="image-side-content">
                            <h3>{{ __('messages.simple_register') }}</h3>
                            <p>{{ __('messages.create_account') }}</p>
                            
                            <div class="mt-4">
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="bi bi-shield-check"></i>
                                    </div>
                                    <div class="feature-text">
                                        <h5>{{ __('messages.secure_registration') }}</h5>
                                        <p>{{ __('messages.secure_registration_text') }}</p>
                                    </div>
                                </div>
                                
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="bi bi-lightning-charge"></i>
                                    </div>
                                    <div class="feature-text">
                                        <h5>{{ __('messages.quick_process') }}</h5>
                                        <p>{{ __('messages.quick_process_text') }}</p>
                                    </div>
                                </div>
                                
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="bi bi-person-check"></i>
                                    </div>
                                    <div class="feature-text">
                                        <h5>{{ __('messages.verified_users') }}</h5>
                                        <p>{{ __('messages.verified_users_text') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form Side -->
                    <div class="col-lg-8 form-side">
                        <div class="card-body p-4 p-lg-5">
                            <h2 class="text-center mb-4">{{ __('messages.create_account') }}</h2>

                            <form id="registration-form" method="POST" action="{{ route('registration.submit') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                                @csrf

                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="full_name" class="form-label">{{ __('messages.first_name') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                            <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" value="{{ old('full_name') }}" required placeholder="{{ __('messages.john_doe') }}">
                                        </div>
                                        @error('full_name')
                                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="user_name" class="form-label">{{ __('messages.username') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-at"></i></span>
                                            <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="user_name" name="user_name" value="{{ old('user_name') }}" pattern="\w{4,20}" required placeholder="{{ __('messages.username_placeholder') }}">
                                        </div>
                                        <div id="username-feedback" class="@if($errors->has('user_name')) invalid-feedback d-block @elseif(old('user_name')) d-block @else d-none @endif small mt-1">
                                            @if($errors->has('user_name'))
                                                <i class="bi bi-exclamation-circle me-1"></i> {{ $errors->first('user_name') }}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="email" class="form-label">{{ __('messages.email') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required placeholder="{{ __('messages.email_placeholder') }}">
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">{{ __('messages.phone') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" pattern="(\+?2)?01[0-25]\d{8}" required placeholder="{{ __('messages.phone_placeholder') }}">
                                        </div>
                                        @error('phone')
                                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="whatsapp" class="form-label">{{ __('messages.whatsapp') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-whatsapp"></i></span>
                                        <input type="tel" class="form-control @error('whatsapp') is-invalid @enderror" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}" pattern="(\+?2)?01[0-25]\d{8}" required placeholder="{{ __('messages.phone_placeholder') }}">
                                        <button type="button" class="btn btn-primary px-3" onclick="validateWhatsApp()" id="validate-whatsapp-btn">
                                            @if(session('whatsapp_validated') && session('validated_whatsapp_number') == old('whatsapp'))
                                                <i class="bi bi-check me-1"></i> {{ __('messages.validated') }}
                                            @else
                                                {{ __('messages.validate') }}
                                            @endif
                                        </button>
                                    </div>
                                    <div id="whatsapp-validation-result" class="@if(session('whatsapp_validated') && session('validated_whatsapp_number') == old('whatsapp')) valid-feedback d-block @elseif($errors->has('whatsapp')) invalid-feedback d-block @else d-none @endif small mt-1">
                                        @if(session('whatsapp_validated') && session('validated_whatsapp_number') == old('whatsapp'))
                                            <i class="bi bi-check-circle me-1"></i> {{ __('messages.valid_whatsapp') }}
                                        @elseif($errors->has('whatsapp'))
                                            <i class="bi bi-exclamation-circle me-1"></i> {{ $errors->first('whatsapp') }}
                                        @endif
                                    </div>
                                    <input type="hidden" id="whatsapp_validated" name="whatsapp_validated" value="{{ session('whatsapp_validated') ? 'true' : 'false' }}">
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">{{ __('messages.address') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="2" required placeholder="{{ __('messages.address_placeholder') }}">{{ old('address') }}</textarea>
                                    </div>
                                    @error('address')
                                        <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 mb-3 mb-md-0">
                                        <label for="password" class="form-label">{{ __('messages.password') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="{{ __('messages.min_8_chars') }}">
                                            <span class="password-toggle-icon"><i class="bi bi-eye-slash"></i></span>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password_confirmation" class="form-label">{{ __('messages.confirm_password') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required placeholder="{{ __('messages.confirm_password_placeholder') }}">
                                            <span class="password-toggle-icon"><i class="bi bi-eye-slash"></i></span>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="user_image" class="form-label">{{ __('messages.profile_image') }}</label>
                                    <div class="custom-file-upload">
                                        <div class="file-preview-area" id="file-preview">
                                            @if(old('image_data'))
                                                <img src="{{ old('image_data') }}" class="img-preview rounded-circle" alt="Profile Preview">
                                                <p class="mt-2">{{ __('messages.image_selected') }}</p>
                                            @else
                                                <i class="bi bi-person-circle display-4"></i>
                                                <p class="mt-2">{{ __('messages.no_image_selected') }}</p>
                                            @endif
                                        </div>
                                        <div class="file-upload-btn">
                                            <label for="user_image" class="btn btn-outline-primary d-block">
                                                <i class="bi bi-cloud-arrow-up me-2"></i>{{ __('messages.browse_files') }}
                                            </label>
                                            <input type="file" class="d-none @error('user_image') is-invalid @enderror" id="user_image" name="user_image" accept="image/jpeg,image/png" {{ old('image_data') ? '' : 'required' }}>
                                        </div>
                                    </div>
                                    <!-- Hidden input to store the image data -->
                                    <input type="hidden" name="image_data" id="image_data" value="{{ old('image_data') }}">
                                    <div class="form-text mt-1"><i class="bi bi-info-circle me-1"></i> {{ __('messages.upload_image_info') }}</div>
                                    <div id="image-type-error" class="invalid-feedback d-none mt-1"><i class="bi bi-exclamation-circle me-1"></i> {{ __('messages.invalid_image_type') }}</div>
                                    @error('user_image')
                                        <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-primary py-2" id="register-btn">
                                        <i class="bi bi-person-plus me-2"></i> {{ __('messages.register_now') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
<script>
    // Initialize validation status
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', function() {
                setTimeout(() => {
                    var value = this.value;
                    this.value = '';
                    this.value = value;
                }, 0);
            });
        });

        // Reset validation status when WhatsApp number is edited
        const whatsappInput = document.getElementById('whatsapp');
        const validateWhatsappBtn = document.getElementById('validate-whatsapp-btn');
        const whatsappValidationResult = document.getElementById('whatsapp-validation-result');

        @if(session('whatsapp_validated') && session('validated_whatsapp_number') == old('whatsapp'))
            whatsappInput.classList.add('is-valid');
            validateWhatsappBtn.classList.replace('btn-primary', 'btn-success');
        @endif

        
        whatsappInput.addEventListener('input', function() {
            // If the field was previously validated
            if (this.classList.contains('is-valid')) {
                // Reset validation status
                this.classList.remove('is-valid');
                document.getElementById('whatsapp_validated').value = 'false';
                validateWhatsappBtn.innerHTML = '{{ __("messages.validate") }}';
                validateWhatsappBtn.classList.replace('btn-success', 'btn-primary');
                whatsappValidationResult.className = 'd-none small mt-1';
            }
        });

        // Handle file upload preview
        const fileInput = document.getElementById('user_image');
        const previewArea = document.getElementById('file-preview');
        const imageDataInput = document.getElementById('image_data');
        
        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const file = this.files[0];
                const reader = new FileReader();
                
                // Check file type
                const validTypes = ['image/jpeg', 'image/png'];
                if (!validTypes.includes(file.type)) {
                    // Show error message
                    document.getElementById('image-type-error').classList.remove('d-none');
                    document.getElementById('image-type-error').classList.add('d-block');
                    // Reset file input
                    this.value = '';
                    return;
                }
                
                // Hide error message if previously shown
                document.getElementById('image-type-error').classList.add('d-none');
                document.getElementById('image-type-error').classList.remove('d-block');
                
                reader.onload = function(e) {
                    // Create preview element
                    previewArea.innerHTML = `
                        <img src="${e.target.result}" class="img-preview rounded-circle" alt="Profile Preview">
                        <p class="mt-2">${file.name}</p>
                    `;
                    
                    // Store the image data in the hidden input
                    imageDataInput.value = e.target.result;
                }
                
                reader.readAsDataURL(file);
            } else {
                previewArea.innerHTML = `
                    <i class="bi bi-person-circle display-4"></i>
                    <p class="mt-2">{{ __('messages.no_image_selected') }}</p>
                `;
                imageDataInput.value = '';
            }
        });
    });

    // Validate WhatsApp number via AJAX
    function validateWhatsApp() {
        const whatsappNumber = document.getElementById('whatsapp').value;
        const resultDiv = document.getElementById('whatsapp-validation-result');
        const validateBtn = document.getElementById('validate-whatsapp-btn');
        
        if (!whatsappNumber) {
            resultDiv.innerHTML = '<i class="bi bi-exclamation-circle me-1"></i> {{ __("validation.required", ["attribute" => __("validation.attributes.whatsapp")]) }}';
            resultDiv.className = 'invalid-feedback d-block small mt-1';
            return;
        }
        
        // Show loading state
        resultDiv.innerHTML = '<i class="bi bi-arrow-repeat me-1"></i> {{ __("messages.validating_progress") }}';
        resultDiv.className = 'text-info d-block small mt-1';
        validateBtn.disabled = true;
        validateBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> {{ __("messages.validating") }}';
        
        fetch('{{ route("validate.whatsapp") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ whatsapp_number: whatsappNumber })
        })
        .then(response => response.json())
        .then(data => {
            validateBtn.disabled = false;
            
            if (data.valid) {
                resultDiv.innerHTML = '<i class="bi bi-check-circle me-1"></i> ' + data.message;
                resultDiv.className = 'valid-feedback d-block small mt-1';
                document.getElementById('whatsapp').classList.add('is-valid');
                document.getElementById('whatsapp').classList.remove('is-invalid');
                document.getElementById('whatsapp_validated').value = 'true';
                validateBtn.innerHTML = '<i class="bi bi-check me-1"></i> {{ __("messages.validated") }}';
                validateBtn.classList.replace('btn-primary', 'btn-success');
            } else {
                resultDiv.innerHTML = '<i class="bi bi-exclamation-circle me-1"></i> ' + data.message;
                resultDiv.className = 'invalid-feedback d-block small mt-1';
                document.getElementById('whatsapp').classList.add('is-invalid');
                document.getElementById('whatsapp').classList.remove('is-valid');
                document.getElementById('whatsapp_validated').value = 'false';
                validateBtn.innerHTML = '{{ __("messages.validate") }}';
                validateBtn.classList.replace('btn-success', 'btn-primary');
            }
        })
        .catch(error => {
            validateBtn.disabled = false;
            validateBtn.innerHTML = '{{ __("messages.validate") }}';
            resultDiv.innerHTML = '<i class="bi bi-exclamation-triangle me-1"></i> {{ __("messages.error_validating_whatsapp") }}';
            resultDiv.className = 'invalid-feedback d-block small mt-1';
            console.error('Error:', error);
        });
    }
    
    // Check username availability via AJAX
    const usernameField = document.getElementById('user_name');
    const usernameFeedback = document.getElementById('username-feedback');
    
    usernameField.addEventListener('blur', function() {
        const username = this.value;
        
        if (!username.match(/^\w{4,20}$/)) {
            if (username) {
                usernameFeedback.innerHTML = '<i class="bi bi-exclamation-circle me-1"></i> {{ __("validation.custom.user_name.regex") }}';
                usernameFeedback.className = 'invalid-feedback d-block small mt-1';
                usernameField.classList.add('is-invalid');
                usernameField.classList.remove('is-valid');
            }
            return;
        }
        
        usernameFeedback.innerHTML = '<i class="bi bi-arrow-repeat me-1"></i> {{ __("messages.checking_availability") }}';
        usernameFeedback.className = 'text-info d-block small mt-1';
        
        fetch('{{ route("check.username") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ username: username })
        })
        .then(response => response.json())
        .then(data => {
            if (data.valid) {
                usernameFeedback.innerHTML = '<i class="bi bi-check-circle me-1"></i> {{ __("messages.username_available") }}';
                usernameFeedback.className = 'valid-feedback d-block small mt-1';
                usernameField.classList.add('is-valid');
                usernameField.classList.remove('is-invalid');
            } else {
                usernameFeedback.innerHTML = '<i class="bi bi-exclamation-circle me-1"></i> {{ __("validation.unique", ["attribute" => __("validation.attributes.user_name")]) }}';
                usernameFeedback.className = 'invalid-feedback d-block small mt-1';
                usernameField.classList.add('is-invalid');
                usernameField.classList.remove('is-valid');
            }
        })
        .catch(error => {
            usernameFeedback.innerHTML = '<i class="bi bi-exclamation-triangle me-1"></i> {{ __("messages.error_checking_username") }}';
            usernameFeedback.className = 'invalid-feedback d-block small mt-1';
            console.error('Error:', error);
        });
    });

    // Handle password visibility toggle
    document.querySelectorAll('.password-toggle-icon').forEach(icon => {
        icon.addEventListener('click', function() {
            const passwordInput = this.previousElementSibling;
            const iconElement = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                iconElement.classList.replace('bi-eye-slash', 'bi-eye');
            } else {
                passwordInput.type = 'password';
                iconElement.classList.replace('bi-eye', 'bi-eye-slash');
            }
            
            // Keep focus on the input after toggling
            passwordInput.focus();
        });
    });

</script>
@endsection 