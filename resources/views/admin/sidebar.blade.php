<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{asset('admincss/img/b.jpeg')}}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
          <h1 class="h5">Dominic Odida</h1>
          <p>ADMIN</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus-->
      <span class="heading">DASHBOARD</span>
      <ul class="list-unstyled">
              <li class="active"><a href="#"> <i class="icon-home"></i>Home </a></li>
              <li><a href="{{url('view_category') }}"> <i class="icon-grid"></i>Category</a></li>

              <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse">
                 <i class="icon-windows"></i> Product</a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{url('add_product') }}">Add Product</a></li>
                  <li>
                    <a href="{{url('view_product') }}">View Product</a>
                  </li>
                </ul>
              </li>

               <!-- Order Management -->
  <li><a href="{{url('view_orders') }}"> <i class="icon-list"></i>Orders</a></li>

  <!-- Customer Management -->
  <li><a href="{{url('manage_customers') }}"> <i class="icon-user"></i>Customers</a></li>

  <!-- Inventory Management -->
  <li><a href="{{url('inventory') }}"> <i class="icon-box"></i>Inventory</a></li>

  <!-- Reports and Analytics -->
  <li><a href="{{url('reports') }}"> <i class="icon-pie-chart"></i>Reports & Analytics</a></li>

  <!-- Coupons -->
  <li><a href="{{url('coupons') }}"> <i class="icon-tag"></i>Coupons</a></li>

  <!-- Payment Management -->
  <li><a href="{{url('payments') }}"> <i class="icon-credit-card"></i>Payments</a></li>

  <!-- Shipping Management -->
  <li><a href="{{url('shipping') }}"> <i class="icon-truck"></i>Shipping</a></li>

  <!-- Website Settings -->
  <li><a href="{{url('settings') }}"> <i class="icon-cog"></i>Settings</a></li>


      </ul>
    </nav>
