<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      @include('home.css')
      <style>
        .center
        {
            margin: auto;
            width: 70%;
            text-align: center;
            padding: 30px;  
        }
        table,th,td{
            border: 1px solid gray;
        }
        .th_deg
        {
            font-size: 20px;
            padding: 5px;
            background: skyblue;
        }
        .total_deg
        {
            font-size: 20px;
            padding: 40px;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
                <!-- end header section -->
 

      <div class="center">
        <table >
            <tr>
                <th class="th_deg">Product Title</th>
                <th class="th_deg">Product quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>
            </tr>

            <?php $totalprice = 0; ?>
            @foreach ($cart as $cart)

            <tr>
           <td>{{$cart->product_title}}</td>
           <td>{{$cart->quantity}}</td>
           <td>${{$cart->price}}</td>
           <td>
            <img width="150px" height="150px" src="/productImage/{{$cart->image}}" alt="">
           </td>
           <td>
            <a onclick="return confirm('Are You sure ')" href="{{url('remove_cart',$cart->id)}}" class="btn btn-danger">Remove Product</a>
           </td>
          </tr>
               
          <?php $totalprice = $totalprice + $cart->price; ?>
           @endforeach
        </table>
        <div>
            <h3 class="total_deg">Total price :${{$totalprice}}</h3>
        </div>

        <div>
            <h1 style="font-size: 25px; padding-bottom: 15px">Proceed to Order</h1>
            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash on Delivery</a>
            <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Pay using Card</a>
        </div>

      </div>
     
      <!-- footer start -->
     @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>