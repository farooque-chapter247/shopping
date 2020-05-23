<link rel="stylesheet" id="css-main" href="{{ asset('/css/header.css') }}">
<div class="header">
  <!-- <a href="{{route('front')}}" class="logo"><img src="{{asset('media/logo/logo.jpeg')}}" height="50px" ></a> -->
    <div class="header-right">
  
        <a class="{{ request()->is('/') ? ' active' : '' }}" href="{{route('front')}}"><i class="fa fa-home"></i></a>
        <a class="{{ request()->is('cart/detail') ? ' active' : '' }}" href="{{route('cart.detail')}}"><i class="fa fa-shopping-cart"><strong><sup class="text-danger"> @if(Cart::count()!=0) {{ Cart::count() }} @endif </sup></strong></i></a>
        @guest
            <a class="" href="{{route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
            @else
            <a class="{{ request()->is('order/myorder') ? 'active' : '' }}" href="{{route('order.myorder')}}"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
            <a class="" href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                        </form>
        @endguest   
    </div>
</div>



   
