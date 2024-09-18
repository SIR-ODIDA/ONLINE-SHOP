<!DOCTYPE html>
<html>
<head>
    @include('home.css')

    <style>
        .div_center {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }
        .detail-box {
            padding: 15px;
        }
    </style>

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    <div class="hero_area">
        <!-- header section starts -->
        @include('home.header')
    </div>
    <!-- end header section -->

    <!-- body section -->
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Latest Products</h2>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="box">
                        <div class="div_center">
                            <img width="400" src="/product/{{$data->image}}" alt="">
                        </div>

                        <div class="detail-box">
                            <h6>{{ $data->title }}</h6>
                            <h6>Price
                                <span>${{ $data->price }}</span>
                            </h6>
                        </div>

                        <div class="detail-box">
                            <h6>Category: {{ $data->category }}</h6>
                            <h6>Available Quantity
                                <span>{{ $data->quantity }}</span>
                            </h6>
                        </div>

                        <div class="detail-box">
                            <p>{{ $data->description }}</p>
                        </div>

                        <div class="detail-box">
                            <form action="{{ url('add_cart', $data->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- body ends -->

    <!-- info section -->
    @include('home.footer')

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    @if(session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: "{{ session('success') }}",
            icon: 'success',
            timer: 5000,
            showConfirmButton: false
        });
    </script>
    @endif

</body>
</html>
