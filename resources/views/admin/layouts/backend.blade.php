<!doctype html>
<html lang="{{ config('app.locale') }}" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <meta name="description" content="{{ config('app.name', 'Shopping') }}">
        <meta name="author" content="Chapter247">
        <meta name="robots" content="noindex, nofollow">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

        <!-- Fonts and Styles -->
        @yield('css_before')

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">

        <link rel="stylesheet" id="css-main" href="{{ mix('/css/codebase/codebase.css') }}">
        <link rel="stylesheet" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}">
        <link rel="stylesheet" id="css-main" href="{{ asset('/css/custom.css') }}">
        <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
    
        @yield('css_after')

        <!-- Scripts -->
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>


    </head>
    <body>
   
        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">
            <!-- Side Overlay-->
            @include('admin.partials.right-sidebar')
      
            @include('admin.partials.left-sidebar')
            <!-- END Sidebar -->

            <!-- Header -->
            @include('admin.partials.header')
            <!-- END Header -->
            
            <!-- alert message add -->
            
              <!-- alert message end -->    
            <!-- Main Container -->
         
            <main id="main-container">
                   
                    <!-- @include('admin.partials.alerts') -->
                
                @yield('content')
            </main>
       
            <!-- END Main Container -->

            <!-- Footer -->
            @include('admin.partials.footer')
            <!-- END Footer -->
        </div>

        <!-- END Page Container -->
        <!-- modal open -->
            @stack('modals')

        <!-- modal open -->
        @routes           
        <!-- Codebase Core JS -->

         <!-- comment modal open -->

         <div class="project-comment-list-modal">

        </div>


        <script src="{{ mix('js/laravel.app.js') }}"></script>
        <script src="{{ asset('js/codebase/codebase.core.js')}}"></script>
        <script src="{{ mix('js/codebase/codebase.app.js') }}"></script>
        <script src="{{ mix('js/validation/parsley-validation.js') }}"></script>
        <!-- sweet alert         -->


        <script src="{{asset('plugins/es6-promise/es6-promise.auto.min.js')}}"></script>
    
        <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
        <script src="{{asset('plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
        <!-- Laravel Scaffolding JS -->
        <script src="{{ mix('js/laravel.app.js') }}"></script>
     
        @yield('js_after')

        @if(\Session::has('status'
        
        
        
        
        
        
        ))
        <script>
        $.notify({
            message: '{{Session::get('message')}}'
        },{
            type: '{{Session::get('status')}}',
            placement: {
                from: "top",
                align: "right"
            }
        });
    </script>
@endif
    </body>
</html>