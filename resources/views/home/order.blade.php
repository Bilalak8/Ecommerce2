<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      @include('home.css')
      <style>
        .center
        {
            margin: auto;
            width: 100%;
            padding: 30px;
            text-align: center;
        }
        table,th,td{
            border: 1px solid black;
        }
        .th_deg{
            padding: 10px;
            background: skyblue;
            font-size: 20px;
            font-weight: bold;
        }
      </style>
   </head>
   <body>
      
         <!-- header section strats -->
         @include('home.header')
         <div class="center">
            <table>
                <tr class="th_deg">
                    <th>product title</th>
                    <th>Quantity</th>
                    <th>price</th>
                    <th>payment Status</th>
                    <th>Delivery status</th>
                    <th>image</th>
                    <th>Cancel Order</th>
                </tr>
              @foreach ($order as $order)
              <tr>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td>
                    <img width="200px" height="200px" src="/productImage/{{$order->image}}" alt="">
                </td>
                <td>
                    @if ($order->delivery_status=='processing')
                    <a class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">Cancel Order</a>
                       @else
                       <p style="color: blue">Not Allowed</p> 
                    @endif
                </td>

              </tr>
              @endforeach
            </table>

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