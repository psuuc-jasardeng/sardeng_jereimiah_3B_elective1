<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Profile - Breeze</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

        <!-- Vite Assets -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .gradient-custom {
                background: linear-gradient(to right, #4a4a4a, #2a2a2a);
            }
            .navbar-dark .navbar-brand,
            .navbar-dark .nav-link,
            .navbar-dark .dropdown-item {
                color: #EDEDEC;
                font-family: 'Instrument Sans', sans-serif;
            }
            .navbar-dark .nav-link:hover,
            .navbar-dark .dropdown-item:hover {
                color: #fff;
                background-color: #3E3E3A;
            }
            .navbar-dark .nav-link.active {
                color: #fff;
                font-weight: bold;
            }
            .dropdown-menu {
                background-color: #333;
                border: 1px solid #555;
            }
            .form-outline .form-control {
                background-color: #333;
                color: #fff;
                border: 1px solid #555;
            }
            .form-outline .form-control:focus {
                background-color: #444;
                border-color: #777;
                box-shadow: none;
            }
            .form-label {
                color: #aaa;
                font-size: 0.9rem;
                transition: all 0.2s;
            }
            .text-error {
                color: #f87171;
                font-size: 0.875rem;
                margin-top: 0.25rem;
            }
            .text-success {
                color: #34d399;
                font-size: 0.875rem;
                margin-left: 1rem;
            }
            .card-body, .card-body input, .card-body label, .card-body button, .card-body a, .card-body p {
                font-family: 'Instrument Sans', sans-serif;
            }
        </style>
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-gray-700 w-100">
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand" href="{{ route('dashboard') }}">Breeze</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Navigation Links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                {{ __('Dashboard') }}
                            </a>
                        </li>
                    </ul>

                    <!-- Settings Dropdown -->
                    @auth
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                            {{ __('Profile') }}
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    @endauth
                </div>
            </div>
        </nav>

        <section class="w-100">
            <div class="gradient-custom rounded-lg py-5">
                <div class="d-flex justify-content-center align-items-center flex-column gap-5">
                    <!-- Profile Information -->
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <h2 class="fw-bold mb-2 text-uppercase">{{ __('Profile Information') }}</h2>
                                <p class="text-white-50 mb-5">{{ __("Update your account's profile information and email address.") }}</p>

                                <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                </form>

                                <form method="POST" action="{{ route('profile.update') }}" class="mt-4">
                                    @csrf
                                    @method('PATCH')

                                    <!-- Name -->
                                    <div class="form-outline form-white mb-4 text-start">
                                        <input
                                            type="text"
                                            id="name"
                                            name="name"
                                            class="form-control form-control-lg"
                                            value="{{ old('name', $user->name) }}"
                                            required
                                            autofocus
                                            autocomplete="name"
                                        />
                                        <label class="form-label" for="name">{{ __('Name') }}</label>
                                        @error('name')
                                            <div class="text-error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="form-outline form-white mb-4 text-start">
                                        <input
                                            type="email"
                                            id="email"
                                            name="email"
                                            class="form-control form-control-lg"
                                            value="{{ old('email', $user->email) }}"
                                            required
                                            autocomplete="username"
                                        />
                                        <label class="form-label" for="email">{{ __('Email') }}</label>
                                        @error('email')
                                            <div class="text-error">{{ $message }}</div>
                                        @enderror

                                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                            <div class="text-start mt-2">
                                                <p class="text-sm text-white-50">
                                                    {{ __('Your email address is unverified.') }}
                                                    <button
                                                        form="send-verification"
                                                        class="text-sm text-white-50 hover:underline"
                                                        type="submit"
                                                    >
                                                        {{ __('Click here to re-send the verification email.') }}
                                                    </button>
                                                </p>

                                                @if (session('status') === 'verification-link-sent')
                                                    <p class="mt-2 text-sm text-success">
                                                        {{ __('A new verification link has been sent to your email address.') }}
                                                    </p>
                                                @endif
                                            </div>
                                        @endif
                                    </div>

                                    <div class="d-flex justify-content-end align-items-center mt-4">
                                        <button class="btn btn-outline-light btn-lg px-5" type="submit">
                                            {{ __('Save') }}
                                        </button>
                                        @if (session('status') === 'profile-updated')
                                            <p class="text-success ms-3">{{ __('Saved.') }}</p>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Update Password -->
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <h2 class="fw-bold mb-2 text-uppercase">{{ __('Update Password') }}</h2>
                                <p class="text-white-50 mb-5">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>

                                <form method="POST" action="{{ route('password.update') }}" class="mt-4">
                                    @csrf
                                    @method('PUT')

                                    <!-- Current Password -->
                                    <div class="form-outline form-white mb-4 text-start">
                                        <input
                                            type="password"
                                            id="update_password_current_password"
                                            name="current_password"
                                            class="form-control form-control-lg"
                                            autocomplete="current-password"
                                        />
                                        <label class="form-label" for="update_password_current_password">{{ __('Current Password') }}</label>
                                        @error('current_password', 'updatePassword')
                                            <div class="text-error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- New Password -->
                                    <div class="form-outline form-white mb-4 text-start">
                                        <input
                                            type="password"
                                            id="update_password_password"
                                            name="password"
                                            class="form-control form-control-lg"
                                            autocomplete="new-password"
                                        />
                                        <label class="form-label" for="update_password_password">{{ __('New Password') }}</label>
                                        @error('password', 'updatePassword')
                                            <div class="text-error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="form-outline form-white mb-4 text-start">
                                        <input
                                            type="password"
                                            id="update_password_password_confirmation"
                                            name="password_confirmation"
                                            class="form-control form-control-lg"
                                            autocomplete="new-password"
                                        />
                                        <label class="form-label" for="update_password_password_confirmation">{{ __('Confirm Password') }}</label>
                                        @error('password_confirmation', 'updatePassword')
                                            <div class="text-error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-end align-items-center mt-4">
                                        <button class="btn btn-outline-light btn-lg px-5" type="submit">
                                            {{ __('Save') }}
                                        </button>
                                        @if (session('status') === 'password-updated')
                                            <p class="text-success ms-3">{{ __('Saved.') }}</p>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Account -->
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <h2 class="fw-bold mb-2 text-uppercase">{{ __('Delete Account') }}</h2>
                                <p class="text-white-50 mb-5">
                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                                </p>

                                <button
                                    class="btn btn-danger btn-lg px-5 mb-4"
                                    data-bs-toggle="modal"
                                    data-bs-target="#confirmUserDeletionModal"
                                >
                                    {{ __('Delete Account') }}
                                </button>

                                <!-- Modal for Delete Confirmation -->
                                <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-dark text-white">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmUserDeletionModalLabel">{{ __('Are you sure you want to delete your account?') }}</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-white-50">
                                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                                </p>
                                                <form method="POST" action="{{ route('profile.destroy') }}" class="mt-4">
                                                    @csrf
                                                    @method('DELETE')

                                                    <div class="form-outline form-white mb-4 text-start">
                                                        <input
                                                            type="password"
                                                            id="password"
                                                            name="password"
                                                            class="form-control form-control-lg"
                                                            placeholder="{{ __('Password') }}"
                                                        />
                                                        <label class="form-label" for="password">{{ __('Password') }}</label>
                                                        @error('password', 'userDeletion')
                                                            <div class="text-error">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="d-flex justify-content-end">
                                                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">
                                                            {{ __('Cancel') }}
                                                        </button>
                                                        <button type="submit" class="btn btn-danger">
                                                            {{ __('Delete Account') }}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>