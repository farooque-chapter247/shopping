@extends('auth.layouts.simple')

@section('content')
   <!-- Page Content -->
   <div class="bg-image" style="background-image: url('media/photos/photo34@2x.jpg');">
        <div class="row mx-0 bg-black-op">
            <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                <div class="p-30 invisible" data-toggle="appear">
                    <p class="font-size-h3 font-w600 text-white">
                        Get Inspired and Create.
                    </p>
                    <p class="font-italic text-white-op">
                        Copyright &copy; <span class="js-year-copy"></span>
                    </p>
                </div>
            </div>
            <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                <div class="content content-full">
                    <!-- Header -->
                    <div class="px-30 py-10">
                        <a class="link-effect font-w700" href="/">
                            <i class="si si-fire"></i>
                            <span class="font-size-xl text-primary-dark">Shopp</span><span class="font-size-xl">ing</span>
                        </a>
                        <h1 class="h3 font-w700 mt-30 mb-10">Welcome to Your Dashboard</h1>
                        <h2 class="h5 font-w400 text-muted mb-0">Please sign in</h2>
                    </div>
                    <!-- END Header -->

                    <!-- Sign In Form -->
                    <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js -->
                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <form class="js-validation-signin px-30" data-parsley-validate=""  action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group @error('email') is-invalid @enderror row">
                            <div class="col-12">
                                <div class="form-material floating">
                                    <input type="text" class="form-control" required="" data-parsley-required-message="Email Id field is rquired" id="login-username" value="{{ old('email') }}" name="email">
                                    <label for="email">Email</label>
                                </div>
                                @error('email')<div class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="form-group @error('password') is-invalid @enderror row">
                            <div class="col-12">
                                <div class="form-material floating">
                                    <input type="password" class="form-control" id="login-password" required="" data-parsley-required-message="Password field is rquired" name="password" autocomplete="current-password">
                                    <label for="login-password">Password</label>
                                </div>
                                @error('password')<div class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="login-remember-me" name="login-remember-me">
                                    <label class="custom-control-label" for="login-remember-me">Remember Me</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                                <i class="si si-login mr-10"></i> Sign In
                            </button>
                            @if (Route::has('password.request'))
                            <div class="mt-30">
                               
                                <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('password.request') }}">
                                    <i class="fa fa-warning mr-5"></i>  {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                            @endif
                        </div>
                    </form>
                    <!-- END Sign In Form -->
                </div>
            </div>
        </div>
    </div>
                <!-- END Page Content -->
@stop

@push('js')


@endpush
