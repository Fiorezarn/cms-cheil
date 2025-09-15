@extends('layouts.app')

@section('content')
    <div class="min-vh-100 d-flex align-items-center bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-body p-5">
                            <!-- Header Section -->
                            <div class="text-center mb-4">
                                <div class="mb-3">
                                    <i class="fas fa-user-plus text-success" style="font-size: 3rem;"></i>
                                </div>
                                <h3 class="fw-bold text-dark mb-2">Create Account</h3>
                                <p class="text-muted">Join us and start your journey</p>
                            </div>

                            <!-- Register Form -->
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Name Field -->
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-semibold text-dark">
                                        <i class="fas fa-user me-2 text-success"></i>{{ __('Full Name') }}
                                    </label>
                                    <input id="name" type="text"
                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Enter your full name">

                                    @error('name')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <!-- Email Field -->
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-semibold text-dark">
                                        <i class="fas fa-envelope me-2 text-success"></i>{{ __('Email Address') }}
                                    </label>
                                    <input id="email" type="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Enter your email address">

                                    @error('email')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <!-- Password Fields Row -->
                                <div class="row">
                                    <!-- Password Field -->
                                    <div class="col-md-6 mb-4">
                                        <label for="password" class="form-label fw-semibold text-dark">
                                            <i class="fas fa-lock me-2 text-success"></i>{{ __('Password') }}
                                        </label>
                                        <input id="password" type="password"
                                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password"
                                            placeholder="Create password">

                                        @error('password')
                                            <div class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <!-- Confirm Password Field -->
                                    <div class="col-md-6 mb-4">
                                        <label for="password-confirm" class="form-label fw-semibold text-dark">
                                            <i class="fas fa-lock me-2 text-success"></i>{{ __('Confirm Password') }}
                                        </label>
                                        <input id="password-confirm" type="password" class="form-control form-control-lg"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Confirm password">
                                    </div>
                                </div>

                                <!-- Password Requirements -->
                                <div class="mb-4">
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        Password should be at least 8 characters long and contain letters and numbers.
                                    </small>
                                </div>

                                <!-- Register Button -->
                                <div class="d-grid mb-4">
                                    <button type="submit" class="btn btn-success btn-lg py-3 fw-semibold">
                                        <i class="fas fa-user-plus me-2"></i>{{ __('Create Account') }}
                                    </button>
                                </div>

                                <!-- Login Link -->
                                <div class="text-center">
                                    <p class="text-muted mb-0">
                                        Already have an account?
                                        <a href="{{ route('login') }}"
                                            class="text-success text-decoration-none fw-semibold">
                                            Sign In Here
                                        </a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important;
        }

        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.15);
        }

        .btn-success {
            background: linear-gradient(135deg, #52c234 0%, #398e3d 100%);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background: linear-gradient(135deg, #449d2e 0%, #2d7a32 100%);
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, .15);
        }

        .row .col-md-6 {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }
    </style>
@endsection
