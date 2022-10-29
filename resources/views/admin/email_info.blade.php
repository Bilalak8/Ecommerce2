<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">

    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        label{
            display: inline-block;
            width: 200px;
            font-size: 15px;
            font-weight: bold;
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
                    <h1 style="text-align: center; font-size: 25px">Send to Email {{$order->email}}</h1>
                    <form action="{{url('send_user_email',$order->id)}}" method="POST">
                        @csrf
                        <div style="padding-left: 35%; padding-top: 30px;">
                            <label for="greeting">Email Greeting :</label>
                            <input style="color: black;" type="text" name="greeting" id="">
                        </div>

                        <div style="padding-left: 35%; padding-top: 30px;">
                            <label for="firstline">Email FirstLine :</label>
                            <input style="color: black;" type="text" name="firstline" id="">
                        </div>

                        <div style="padding-left: 35%; padding-top: 30px;">
                            <label for="body">Email Body :</label>
                            <input style="color: black;" type="text" name="body" id="">
                        </div>

                        <div style="padding-left: 35%; padding-top: 30px;">
                            <label for="button">Email Button name :</label>
                            <input style="color: black;" type="text" name="button" id="">
                        </div>

                        <div style="padding-left: 35%; padding-top: 30px;">
                            <label for="url">Email Url :</label>
                            <input style="color: black;" type="text" name="url" id="">
                        </div>

                        <div style="padding-left: 35%; padding-top: 30px;">
                            <label for="lastline">Email LastLine :</label>
                            <input style="color: black;" type="text" name="lastline" id="">
                        </div>

                        <div style="padding-left: 35%; padding-top: 30px;">
                            <input type="submit" value="Send Email" class="btn btn-primary">
                        </div>

                    </form>

                </div>
            </div>

        @include('admin.script')
  </body>
</html>