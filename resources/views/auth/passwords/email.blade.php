@extends('auth.layouts.simple')

@section('content')

              <!-- Page Content -->
    <div class="bg-image" style="background-image: url('../media/photos/photo34@2x.jpg');">
        <div class="row mx-0 bg-default-op">
            <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                <div class="p-30 invisible" data-toggle="appear">
                    <p class="font-size-h3 font-w600 text-white">
                        You are awesome! Build something amazing!
                    </p>
                    <p class="font-italic text-white-op">
                        Copyright &copy; <span class="js-year-copy"></span>
                    </p>
                </div>
            </div>
            <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white">
                <div class="content content-full">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Header -->
                    <div class="px-30 py-10">
                        <a class="link-effect font-w700" href="index.html">
                            <i class="si si-fire"></i>
                            <span class="font-size-xl text-primary-dark">Shopp</span><span class="font-size-xl">ing</span>
                        </a>
                        <h1 class="h3 font-w700 mt-30 mb-10">Don’t worry, we’ve got your back</h1>
                        <h2 class="h5 font-w400 text-muted mb-0">Please enter your username or email</h2>
                    </div>
                    <!-- END Header -->

                    <!-- Reminder Form -->
                    <!-- jQuery Validation functionality is initialized with .js-validation-reminder class in js/pages/op_auth_reminder.min.js which was auto compiled from _es6/pages/op_auth_reminder.js -->
                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <form class="js-validation-reminder px-30" data-parsley-validate=""  action="{{ route('password.email') }}" method="post">
                        @csrf
                        <div class="form-group @error('email') is-invalid @enderror row">
                            <div class="col-12">
                                <div class="form-material floating">
                                    <input type="text" class="form-control" required="" data-parsley-required-message="Email Id field is rquired"  id="email" name="email">
                                    <label for="email">Email</label>
                                </div>
                                @error('email')<div class="invalid-feedback animated fadeInDown">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                                <i class="fa fa-asterisk mr-10"></i> Password Reminder
                            </button>
                            <div class="mt-30">
                                <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ route('login') }}">
                                    <i class="fa fa-user text-muted mr-5"></i> Sign In
                                </a>
                            </div>
                        </div>
                    </form>
                    <!-- END Reminder Form -->
                </div>
            </div>
        </div>
    </div>
                <!-- END Page Content -->

@stop

@push('js')


@endpush