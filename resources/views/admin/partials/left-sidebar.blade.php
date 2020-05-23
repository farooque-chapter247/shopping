<nav id="sidebar">
  <!-- Sidebar Content -->
  <div class="sidebar-content">
      <!-- Side Header -->
      <div class="content-header content-header-fullrow px-15">
          <!-- Mini Mode -->
          <div class="content-header-section sidebar-mini-visible-b">
              <!-- Logo -->
              <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                  <span class="text-dual-primary-dark">c</span><span class="text-primary">247</span>
              </span>
              <!-- END Logo -->
          </div>
          <!-- END Mini Mode -->

          <!-- Normal Mode -->
          <div class="content-header-section text-center align-parent sidebar-mini-hidden">
              <!-- Close Sidebar, Visible only on mobile screens -->
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                  <i class="fa fa-times text-danger"></i>
              </button>
              <!-- END Close Sidebar -->

              <!-- Logo -->
              <div class="content-header-item">
                  <a class="link-effect font-w700" href="{{route('dashboard')}}">
                      <i class="si si-fire text-primary"></i>
                      <span class="font-size-xl text-dual-primary-dark">Shopp</span><span class="font-size-xl text-primary">ing</span>
                  </a>
              </div>
              <!-- END Logo -->
          </div>
          <!-- END Normal Mode -->
      </div>
      <!-- END Side Header -->

      <!-- Side User -->
      <div class="content-side content-side-full content-side-user px-10 align-parent">
          <!-- Visible only in mini mode -->
          <div class="sidebar-mini-visible-b align-v animated fadeIn">
              <img class="img-avatar img-avatar32" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
          </div>
          <!-- END Visible only in mini mode -->

          <!-- Visible only in normal mode -->
          <div class="sidebar-mini-hidden-b text-center">
              <a class="img-link" href="javascript:void(0)">
                  <img class="img-avatar" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
              </a>
              <ul class="list-inline mt-10">
                  <li class="list-inline-item">
                      <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="javascript:void(0)">{{auth()->user()->name}}</a>
                  </li>
                  {{--<li class="list-inline-item">
                      <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                      <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)" >
                          <i class="si si-drop"></i>
                      </a>
                  </li> --}}
                  <li class="list-inline-item">
                      <a class="link-effect text-dual-primary-dark" href="javascript:void(0)" onclick="event.preventDefault();
                                        var res = confirmBoxLogout('Are you sure ?',`You will be logged out.`);">
                          <i class="si si-logout"></i>
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </li>
              </ul>
          </div>
          <!-- END Visible only in normal mode -->
      </div>
      <!-- END Side User -->

      <!-- Side Navigation -->
      <div class="content-side content-side-full">
          <ul class="nav-main">
            <li>
                <a class="{{ request()->is('dashboard') ? ' active' : '' }}" href="/dashboard">
                    <i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span>
                </a>
            </li>
          
   

                 <li>        
                  <a class="{{ request()->is('admin/category*') ? ' active' : '' }} {{ request()->is('admin/subcategory*') ? ' active' : '' }}" href="{{route('category')}}">
                      <i class="fa fa-list"></i><span class="sidebar-mini-hide">Category</span>
                  </a>
                </li>
                <li>        
                  <a class="{{ request()->is('admin/product*') ? ' active' : '' }}" href="{{route('product')}}">
                      <i class="fa fa-product-hunt"></i><span class="sidebar-mini-hide">Product</span>
                  </a>
                </li>
                <li>        
                  <a class="{{ request()->is('admin/order*') ? ' active' : '' }}" href="{{route('order')}}">
                      <i class="fa fa-list"></i><span class="sidebar-mini-hide">Order</span>
                  </a>
                </li>
       
          </ul>
      </div>
      <!-- END Side Navigation -->
  </div>
  <!-- Sidebar Content -->
</nav>
