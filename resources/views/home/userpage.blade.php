<!DOCTYPE html>
<html>
   <head>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <!-- Basic -->
      @include('home.css')
   </head>
   <body>
      @include('sweetalert::alert')
      
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
                <!-- end header section -->
         <!-- slider section -->
         @include('home.slider')
                 <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.why')
            <!-- end why section -->
      
      <!-- arrival section -->
        @include('home.new_arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.product')
      <!-- end product section -->


      {{-- Comments and reply system start here --}}

      <div style="text-align: center; padding-bottom: 30px;"> 
         <h1 style="font-size: 30px; text-align: center; padding-top: 20px; padding-bottom: 20px;">Comments</h1>
         <form action="{{url('add_comment')}}" method="POST">
            @csrf
            <textarea placeholder="something write here." name="comment" style="color: black; height: 150px; width: 600px">

            </textarea> <br>
            <input type="submit" name="" class="btn btn-primary" value="Comment" id="">
         </form>
      </div>

      <div style="padding-left: 20%">
         <h1 style="font-size: 20px; padding-bottom: 20px;">All Comments</h1>
         
        @foreach ($comment as $comment)
        <div>
         <b>{{$comment->name}}</b>
         <p>{{$comment->comment}}</p>

         <a style="color: blue;" href="javascript::void(0)" onclick="reply(this)" data-commentid="{{$comment->id}}">Reply</a>

         @foreach ($reply as $rep)
         @if ($rep->comment_id ==  $comment->id)
             
       
             <div style="padding-left: 3%; padding-bottom: 10px; ">
               <b>{{$rep->name}}</b>
               <p>{{$rep->reply}}</p>
         <a style="color: blue;" href="javascript::void(0)" onclick="reply(this)" data-commentid="{{$comment->id}}">Reply</a>


             </div>
             @endif
         @endforeach

        </div>
        @endforeach

        <div style="display: none" class="replyDiv">
         <form action="{{url('add_reply')}}" method="POST">
            @csrf
         <input type="text" id="commentId" name="commentId" id="" hidden>
         <textarea style="height: 100px; width: 500px" name="reply" placeholder="something write here."></textarea> <br>
         <button type="submit" class="btn btn-warning">Reply</button>
         <a href="javascript::void(0)" class="btn" onclick="reply_close(this)">close</a>
      </form>
        </div>
      </div>
      

      {{-- Comments and reply system end here--}}



      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->

      <!-- client section -->
      @include('home.client')
      <!-- end client section -->

      <!-- footer start -->
     @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>

      <script>
         function reply(caller)
         {
            document.getElementById('commentId').value=$(caller).attr('data-commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
         }
         function reply_close(caller)
         {
            $('.replyDiv').hide();
         }
      </script>

<script>
   document.addEventListener("DOMContentLoaded", function(event) { 
       var scrollpos = localStorage.getItem('scrollpos');
       if (scrollpos) window.scrollTo(0, scrollpos);
   });

   window.onbeforeunload = function(e) {
       localStorage.setItem('scrollpos', window.scrollY);
   };
</script>

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