<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }
        h1 {
            color: #fff;
        }
        label {
            display: inline-block;
            width: 200px;
            font-size: 18px!important;
            color: #fff!important;
        }
        input[type="text"] {
            width: 350px;
            height: 50px;
        }
        textarea {
            width: 450px;
            height: 80px;
        }
        .input_deg {
            padding: 15px;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1>Add Product</h1>
                <div class="div_deg">
                    <form action="{{ url('upload_product') }}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="input_deg">
                            <label>Product Title</label>
                            <input type="text" name="title" required>
                        </div>
                        <div class="input_deg">
                            <label>Description</label>
                            <textarea name="description" required></textarea>
                        </div>
                        <div class="input_deg">
                            <label>Price</label>
                            <input type="text" name="price" required>
                        </div>
                        <div class="input_deg">
                            <label>Quantity</label>
                            <input type="number" name="qty" required>
                        </div>
                        <div class="input_deg">
                            <label>Product Category</label>
                            <select name="category" required>
                                <option>Select an Option</option>
                                @foreach($category as $category)
                                    <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input_deg">
                            <label>Product Image</label>
                            <input type="file" name="image">
                        </div>
                        <div class="input_deg">
                            <input class="btn btn-success" type="submit" value="Add Product">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        toastr.options = {
            "closeButton": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
        };

        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
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
