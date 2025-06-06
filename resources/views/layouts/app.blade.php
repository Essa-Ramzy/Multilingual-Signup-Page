<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.user_registration_system') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @if(app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
    @endif
    <style>
        :root {
            --primary: #64748b;
            --primary-light: #94a3b8;
            --primary-dark: #475569;
            --accent: #0ea5e9;
            --accent-light: #38bdf8;
            --accent-dark: #0284c7;
            --background: #f8fafc;
            --card-bg: #ffffff;
            --text: #1e293b; 
            --text-light: #64748b;
            --border: #e2e8f0;
            --success: #16a34a;
            --success-light: #dcfce7;
            --danger: #dc2626;
            --danger-light: #fee2e2;
            --input-bg: #ffffff;
            --input-border: #cbd5e1;
            --input-focus-border: var(--accent-light);
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --primary: #94a3b8;
                --primary-light: #cbd5e1;
                --primary-dark: #e2e8f0;
                --accent: #38bdf8;
                --accent-light: #7dd3fc;
                --accent-dark: #0ea5e9;
                --background: #0f172a; 
                --card-bg: #1e293b; 
                --text: #e2e8f0; 
                --text-light: #94a3b8; 
                --border: #334155; 
                --success: #4ade80; 
                --success-light: #166534;
                --danger: #f87171;
                --danger-light: #991b1b;
                --input-bg: #334155;
                --input-border: #475569;
                --input-focus-border: var(--accent);
                --input-placeholder-color: #94a3b8;
            }

            .form-control::placeholder { /* CSS for placeholder */
                color: var(--input-placeholder-color);
                opacity: 1; /* Override bootstrap's default opacity if any */
            }

            /* For older browsers */
            .form-control::-ms-input-placeholder {
                color: var(--input-placeholder-color);
            }

            .form-control:-ms-input-placeholder {
                color: var(--input-placeholder-color);
            }

            .alert-success {
                color: #dcfce7; /* Lighter green text for dark mode alert */
            }
            .form-control:focus {
                background-color: var(--input-bg); /* Ensure dark background on focus */
                border-color: var(--input-focus-border);
                color: var(--text); /* Ensure text color is correct on focus */
            }

            /* Target Webkit autofill styles for dark mode */
            input:-webkit-autofill,
            input:-webkit-autofill:hover,
            input:-webkit-autofill:focus,
            input:-webkit-autofill:active,
            textarea:-webkit-autofill,
            textarea:-webkit-autofill:hover,
            textarea:-webkit-autofill:focus,
            textarea:-webkit-autofill:active {
                -webkit-box-shadow: 0 0 0 30px var(--input-bg) inset !important;
                box-shadow: 0 0 0 30px var(--input-bg) inset !important;
                -webkit-text-fill-color: var(--text) !important;
                caret-color: var(--text) !important; /* Ensure caret color matches text */
                border-color: var(--input-border) !important; /* Ensure border matches */
                transition: background-color 5000s ease-in-out 0s;
            }

            .navbar-toggler-icon {
                filter: brightness(0) invert(1); /* Makes the icon white in dark mode */
            }

            /* Dark mode for Dropdown Menu */
            .dropdown-menu {
                background-color: var(--card-bg);
                border-color: var(--border);
                box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); /* Standard Bootstrap shadow, can adjust if needed */
            }

            .dropdown-item {
                color: var(--text-light);
            }

            .dropdown-item:hover,
            .dropdown-item:focus {
                color: var(--text);
                background-color: var(--input-bg); /* Using input-bg for a subtle hover, similar to form inputs */
            }

            .dropdown-item.active,
            .dropdown-item:active {
                color: #fff;
                background-color: var(--accent);
            }

            .dropdown-divider {
                border-top: 1px solid var(--border);
            }
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background);
            color: var(--text);
            line-height: 1.7;
            font-weight: 400;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        .header {
            background-color: var(--card-bg);
            padding: 1rem 0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        
        main {
            margin-top: 76px;
            flex: 1;
            display: flex;
            align-items: center;
            padding-bottom: 2rem;
        }
        
        .logo {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text); /* Use primary text color */
        }
        
        .navbar-nav .nav-link {
            color: var(--text-light);
            margin: 0 0.6rem;
            transition: all 0.2s ease;
            font-weight: 500;
            font-size: 0.9rem;
            border-bottom: 2px solid transparent;
            padding: 0.5rem 0.2rem;
        }
        
        .navbar-nav .nav-link:hover {
            color: var(--accent);
            border-bottom: 2px solid var(--accent);
        }
        
        .navbar-nav .nav-link.active {
            color: var(--accent);
            border-bottom: 2px solid var(--accent);
        }
        
        .input-group-text {
            border: 1px solid var(--input-border);
            background-color: var(--card-bg);
            color: var(--text-light);
            border-radius: 0.5rem 0 0 0.5rem;
            border-right: none;
        }
        
        .form-control {
            border: 1px solid var(--input-border);
            background-color: var(--input-bg); /* Use input background variable */
            border-radius: 0 0.5rem 0.5rem 0;
            color: var(--text);
            font-size: 0.9rem;
            padding: 0.6rem 0.75rem;
            box-shadow: none !important;
        }
        
        .form-control:focus {
            border-color: var(--input-focus-border); /* Use input focus border variable */
        }
        
        .form-control.is-invalid,
        .form-control.is-valid {
            width: calc(15.313rem - 1.875em);
        }
        
        .form-control[id*="password"] {
            border-radius: 0 0.5rem 0.5rem 0 !important;
        }
        
        .form-control[id*="password"].is-invalid {
            padding-right: calc(1.75em + 1.75rem);
        }
        
        .input-group {
            flex-wrap: nowrap;
        }
        
        .form-label {
            color: var(--text);
            font-weight: 500;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        
        /* Custom file upload styling */
        .custom-file-upload {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: var(--card-bg);
            border: 1px dashed var(--border);
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 0.5rem;
        }
        
        .file-preview-area {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            margin-bottom: 1rem;
            min-height: 100px;
        }
        
        .file-upload-btn label {
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .file-upload-btn label:hover {
            background-color: var(--accent-light);
            color: var(--card-bg); /* Adjust text color for hover */
            border-color: var(--accent-light);
        }
        
        .img-preview {
            width: 120px;
            height: 120px;
            object-fit: cover;
        }
        
        .btn {
            font-weight: 500;
            padding: 0.6rem 1.5rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            border: none;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--accent) 0%, var(--accent-dark) 100%);
            color: #ffffff; /* Ensure high contrast */
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--accent-dark) 0%, var(--accent) 100%);
            color: #ffffff; /* Ensure high contrast */
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(14, 165, 233, 0.15);
        }
        
        .btn-success {
            background: linear-gradient(135deg, var(--success) 0%, color-mix(in srgb, var(--success) 80%, black)); /* Darken success slightly */
            color: #ffffff; /* Ensure high contrast */
        }
        
        .card {
            border: 1px solid var(--border); /* Add subtle border */
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.03);
            overflow: hidden;
            background-color: var(--card-bg); /* Explicitly set card background */
        }
        
        .card-body {
            padding: 2rem;
            max-width: 46rem;
        }
        
        h2 {
            font-weight: 600;
            color: var(--text); /* Use primary text color */
            margin-bottom: 1.5rem;
        }
        
        .valid-feedback {
            color: var(--success);
        }
        
        .invalid-feedback {
            color: var(--danger);
        }
        
        .alert {
            border: none;
            border-radius: 0.5rem;
            padding: 1rem;
        }
        
        .alert-success {
            background-color: var(--success-light);
            color: color-mix(in srgb, var(--success) 80%, black); /* Ensure readable text */
        }
        
        .alert-danger {
            background-color: var(--danger-light);
            color: color-mix(in srgb, var(--danger) 80%, black); /* Ensure readable text */
        }
        
        #registration-form {
            background-color: transparent;
        }
        
        .form-text {
            color: var(--text-light);
            font-size: 0.8rem;
        }
        
        /* Split design */
        .form-side {
            padding: 0 2rem;
            max-width: 50rem;
        }

            .g-0 {
                max-width: 76.6rem;
            }
        
        .image-side {
            background-color: #1e293b; /* Dark background */
            color: #e2e8f0; /* Light text */
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 2rem;
            border-radius: 1rem 0 0 1rem; /* Keep rounding for light mode */
            position: relative;
            overflow: hidden;
        }
        
        @media (prefers-color-scheme: light) {
            .image-side {
                background: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 100%);
                color: white;
            }
            .image-side::before { /* Only apply image overlay in light mode */
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: url('https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80') center center;
                background-size: cover;
                opacity: 0.15;
                z-index: 0;
            }
        }

        @media (prefers-color-scheme: dark) {
            .image-side {
                border-radius: 0; /* Remove rounding in dark mode if desired */
            }
            .alert-success {
                color: #dcfce7; /* Lighter green text for dark mode alert */
            }
            .alert-danger {
                color: #fee2e2; /* Lighter red text for dark mode alert */
            }
            .card {
                border-radius: 1rem; /* Ensure consistent rounding */
            }
            /* Adjust split view rounding for dark mode */
            .row > .col-lg-6:first-child .card { /* Target form side card */
                border-radius: 1rem; /* Ensure consistent rounding */
            }
            .row > .col-lg-6:last-child { /* Target image side */
                border-radius: 1rem 0 0 1rem; /* Reset rounding for consistency */
            }
        }
        
        .image-side::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80') center center;
            background-size: cover;
            opacity: 0.1; /* Slightly reduce opacity */
            z-index: 0;
            mix-blend-mode: luminosity; /* Blend mode for dark theme */
        }
        
        .image-side-content {
            position: relative;
            z-index: 1;
        }
        
        .image-side h3 {
            font-weight: 700;
            margin-bottom: 1rem;
            color: inherit; /* Inherit color from .image-side */
        }
        
        .image-side p {
            opacity: 0.8;
            font-weight: 300;
            line-height: 1.6;
            color: inherit; /* Inherit color */
        }
        
        .feature-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.5rem;
        }
        
        .feature-icon {
            background-color: color-mix(in srgb, var(--accent) 20%, transparent); /* Use accent with transparency */
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
            color: var(--accent); /* Use accent color for icon */
        }
        
        .feature-text {
            flex-grow: 1;
        }
        
        .feature-text h5 {
            margin-bottom: 0.25rem;
            font-weight: 600;
            font-size: 1rem;
            color: inherit; /* Inherit color */
        }
        
        .feature-text p {
            margin-bottom: 0;
            font-size: 0.85rem;
            opacity: 0.7;
            color: inherit; /* Inherit color */
        }
        
        /* Footer */
        footer {
            background-color: var(--card-bg); /* Use card background */
            color: var(--text);
            padding: 3rem 0 2rem;
            border-top: 1px solid var(--border);
            margin-top: auto; /* Ensures footer stays at bottom */
        }
        
        footer h5 {
            color: var(--text); /* Use primary text color */
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 1.25rem;
        }
        
        footer .link-list {
            list-style: none;
            padding-left: 0;
        }
        
        footer .link-list li {
            margin-bottom: 0.75rem;
        }
        
        footer .link-list a {
            color: var(--text-light);
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 0.9rem;
        }
        
        footer .link-list a:hover {
            color: var(--accent);
        }
        
        footer .social-icons a {
            color: var(--text-light);
            margin-right: 1rem;
            font-size: 1.25rem;
            transition: all 0.2s ease;
        }
        
        footer .social-icons a:hover {
            color: var(--accent);
        }
        
        footer .footer-bottom {
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid var(--border);
            font-size: 0.85rem;
            color: var(--text-light);
        }

        /* Password Toggle Icon */
        .password-toggle-icon {
            position: absolute;
            right: 0.5rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            cursor: pointer;
            color: var(--text-light);
            opacity: 0;
            transition: opacity 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
        }

        .password-toggle-icon:hover {
            color: var(--accent);
        }

        .form-control:focus ~ .password-toggle-icon {
            opacity: 1;
        }

        .input-group:hover .password-toggle-icon {
            opacity: 0.5;
        }
        
        /* Adjust positioning when error is present */
        .is-invalid ~ .password-toggle-icon {
            right: 2rem; /* Move left to avoid overlapping with error icon */
        }
        
        /* Ensure error icons don't overlap with password toggle */
        .is-invalid.form-control::-ms-reveal,
        .is-invalid.form-control::-ms-clear {
            display: none;
        }
    </style>
</head>
<body>
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html> 