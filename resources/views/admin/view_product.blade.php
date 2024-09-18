<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')


    <style type="text/css">
        .div_deg
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 15px;
        }


        .table_deg{
            border: 2px solid greenyellow;
        }

        th{
            background-color:skyblue;
            color: #fff;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
        }

        td{
            border: 1px solid skyblue;
            text-align: center;
            color: #fff
        }

       .div_deg
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 15px;
        }
        input[type='search']
        {
            width: 400px;
            height: 50px;
            margin-left: 50px;
        }
    </style>

     <!-- SweetAlert2 JS -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

     <!-- Toastr JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


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

            <form action="{{url('product_search') }}" method="get">
                <input type="search" name="search" placeholder="Search products...">
                <input type="submit" class="btn btn-secondary" value="Search">
            </form>
            <!--body starts-->
                    <div class="div_deg">
                        <table class="table_deg">
                            <tr>
                                <th>Product Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>


                            @foreach ($product as $products )


                            <tr>
                                <td>{{ $products->title}}</td>

                                <td>{!!Str::limit($products->description,50) !!}</td>

                                <td>{{ $products->category}}</td>

                                <td>{{ $products->price}}</td>

                                <td>{{ $products->quantity}}</td>


                                <td>
                                    <img height="120" width="120" src="product/{{$products->image}}">
                                </td>


                                <td>
                                    <a class="btn btn-danger" href="{{ url('delete_product',$products->id) }}" onclick="return confirmDelete(event)">Delete</a>
                                </td>

                                <td>
                                    <a class="btn btn-success" href="{{url('update_product',$products->id) }}">Edit</a>
                                </td>
                            </tr>

                            @endforeach

                        </table>
                    </div>
                        <div>
                            <div class="div_deg">
                               {{ $product->onEachSide(2)->links() }}
                            </div>
                        </div>

             <!--body ends-->



          </div>
      </div>
    </div>

    <script>
        // Function to display confirmation dialog for deletion
        function confirmDelete(event) {
            event.preventDefault(); // Prevent link default action
            const link = event.currentTarget.href; // Get the link href
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to delete this category?',
                icon: 'warning',
                customClass: {
                    container: 'custom-swal',
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    content: 'custom-swal-text',
                },
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link; // Redirect to the link
                }
            });
        }
    </script>
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
