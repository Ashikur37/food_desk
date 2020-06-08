<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('/')}}admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('/')}}admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
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
              {{__('menu.Medicine')}}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class=" nav-item ">
              <a href="{{ url('/group-names') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{__('menu.GroupName')}}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/manufacturers') }}" class="nav-link  ">
                <i class=" far fa-circle nav-icon"></i>
                <p>{{__('menu.Manufacturer')}}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/medicine-types') }}" class="nav-link  ">
                <i class=" far fa-circle nav-icon"></i>
                <p>{{__('menu.MedicineType')}}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/unit-types') }}" class="nav-link  ">
                <i class=" far fa-circle nav-icon"></i>
                <p>{{__('menu.UnitType')}}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/shelves') }}" class="nav-link  ">
                <i class=" far fa-circle nav-icon"></i>
                <p>{{__('menu.Shelf')}}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ url('/medicines') }}" class="nav-link  ">
                <i class=" far fa-circle nav-icon"></i>
                <p>{{__('menu.Medicine')}}</p>
              </a>
            </li>


          </ul>
        </li>
        <li class="nav-item has-treeview ">
          <a href=" #" class="nav-link">
            <i class=" nav-icon fas fa-tachometer-alt"></i>
            <p>
              {{__('menu.Supplier')}}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class=" nav-item ">
              <a href="{{ url('/suppliers') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{__('menu.Supplier')}}</p>
              </a>
            </li>



          </ul>
        </li>
        <li class="nav-item has-treeview ">
          <a href=" #" class="nav-link">
            <i class=" nav-icon fas fa-tachometer-alt"></i>
            <p>
              {{__('menu.Customer')}}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class=" nav-item ">
              <a href="{{ url('/customers') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{__('menu.Customer')}}</p>
              </a>
            </li>



          </ul>
        </li>
        <li class="nav-item has-treeview ">
          <a href=" #" class="nav-link">
            <i class=" nav-icon fas fa-tachometer-alt"></i>
            <p>
              {{__('menu.Staff')}}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class=" nav-item ">
              <a href="{{ url('/staffs') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{__('menu.Staff')}}</p>
              </a>
            </li>
            <li class=" nav-item ">
                <a href="{{ url('/staff-duties') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('menu.StaffDuty')}}</p>
                </a>
              </li>
              <li class=" nav-item ">
                  <a href="{{ url('/staff-payments') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{__('menu.StaffPayment')}}</p>
                  </a>
                </li>
          </ul>
        </li>
        <li class="nav-item has-treeview ">
          <a href=" #" class="nav-link">
            <i class=" nav-icon fas fa-tachometer-alt"></i>
            <p>
              {{__('menu.Expense')}}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              <li class=" nav-item ">
                  <a href="{{ url('/expense-types') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{__('menu.ExpenseType')}}</p>
                  </a>
                </li>
            <li class=" nav-item ">
              <a href="{{ url('/expenses') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{__('menu.Expense')}}</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview ">
          <a href=" #" class="nav-link">
            <i class=" nav-icon fas fa-tachometer-alt"></i>
            <p>
              {{__('menu.Wastage')}}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class=" nav-item ">
              <a href="{{ url('/wastages') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{__('menu.Wastage')}}</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview ">
            <a href=" #" class="nav-link">
              <i class=" nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{__('menu.User')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class=" nav-item ">
                <a href="{{ url('/users') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('menu.User')}}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview ">
              <a href=" #" class="nav-link">
                <i class=" nav-icon fas fa-tachometer-alt"></i>
                <p>
                  {{__('menu.Note')}}
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class=" nav-item ">
                  <a href="{{ url('/notes') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{__('menu.Note')}}</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview ">
                <a href=" #" class="nav-link">
                  <i class=" nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    {{__('menu.Purchase')}}
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class=" nav-item ">
                    <a href="{{ url('/supplier-orders') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>{{__('menu.Purchase')}}</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview ">
                  <a href=" #" class="nav-link">
                    <i class=" nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      {{__('menu.Sale')}}
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class=" nav-item ">
                      <a href="{{ url('/customer-orders') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{__('menu.Sale')}}</p>
                      </a>
                    </li>
                  </ul>
                </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>