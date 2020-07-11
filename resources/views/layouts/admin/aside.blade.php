<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{URL::to('/')}}/images/{{$setting->logo}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{$setting->site_name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->firstname." ".auth()->user()->lastname}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <!-- menu-open -->

                <li class="nav-item has-treeview ">
                    <a href=" #" class="nav-link">
                        <i class=" nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{__('Category')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class=" nav-item ">
                            <a href="{{ url('/categories') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('Category List')}}</p>
                            </a>
                        </li>
                        <li class=" nav-item ">
                            <a href="{{ url('/sub-categories') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('Subcategory List')}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                 <li class="nav-item has-treeview ">
                    <a href=" #" class="nav-link">
                        <i class=" nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{__('Product')}}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                    {{--  <li class=" nav-item ">
                            <a href="{{ url('/sync-product') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('Sync Now')}}</p>
                            </a>
                        </li>  --}}
                        <li class=" nav-item ">
                            <a href="{{ url('/products') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('Product List')}}</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class=" nav-item ">
                            <a href="{{ url('/orders') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('Orders')}}</p>
                            </a>
                        </li>
                <li class=" nav-item ">
                            <a href="{{ url('/settings') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('Website Setting')}}</p>
                            </a>
                </li>
                <li class=" nav-item ">
                            <a href="{{ url('/users') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('User List')}}</p>
                            </a>
                </li>
                @if(auth()->user()->type==1)

                <li class=" nav-item ">
                            <a href="{{ url('/admins') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('Admin List')}}</p>
                            </a>
                </li>
                 <li class=" nav-item ">
                            <a href="{{ url('/change-password') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{__('Change Password')}}</p>
                            </a>
                </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
