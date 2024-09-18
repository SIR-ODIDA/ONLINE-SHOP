<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
     <style>
        .div_deg{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        label{
            display: inline-block;
            width: 200px;
            padding: 20px;
        }
        textarea{
            width: 450px;
            height: 100px;
        }
        input[type='text']
        {
            width: 300px;
            height: 60px;
        }
     </style>
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
         <h2>Update Products</h2>

         <div class="div_deg">
            <form action="{{ url('edit_product', $data->id) }}" method="post" enctype="multipart/form-data">

                @csrf

                <div>
                    <label>Title</label>
                    <input type="text" name="title" value="{{$data->title}}">
                </div>

                <div>
                    <label>Description</label>
                     <textarea name="description">{{$data->description}}</textarea>
                </div>

                <div>
                    <label>Price</label>
                    <input type="text" name="price" value="{{$data->price}}">
                </div>

                <div>
                    <label>Quantity</label>
                    <input type="number" name="quantity" value="{{$data->quantity}}">
                </div>

                <div>
                    <label>Category</label>
                     <select name="category">
                        <option value="{{$data->category}}">{{ $data->category }}</option>

                        @foreach($categories as $cate)

                        <option value="{{ $cate->category_name }}">{{ $cate->category_name }}</option>

                        @endforeach
                     </select>
                </div>

                <div>
                    <label>Current Image</label>
                    <img width:150 src="/product/{{$data->image}}">

                </div>

                <div class="input_deg">
                    <label>New Image</label>
                    <input type="file" name="image">
                </div>

                <div>
                    <input class="btn btn-success" type="submit" value="Update Product">
                </div>

            </form>
         </div>
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
