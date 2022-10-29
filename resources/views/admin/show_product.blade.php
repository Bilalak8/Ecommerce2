<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .center
        {
            margin: auto;
            width: 70%;
            border: 2px solid white;
            margin-top: 40px;
        }
        .font_size
        {
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }
        .th_color
        {
            background-color: skyblue;
        }
        .th_deg
        {
            padding: 30px;
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
                    <h2 class="font_size"> All product</h2>
                    <table class="center">
                        <tr class="th_color">
                            <th class="th_deg">Product Title</th>
                            <th class="th_deg">Description</th>
                            <th class="th_deg">Quantity</th>
                            <th class="th_deg">Catagory</th>
                            <th class="th_deg">Price</th>
                            <th class="th_deg">Discount price</th>
                            <th class="th_deg">Product image</th>
                            <th class="th_deg">Delete</th>
                            <th class="th_deg">Edit</th>
                        </tr>
                        <tr>
                          @foreach ($product as $product)
                          <td>{{$product->title}}</td>
                          <td>{{$product->description}}</td>
                          <td>{{$product->quantity}}</td>
                          <td>{{$product->catagory}}</td>
                          <td>{{$product->price}}</td>
                          <td>{{$product->discount_price}}</td>

                          <td>
                              <img width="150px" height="150px" src="productImage/{{$product->image}}" alt="">
                          </td>

                          <td>
                            <a onclick="return confirm('Are u sure!')" class="btn btn-danger" href="{{url('delete_product',$product->id)}}">Delete</a>
                          </td>

                          <td>
                            <a href="{{url('update_product',$product->id)}}" class="btn btn-success">Edit</a>
                          </td>

                      </tr>
                              
                          @endforeach
                    </table>

                </div>
            </div>

        @include('admin.script')
  </body>
</html>