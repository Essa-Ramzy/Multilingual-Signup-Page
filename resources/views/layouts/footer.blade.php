<footer>
    <div class="container">
        <div class="row gy-3">
            <div class="col-lg-4">
                <h5><i class="bi bi-shield-lock me-2"></i>{{ __('messages.simple_register') }}</h5>
                <p class="mb-3">{{ __('messages.footer_description') }}</p>
                <div class="social-icons">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <h5>{{ __('messages.quick_links') }}</h5>
                <ul class="link-list">
                    <li><a href="{{ route('registration.form') }}"><i class="bi bi-chevron-right me-1"></i> {{ __('messages.home') }}</a></li>
                    <li><a href="#"><i class="bi bi-chevron-right me-1"></i> {{ __('messages.about') }}</a></li>
                    <li><a href="#"><i class="bi bi-chevron-right me-1"></i> {{ __('messages.contact') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4">
                <h5>{{ __('messages.resources') }}</h5>
                <ul class="link-list">
                    <li><a href="#"><i class="bi bi-chevron-right me-1"></i> {{ __('messages.help_center') }}</a></li>
                    <li><a href="#"><i class="bi bi-chevron-right me-1"></i> {{ __('messages.privacy_policy') }}</a></li>
                    <li><a href="#"><i class="bi bi-chevron-right me-1"></i> {{ __('messages.terms_of_service') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4">
                <h5>{{ __('messages.contact_us') }}</h5>
                <ul class="contact-list">
                    <li><i class="bi bi-envelope-fill me-2"></i> {{ __('messages.company_email') }}</li>
                    <li><i class="bi bi-telephone-fill me-2"></i> {{ __('messages.company_phone') }}</li>
                    <li><i class="bi bi-geo-alt-fill me-2"></i> {{ __('messages.company_address') }}</li>
                </ul>
            </div>
        </div>
        <hr class="my-4">
        <div class="text-center">
            <p class="mb-0">&copy; {{ date('Y') }} {{ __('messages.simple_register') }}. {{ __('messages.all_rights_reserved') }}</p>
        </div>
    </div>
</footer> 