<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Reply;
use Session;
use Stripe;

use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{

    public function index()
    {
        $product = Product::paginate(3);
        $comment = Comment::orderby('id','desc')->get();
        $reply = Reply::all();

        return view('home.userpage',compact('product','comment','reply'));
    }


    public function redirect()
    {
        $usertype = Auth::User()->usertype;

        if($usertype == '1')
        {
            $total_product = Product::all()->count();
            $total_order = Order::all()->count();
            $total_user = User::all()->count();

            $order = Order::all();

            $total_revenu = 0;
            foreach($order as $order)
            {
                $total_revenu = $total_revenu + $order->price;
            }

            $total_delivered = Order::where('delivery_status','=','deliverd')->get()->count();

            $total_Processing = Order::where('delivery_status','=','processing')->get()->count();


            return view('admin.home',compact('total_product','total_order','total_user','total_revenu','total_delivered','total_Processing'));
        }
        else
        {
            $product = Product::all();
            $comment = Comment::orderby('id','desc')->get();

            $reply = Reply::all();
            return view('home.userpage',compact('product','comment','reply'));
        }
    }

    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user = Auth::user();
            $userid = $user->id;

            $product = Product::find($id);

            $product_exist_id = Cart::where('product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();

            if($product_exist_id!=null)
            {
                $cart = Cart::find($product_exist_id)->first();
                $quantity = $cart->quantity;

                $cart->quantity = $quantity + $request->quantity;

                if($product->discount_price!=null)
                {
                    $cart->price = $product->discount_price * $cart->quantity;
                }
                else
                {
                    $cart->price = $product->price * $cart->quantity;
                }

                $cart->save();
                Alert::warning('Product Added Successfully', 'we have Added product to the cart');
                return redirect()->back();
            }
            else
            {
                $cart = new Cart;
                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;
    
                $cart->product_title = $product->title;
    
               

                $cart->image = $product->image;
                $cart->product_id = $product->id;
    
                $cart->quantity = $request->quantity;
    
                $cart->save();
                return redirect()->back();
            }
         
            }
            else
            {
                return redirect('login');
            }
           
    }

    public function showcart()
    {
        if(Auth::id())
        {
            $id = Auth::user()->id;
            $cart= Cart::where('user_id', '=', $id)->get();
            return view('home.showcart',compact('cart'));
        }
        else
        {
            return redirect('login');
        }
       
    }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);

        $cart->delete();

        return redirect()->back();
    }

    public function cash_order()
    {
        $user = Auth::user();

        $userid = $user->id;

        $data = Cart::where('user_id','=',$userid)->get();

        foreach($data as $data)
        {
            $order = new Order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'Cash on Delivery';
            $order->delivery_status = 'processing';

            $order->save();

            $cart_id = $data->id;

            $cart = Cart::find($cart_id);

            $cart->delete();


        }
        return redirect()->back();
    }

    public function stripe($totalprice)
    {
        return view('home.stripe',compact('totalprice'));
    }

    public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment." 
        ]);
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    public function show_order()
    {
        if(Auth::id())
        {
            // $user = Auth::user()->id; also written like this to skip below line
            $user = Auth::user();

            $userid= $user->id;

            $order = Order::where('user_id','=',$userid)->get();
            return view('home.order',compact('order'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function cancel_order($id)
    {
        $order = Order::find($id);

        $order->delivery_status = 'You canceled your Order';

        $order->save();
        return redirect()->back();
    }

    public function add_comment(Request $request)
    {
        if(Auth::id())
        {
            $comment = new Comment;

            $comment->name = Auth::user()->name;
            $comment->user_id = Auth::user()->id;
            $comment->comment = $request->comment;

            $comment->save();
            return redirect()->back();

        }
        else
        {
            return redirect('login');
        }
    }

    public function add_reply(Request $request)
    {
        if(Auth::id())
        {
            $reply = new Reply;

            $reply->name = Auth::user()->name;
            $reply->user_id = Auth::user()->id;
            
            $reply->comment_id = $request->commentId;
            $reply->reply = $request->reply;

            $reply->save();
            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

    public function product_search(Request $request)
    {
        $text_search = $request->search;
        $comment = Comment::orderby('id','desc')->get();
        $reply = Reply::all();
        $product = Product::where('title','LIKE',"%$text_search%")->paginate(3);

        return view('home.userpage',compact('product','comment','reply'));
    }

    public function product()
    {
        $product = Product::paginate(3);
        $comment = Comment::orderby('id','desc')->get();
        $reply = Reply::all();

        return view('home.all_product',compact('product','comment','reply'));
    }


    public function search_product(Request $request)
    {
        $text_search = $request->search;
        $comment = Comment::orderby('id','desc')->get();
        $reply = Reply::all();
        $product = Product::where('title','LIKE',"%$text_search%")->paginate(3);

        return view('home.all_product',compact('product','comment','reply'));
    }

}


