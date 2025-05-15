<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Register - Breeze</title>

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
            /* Apply Instrument Sans to the register card */
            .card-body, .card-body input, .card-body label, .card-body button, .card-body a {
                font-family: 'Instrument Sans', sans-serif;
            }
        </style>
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    
        <section class="w-full lg:max-w-4xl max-w-[335px]">
            <div class="gradient-custom rounded-lg py-5">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                    <p class="text-white-50 mb-5">Create your account!</p>

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <!-- Name -->
                                        <div class="form-outline form-white mb-4">
                                            <input
                                                type="text"
                                                id="name"
                                                name="name"
                                                class="form-control form-control-lg"
                                                value="{{ old('name') }}"
                                                required
                                                autofocus
                                                autocomplete="name"
                                            />
                                            <label class="form-label" for="name">Name</label>
                                            @error('name')
                                                <div class="text-error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Email Address -->
                                        <div class="form-outline form-white mb-4">
                                            <input
                                                type="email"
                                                id="email"
                                                name="email"
                                                class="form-control form-control-lg"
                                                value="{{ old('email') }}"
                                                required
                                                autocomplete="username"
                                            />
                                            <label class="form-label" for="email">Email</label>
                                            @error('email')
                                                <div class="text-error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Password -->
                                        <div class="form-outline form-white mb-4">
                                            <input
                                                type="password"
                                                id="password"
                                                name="password"
                                                class="form-control form-control-lg"
                                                required
                                                autocomplete="new-password"
                                            />
                                            <label class="form-label" for="password">Password</label>
                                            @error('password')
                                                <div class="text-error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="form-outline form-white mb-4">
                                            <input
                                                type="password"
                                                id="password_confirmation"
                                                name="password_confirmation"
                                                class="form-control form-control-lg"
                                                required
                                                autocomplete="new-password"
                                            />
                                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                                            @error('password_confirmation')
                                                <div class="text-error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="d-flex justify-content-end align-items-center mt-4">
                                            <a
                                                class="text-white-50 text-sm hover:underline me-4"
                                                href="{{ route('login') }}"
                                            >
                                                Already registered?
                                            </a>
                                            <button class="btn btn-outline-light btn-lg px-5" type="submit">
                                                Register
                                            </button>
                                        </div>
                                    </form>
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