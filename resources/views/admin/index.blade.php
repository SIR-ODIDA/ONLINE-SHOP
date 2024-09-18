<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')

  </head>
  <body>
    <!--header starts-->
     @include('admin.header')
    <!--header Ends-->

      <!--sidebar starts-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->

      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <!--body starts-->
             @include('admin.body')
             <!--body ends-->


          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset ('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{asset ('admincss/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{asset ('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{asset ('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{asset ('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{asset ('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{asset('admincssjs/charts-home.js') }}"></script>
    <script src="{{asset ('admincss/js/front.js') }}"></script>

  </body>
</html>
