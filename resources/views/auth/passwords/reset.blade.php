@extends('auth.layouts.simple')

@section('content')


<!-- Page Content -->
<div class="bg-body-dark bg-pattern" style="background-image: {{url('../media/various/bg-pattern-inverse.png')}};">
    <div class="row mx-0 justify-content-center">
        <div class="hero-static col-lg-6 col-xl-4">
            <div class="content content-full overflow-hidden">
                <!-- Header -->
                <div class="py-30 text-center">
                    <a class="link-effect font-w700" href="index.html">
                        <i class="si si-fire"></i>
                        <span class="font-size-xl text-primary-dark">Chapter</span><span class="font-size-xl">247</span>
                    </a>
                    <h1 class="h4 font-w700 mt-30 mb-10">Reset your password here</h1>
                    <h2 class="h5 font-w400 text-muted mb-0"></h2>
                </div>
                <!-- END Header -->

          
                <form class="js-validation-reminder" action="{{ route('password.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="block block-themed block-rounded block-shadow">
                        <div class="block-header bg-gd-primary">
                            <h3 class="block-title">Reset Password</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <!-- <i class="si si-wrench"></i> -->
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="form-group @error('email') is-invalid @enderror row">
                                <div class="col-12">
                                    <label for="reset-email">Email</label>
                                    <input type="email" class="form-control" value="{{ $email ?? old('email') }}" id="reminder-credential" name="email">
                                </div>
                                @error('email')<div class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group @error('password') is-invalid @enderror row">
                                <div class="col-12">
                                    <label for="reset-password">{{ __('Password') }}</label>
                                    <input type="password" id="password" required="" data-parsley-required-message="Password field is rquired"  class="form-control" autocomplete="new-password" id="password" name="password">
                                </div>
                                @error('password')<div class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group @error('password_confirmation') is-invalid @enderror row">
                                <div class="col-12">
                                    <label for="reminder-credential">{{ __('Confirm Password') }}</label>
                                    <input type="password" data-parsley-equalto="#password"	 required="" data-parsley-required-message="Confirm Password should be same as password." class="form-control" value="{{ $email ?? old('email') }}" id="reminder-credential" autocomplete="new-password" name="password_confirmation">
                                </div>
                                @error('password_confirmation')<div class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-alt-primary">
                                   {{ __('Reset Password') }}
                                </button>
                            </div>
                         
                        </div>
                      
                    </div>
                </form>
                <!-- END Reminder Form -->
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection
