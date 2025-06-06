# Simple User Registration System

A Laravel-based web application that provides a user registration system. It includes features like profile image upload, WhatsApp number validation via an external API, real-time username availability check, and email notifications for new registrations. The application supports localization for English and Arabic.

## Table of Contents

- [Features](#features)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Running the Application](#running-the-application)
- [Running Tests](#running-tests)
- [Demo](#demo)

## Features

-   **User Registration:** Comprehensive user details including Full Name, Username, Email, Phone, WhatsApp, Address, and Profile Image.
-   **Profile Image Upload:**
    -   Direct file upload.
    -   Base64 encoded image upload (e.g., from a cropping tool).
    -   Configuration in [`config/upload.php`](config/upload.php).
-   **WhatsApp Number Validation:**
    -   Integrates with a third-party API (RapidAPI) via [`App\Services\WhatsAppValidationService`](app/Services/WhatsAppValidationService.php).
    -   Configuration in [`config/whatsapp.php`](config/whatsapp.php).
    -   Caches validation results in the session to avoid redundant API calls.
-   **Real-time Username Availability Check:**
    -   AJAX-based validation (see [`checkUsername` in `RegistrationController`](app/Http/Controllers/RegistrationController.php)).
-   **Email Notifications:**
    -   Sends an email to the admin (configured via `MAIL_ADMIN_EMAIL` in [`.env`](.env)) upon new user registration using [`App\Mail\NewUserRegistered`](app/Mail/NewUserRegistered.php).
-   **Localization:**
    -   Supports English (`en`) and Arabic (`ar`). Language files in `lang/en` and `lang/ar`.
    -   Language can be switched via [`LanguageController`](app/Http/Controllers/LanguageController.php).
    -   UI adapts to Right-to-Left (RTL) for Arabic (see [`public/css/rtl.css`](public/css/rtl.css)).
    -   Middleware for localization: [`App\Http\Middleware\Localization`](app/Http/Middleware/Localization.php).
-   **Input Validation:**
    -   Robust server-side validation in [`RegistrationController`](app/Http/Controllers/RegistrationController.php).
    -   Client-side feedback.
-   **Secure Password Handling:**
    -   Passwords are securely hashed using BCRYPT (see [`App\Models\User`](app/Models/User.php)).
-   **Database:**
    -   Migrations for `users`, `password_reset_tokens`, and `sessions` tables (see [`database/migrations/0001_01_01_000000_create_users_table.php`](database/migrations/0001_01_01_000000_create_users_table.php)).
    -   User factory for test data: [`Database\Factories\UserFactory`](database/factories/UserFactory.php).
-   **Testing:**
    -   Comprehensive unit and feature tests in the `tests/` directory.
    -   Includes tests for user creation ([`UserCreationTest`](tests/Unit/UserCreationTest.php)), registration validation ([`RegistrationValidationTest`](tests/Unit/RegistrationValidationTest.php)), WhatsApp validation ([`WhatsAppValidationTest`](tests/Unit/WhatsAppValidationTest.php)), username validation ([`UsernameValidationTest`](tests/Unit/UsernameValidationTest.php)), and the full registration flow ([`StudentRegistrationTest`](tests/Feature/StudentRegistrationTest.php)).

## Prerequisites

-   PHP >= 8.2
-   Composer
-   Node.js & npm (for frontend asset compilation if customized)
-   A web server (e.g., Nginx, Apache) or use `php artisan serve`
-   A database (SQLite is configured by default for local development)

## Installation

1.  **Clone the repository:**
    ```bash
    git clone <your-repository-url>
    cd <project-directory>
    ```
2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```
3.  **Install NPM dependencies and build assets (if needed):**
    ```bash
    npm install
    npm run dev # or npm run build
    ```
4.  **Create a copy of the `.env` file:**
    ```bash
    cp .env.example .env
    ```
5.  **Generate an application key:**
    ```bash
    php artisan key:generate
    ```
6.  **Configure your [`.env`](.env) file:**
    -   Set up your database connection (defaults to SQLite).
    -   Configure mail settings (e.g., `MAIL_MAILER`, `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAIL_FROM_ADDRESS`, `MAIL_ADMIN_EMAIL`).
    -   Set `RAPIDAPI_KEY` and `RAPIDAPI_HOST` for WhatsApp validation (see [`config/whatsapp.php`](config/whatsapp.php)).
7.  **Run database migrations:**
    (The `post-create-project-cmd` in [`composer.json`](composer.json) attempts to create `database/database.sqlite` and run migrations.)
    ```bash
    php artisan migrate
    ```

## Configuration

Key variables in your [`.env`](.env) file:

-   `APP_NAME`: Your application name (Default: Laravel).
-   `APP_ENV`: `local` for development, `production` for live.
-   `APP_DEBUG`: `true` for development, `false` for production.
-   `APP_URL`: Base URL of your application (Default: `http://localhost`).

-   **Database Connection (`DB_*` variables):**
    -   `DB_CONNECTION`: `sqlite` (default), `mysql`, `pgsql`, etc.
    -   For `sqlite`, ensure `database/database.sqlite` exists or is writable.
    -   For other drivers, configure `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`.

-   **Mail Configuration (`MAIL_*` variables):**
    -   `MAIL_MAILER`: `smtp`, `log`, etc.
    -   `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAIL_ENCRYPTION`.
    -   `MAIL_FROM_ADDRESS`: Email address for outgoing emails.
    -   `MAIL_FROM_NAME`: Sender name.
    -   `MAIL_ADMIN_EMAIL`: Admin email for notifications (e.g., `essa.ramzy123@gmail.com`).

-   **WhatsApp Validation API:**
    -   `RAPIDAPI_KEY`: Your API key from RapidAPI.
    -   `RAPIDAPI_HOST`: API host (Default: `whatsapp-number-validator3.p.rapidapi.com`).

## Running the Application

**Start the development server:**
    ```bash
    php artisan serve
    ```
    The application will typically be available at `http://127.0.0.1:8000`.

## Running Tests

Execute the test suite using:
```bash
php artisan test
```
Or via the composer script:
```bash
composer test
```
Tests are configured in phpunit.xml and located in Unit and Feature.

## Demo

