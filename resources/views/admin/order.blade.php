<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .title_deg
        {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 40px;
        }
        .table_deg
        {
            border: 2px solid white;
            width: 100%;
            margin: auto;
            text-align: center;
        }
        .th_deg
        {
            background: skyblue;
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
                    <h1 class="title_deg">All Orders</h1>

                    <div style="padding-left: 400px; padding-bottom: 40px">
                        <form action="{{url('search')}}" method="GET">
                            @csrf
                            <input style="color: black" type="text" name="search" id="" placeholder="Search for something">
                            <input type="submit" value="search" class="btn btn-outline-primary">
                        </form>
                    </div>
                

                    <table class="table_deg">
                        <tr class="th_deg">
                            <th style="padding: ilpx">Name</th>
                            <th style="padding: ilpx">Email</th>
                            <th style="padding: ilpx">Phone</th>
                            <th style="padding: ilpx">Address</th>
                            <th style="padding: ilpx">Product title</th>
                            <th style="padding: ilpx">Quantity</th>
                            <th style="padding: ilpx">Price</th>
                            <th style="padding: ilpx">Payment Status</th>
                            <th style="padding: ilpx">Delivery Status</th>
                            <th style="padding: ilpx">Image</th>
                            <th style="padding: ilpx">Print Pdf</th>

                            <th style="padding: ilpx">Deliverd</th>
                            <th style="padding: ilpx">Send Email</th>
                        </tr>
                        @forelse ($order as $order)
                        <tr>
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->product_title}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->payment_status}}</td>
                            <td>{{$order->delivery_status}}</td>
                            <td>
                                <img width="150px" height="150px" src="productImage/{{$order->image}}" alt="">
                            </td>
                            <td>
                                <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print Pdf</a>
                            </td>
                            <td>
                                @if($order->delivery_status=='processing')
                                <a href="{{url('deliverd',$order->id)}}" class="btn btn-primary">Deliverd</a>
                                @else
                                <p style="color: green">Deliverd</p>
                                @endif
                              
                            </td>
                            <td>
                                <a href="{{url('send_email',$order->id)}}" class="btn btn-info"> Send Email</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="16">
                                No Data Found!
                            </td>
                        </tr>
                            
                        @endforelse
                    </table>
                </div>
            </div>

        @include('admin.script')
  </body>
</html>