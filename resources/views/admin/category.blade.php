<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style>
        input[type='text'] {
            width: 400px;
            height: 50px;
        }
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }
        .table_deg {
            text-align: center;
            margin: auto;
            border-collapse: collapse;
            border: 2px solid yellowgreen;
            margin-top: 50px;
            width: 600px;
        }
        th, td {
            border: 2px solid yellowgreen;
            padding: 10px;
        }
        th {
            background-color: skyblue;
            font-size: 20px;
            font-weight: bold;
            color: #fff;
        }
        td {
            color: #fff;
        }

        /* Custom SweetAlert2 dialog styles */
        .custom-swal {
            font-size: 14px;
        }
        .custom-swal .swal2-popup {
        }
        .custom-swal .swal2-title {
            font-size: 16px;
        }
        .custom-swal .swal2-text {
            font-size: 14px;
        }
    </style>

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
                <h1 style="color:white">Add Category</h1>

                <div class="div_deg">
                    <form id="addCategoryForm" action="{{ url('add_category') }}" method="post">
                        @csrf
                        <div>
                            <input type="text" name="category">
                            <input class="btn btn-primary" type="submit" value="Add Category">
                        </div>
                    </form>
                </div>
                <div>
                    <table class="table_deg">
                        <tr>
                            <th>Category Name</th>
                            <th>Action</th>
                            <th>Edit</th>
                        </tr>
                        @foreach($data as $data)
                        <tr>
                            <td>
                                {{ $data->category_name }}
                            </td>

                            <td>
                                <a class="btn btn-danger" href="{{ url('delete_category',$data->id) }}" onclick="return confirmDelete(event)">Delete</a>
                            </td>

                            <td>
                                <a class="btn btn-success" href="{{url('edit_category',$data->id) }}" >Edit</a>
                           </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <!--body ends-->
            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincssjs/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // Function to display confirmation dialog for saving
        function confirmSave(event) {
            event.preventDefault(); // Prevent form submission
            Swal.fire({
                title: 'Are you sure?',
                text: 'Do you want to add this category?',
                icon: 'question',
                customClass: {
                    container: 'custom-swal',
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    content: 'custom-swal-text',
                },
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('addCategoryForm').submit(); // Submit the form
                }
            });
        }

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

        // Attach the confirmSave function to the form submission
        document.getElementById('addCategoryForm').addEventListener('submit', confirmSave);

        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif

        @if(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif
    </script>
</body>
</html>
