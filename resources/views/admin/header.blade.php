
<header class="header">
    <nav class="navbar navbar-expand-lg">
      <div class="search-panel">
        <div class="search-inner d-flex align-items-center justify-content-center">
          <div class="close-btn">Close <i class="fa fa-close"></i></div>
          <form id="searchForm" action="#">
            <div class="form-group">
              <input type="search" name="search" placeholder="What are you searching for...">
              <button type="submit" class="submit">Search</button>
            </div>
          </form>
        </div>
      </div>
      <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="navbar-header">
          <!-- Navbar Header--><a href="index.html" class="navbar-brand">
            <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Thanks For Shopping </strong><strong>With Us</strong></div>
            <div class="brand-text brand-sm"><strong class="text-primary">T</strong><strong>F</strong><strong>S</strong><strong><strong>W</strong>U</strong> </div></a>
          <!-- Sidebar Toggle Btn-->
          <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
        </div>

          <!-- Log out  -->
          <div class="list-inline-item logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <input type="submit" value="Logout" style="background-color: #ff6b6b; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
            </form>


        </div>
      </div>
    </nav>
  </header>
