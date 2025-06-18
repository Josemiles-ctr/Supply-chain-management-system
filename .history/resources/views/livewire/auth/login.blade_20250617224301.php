<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h3 class="card-title mb-2 text-center">{{ __('Log in to your account') }}</h3>
                    <p class="text-muted text-center mb-4">{{ __('Enter your email and password below to log in') }}</p>

                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="alert alert-info text-center mb-4">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form wire:submit.prevent="login" aria-label="{{ __('Login Form') }}">
                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email address') }}</label>
                            <input
                                wire:model="email"
                                type="email"
                                class="form-control"
                                id="email"
                                required
                                autofocus
                                autocomplete="email"
                                placeholder="email@example.com"
                                aria-describedby="emailHelp"
                            >
                        </div>

                        <!-- Password -->
                        <div class="mb-3 position-relative">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input
                                wire:model="password"
                                type="password"
                                class="form-control"
                                id="password"
                                required
                                autocomplete="current-password"
                                placeholder="{{ __('Password') }}"
                            >
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="position-absolute end-0 top-0 mt-2 me-2 small">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>

                        <!-- Remember Me -->
                        <div class="mb-3 form-check">
                            <input
                                wire:model="remember"
                                type="checkbox"
                                class="form-check-input"
                                id="remember"
                            >
                            <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>
                        </div>
                    </form>

                    @if (Route::has('register'))
                        <div class="text-center mt-4 text-muted small">
                            {{ __("Don't have an account?") }}
                            <a href="{{ route('register') }}">{{ __('Sign up') }}</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
