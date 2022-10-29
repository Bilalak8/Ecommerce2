<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
        


          <br>
          <div>
            <form action="{{url('search_product')}}" method="GET">
               @csrf
               <input style="width: 500px;" type="text" name="search" placeholder="Write something here..." id="">
               <input type="submit" value="search">
            </form>
          </div>

       </div>
       <div class="row">
        @foreach ($product as $products)
             
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{url('product_details',$products->id)}}" class="option1">
                     Product details
                     </a>

                    <form action="{{url('add_cart',$products->id)}}" method="POST">
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
               <div class="img-box">
                  <img src="productImage/{{$products->image}}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     {{$products->title}}
                  </h5>

                  @if ($products->discount_price!=null)
                  <h6 style="color: red;">
                     Discount Price <br> 
                     ${{$products->discount_price}}
                  </h6>
                  
                  <h6 style="text-decoration: line-through; color: blue">
                     Price <br>
                     ${{$products->price}}
                  </h6>
                  @else
                  
                  <h6 style="color: blue;">
                     Price <br>
                     ${{$products->price}}
                  </h6>
                  @endif
               </div>
            </div>
         </div>
        @endforeach

        {{-- <span style="padding: 20px; margin: auto">
         {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
      </span> --}}
      
    </div>
 </section>