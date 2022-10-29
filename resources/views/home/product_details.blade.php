<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      @include('home.css')
   </head>
   <body>
     
         <!-- header section strats -->
         @include('home.header')
                <!-- end header section -->
         
      
      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; padding: 30px; width: 50%;">
    
           <div class="img-box" style="padding: 20px">
              <img width="200px" height="200px" src="productImage/{{$product->image}}" alt="">
           </div>
           <div class="detail-box">
              <h5>
                 {{$product->title}}
              </h5>

              @if ($product->discount_price!=null)
              <h6 style="color: red;">
                 Discount Price <br> 
                 ${{$product->discount_price}}
              </h6>
              
              <h6 style="text-decoration: line-through; color: blue">
                 Price <br>
                 ${{$product->price}}
              </h6>
              @else
              
              <h6 style="color: blue;">
                 Price <br>
                 ${{$product->price}}
              </h6>
              @endif

              <h6>Product Catagory : {{$product->catagory}}</h6>
              <h6>Product Description : {{$product->description}}</h6>
              <h6>Available Quantity : {{$product->quantity}}</h6>

              <form action="{{url('add_cart',$product->id)}}" method="POST">
                @csrf

                <div class="row">
                   <div class="col-md-4">
                   <input style="width: 100px" type="number" name="quantity" id="" value="1" min="1">
                   </div>
                   <div class="col-md-4">
                   <input type="submit" name="" id="" value="Add to Cart">
                   </div>
                   
                </div>
               </form>

           </div>
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