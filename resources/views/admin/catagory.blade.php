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
        .h2_font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color
        {
            color: black;
        }
        .center
        {
            margin: auto;
            width: 50%;
            text-align: center;
            border: 2px solid white;
            margin-top: 30px;
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

                    @if (session()->has('message'))
                    <div class="alert alert-success">
                         
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}

                    </div>
                        
                    @endif

                    <div class="div_center">
                        <h2 class="h2_font">Add Catagory</h2>
                        <form action="{{url('add_catagory')}}" method="POST">
                            @csrf
                            <input class="input_color" type="text" name="catagory" id="" placeholder="write catagory name">
                            <input type="submit" name="submit" class="btn btn-primary" id="" value="Add Catagory">
                        </form>
                    </div>
                    <table class="center">
                        <tr>
                            <td>Catagory Name : </td>
                            <td>Action</td>
                        </tr>
                        <tr>
                         @foreach ($data as $data)
                         <td>{{$data->catagory_name}}</td>
                         <td><a class="btn btn-danger" href="{{url('delete_catagory',$data->id)}}" onclick="return confirm('Are sure to Delete This')">Delete</a></td>
                        </tr>
                             
                         @endforeach
                    </table>
                </div>
            </div>

        @include('admin.script')
  </body>
</html>