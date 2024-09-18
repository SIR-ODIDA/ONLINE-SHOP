<!DOCTYPE html>
<html>

<head>
 @include('home.css')

 <style>
    .div_deg
    {
        display:flex;
        justify-content: center;
        align-items: center;
        margin: 60px;
    }
    table{
        border: 2px solid black;
        text-align: center;
        width: 900px;
    }

    th{
        border: 2px solid black;
        text-align: center;
        color: #fff;
        font: 20px;
        font-weight: bold;
        background-color: grey;
    }

    td{
        border: solid skyblue;

    }

    .cart_value{
        text-align: center;
        margin-bottom: 70px;
        font-weight: bold;
        padding: 18px
    }

    label {
    display: inline-block;
    width: 150px;
    vertical-align: top;
}



label {
    display: inline-block;
    width: 150px;
    vertical-align: top;
}

.div_gap {
    margin-bottom: 20px;
}

input[type="text"], textarea {
    width: 350px;
    padding: 10px;
    margin-bottom: 10px;
}

textarea {
    height: 150px;
}

.order_deg {
    padding-right: 100px;
    margin-top: -150px;
}

.btn {
    display: inline-block;
    margin-top: 20px;
}

 </style>

</head>

<body>
  <div class="hero_area">

    <!-- header section strats -->
           @include('home.header')
    <!-- end header section -->
  </div>


    <div class="div_deg">


      <div class="order_deg">
        <form action="">
            <div>
                <label>Receiver Name</label>

                <input type="text" name="name" value="{{ Auth::user()->name }}">
            </div>

            <div class="div_gap">
                <label>Receiver Address</label>

                <textarea name="address">{{ Auth::user()->address }}</textarea>
            </div>

            <div class="div_gap">
                <label>Receiver Phone</label>

                <input type="text" name="phone" value="{{ Auth::user()->phone }}">
            </div>


            <div class="div_gap">
                <input class="btn btn-primary" type=" submit" value="placeholder">
            </div>
        </form>
      </div>

        <table>
            <tr>
                <th>Product Title</th>

                <th>Price</th>

                <th>Image</th>

                <th>Action</th>
            </tr>

            <?php
                     $value=0;
            ?>

            @foreach($cart as $cart)
            <tr>
                <td>{{ $cart->product->title }}</td>
                <td>${{ $cart->product->price }}</td>
                <td>
                    <img width="150px" src="/product/{{ $cart->product->image }}" >
                </td>

                <td>
                    <form action="" method="POST" onsubmit="return confirm('Are you sure you want to remove this item from your cart?');">

                        @csrf

                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>

            <?php

              $value = $value + $cart->product->price;
            ?>
            @endforeach
        </table>
    </div>


<div class="cart_value">

   <h3>Total value of Cart is:  ${{ $value }}</h3>
</div>

  <!-- info section -->

         @include('home.footer')

</body>

</html>
