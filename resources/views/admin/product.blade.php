<!DOCTYPE html>
<html lang="en">
  <head>
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
                        <h2 class="font_size">Add product</h2>


                       <form action="{{url('add_product')}}" method="POST" enctype="multipart/form-data">
                         @csrf
                       <div class="div_design">
                        <label for="title">Product Title :</label>
                        <input class="text_color" type="text" name="title" placeholder="write a title" required>
                       </div>

                       <div class="div_design">
                        <label for="description">Product Description :</label>
                        <input class="text_color" type="text" name="description" placeholder="write a description" required>
                       </div>

                       <div class="div_design">
                        <label for="price">Product Price :</label>
                        <input class="text_color" type="number" name="price" placeholder="write a price" required>
                       </div>

                       <div class="div_design">
                        <label for="title">Discount price :</label>
                        <input class="text_color" type="number" name="discount_price" placeholder="write a discount if you have to want">
                       </div>


                       <div class="div_design">
                        <label for="quantity">Product Quantity:</label>
                        <input class="text_color" type="number" name="quantity" min="0" placeholder="write a quantity" required>
                       </div>

                       <div class="div_design">
                        <label for="title">Product Catagory :</label>
                        <select class="text_color" name="catagory" id="" required>
                            <option value="" selected>Add Catagory here</option>
                            @foreach ($catagory as $catagory)
                            <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                            @endforeach
                            
                        </select>
                       </div>

                       <div class="div_design">
                        <label for="image">Product image Here :</label>
                        <input  type="file" name="image" required>
                       </div>

                       <div class="div_design">
                        <input  type="submit" value="Add Productd" class="btn btn-primary">
                       </div>

                    </form>
                       

                    </div>
                </div>
            </div>
        


        @include('admin.script')
  </body>
</html>