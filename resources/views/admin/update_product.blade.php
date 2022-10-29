<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }
        .font_size
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text_color
        {
            color: black;
            padding-bottom: 20x;
        }
        label
        {
            display: inline-block;
            width: 200px;
        }
        .div_design
        {
            padding-bottom: 15px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
      <!-- partial -->
            @include('admin.header')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="div_center">
                        <h2 class="font_size">Update product</h2>


                       <form action="{{url('update_product_confirm', $product->id)}}" method="POST" enctype="multipart/form-data">
                         @csrf
                       <div class="div_design">
                        <label for="title">Product Title :</label>
                        <input class="text_color" type="text" name="title" value="{{$product->title}}" placeholder="write a title" required>
                       </div>

                       <div class="div_design">
                        <label for="description">Product Description :</label>
                        <input class="text_color" type="text" value="{{$product->description}}" name="description" placeholder="write a description" required>
                       </div>

                       <div class="div_design">
                        <label for="price">Product Price :</label>
                        <input class="text_color" type="number" value="{{$product->price}}" name="price" placeholder="write a price" required>
                       </div>

                       <div class="div_design">
                        <label for="title">Discount price :</label>
                        <input class="text_color" type="number" value="{{$product->discount_price}}" name="discount_price" placeholder="write a discount if you have to want">
                       </div>


                       <div class="div_design">
                        <label for="quantity">Product Quantity:</label>
                        <input class="text_color" type="number" value="{{$product->quantity}}" name="quantity" min="0" placeholder="write a quantity" required>
                       </div>

                       <div class="div_design">
                        <label for="title">Product Catagory :</label>
                        <select class="text_color" name="catagory" id="" required>
                            <option value="{{$product->catagory}}" selected>{{$product->catagory}}</option>
                            @foreach ($catagory as $catagory)
                            <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                            @endforeach
                            
                        </select>
                       </div>

                       <div class="div_design">
                        <label for="image">current image Here :</label>
                        <img width="100px" height="100px" style="margin: auto" src="/productImage/{{$product->image}}" alt="">
                       </div>


                       <div class="div_design">
                        <label for="image">change image Here :</label>
                        <input  type="file" name="image">
                       </div>

                       <div class="div_design">
                        <input  type="submit" value="Update Productd" class="btn btn-primary">
                       </div>

                    </form>
                       

                    </div>
                </div>
            </div>
        


        @include('admin.script')
  </body>
</html>