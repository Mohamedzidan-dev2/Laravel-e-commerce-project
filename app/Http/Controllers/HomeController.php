<?php

namespace App\Http\Controllers;
// use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Alert;
use App\Models\Message;
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\User;
use COM;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(){
        $data =  Product::paginate(3);
        return view("home.userPage",compact('data'));
    } 

    public function redirect(){
        $userType =  Auth::user()->usertype;
        if($userType == '1'){

            $products = Product::all()->count();
            $orders = Order::all()->count();
            $users = User::all()->count();

            $delivery_Orders = Order::where("delivery_status","=","Deleiverd")->count();
            $processing_Orders = Order::where("delivery_status","=","Processing")->count();

            $revenue = Order::all();
            $Total_p = 0;
            foreach($revenue as $price){
                $Total_p = $Total_p + $price->price;
            }
            

            return view("admin.home",compact("products","orders","users","delivery_Orders","processing_Orders","Total_p"));
        }else{
            $data =  Product::paginate(3);
            return view("home.userPage",compact('data'));
        }
    }

       // product details
    public function product_details($id){
        $data = Product::find($id);
        return view("home.product_details",compact('data'));
 }

//  add to cart 
public function add_to_cart(Request $request,$id){
     if(Auth::id()){
       
    $product =  Product::find($id);
    // return $product;
    $user = Auth::user();
    // return $user;
    $quntity = $request->quntity;

    // check if data exist already 

     $find_id =  Cart::where('user_id','=',$user->id)->where('product_id',"=",$product->id)->first();


    if($find_id){

        $cart =  Cart::find($find_id)->first();
        $qun = $cart->quntity;
        // $qun = $cart->price;
        $cart->quntity = $qun + $request->quntity;
        if($product->discount_price != null){
            $cart->price = $product->discount_price *  $cart->quntity;
        }else{
            $cart->price = $product->price *  $cart->quntity;  
        }
        
        
        $cart->save();
      

        return redirect()->back();
       
    }else{
        
    $obj = new Cart();

    $obj->name = $user->name;
    $obj->email = $user->email;
    $obj->phone = $user->phone;
    $obj->address = $user->address;
    $obj->product_title = $product->title;

    // what if product has discount?
    if($product->discount_price != null){
        $obj->price = $product->discount_price * $request->quntity;
    }else{
        $obj->price = $product->price * $request->quntity;  
    }
    
    
    $obj->img = $product->img;
    $obj->product_id = $product->id;
    $obj->user_id = $user->id;
    $obj->quntity = $request->quntity;

    $obj ->save();

    // Alert::success("we donee","ddddddddddddddddddddone");

    return redirect()->back();
    }
    // return $quntity;  

    
     }else{
        return redirect('/login');
     }
}

    // show cart
    public function show_cart(){
        if(Auth::id()){
            $user = Auth::user()->id;
            // return $user;
            $data = Cart::where("user_id",'=',$user)->get();
            // return $data;
            return view("home.show_cart",compact('data'));
        }else{
            return redirect("login");
        }
    }

    // delete from cart
    public function delete_cart($id){
        Cart::find($id)->delete();
        return redirect()->back();
    }

    // cash_order
    public function cash_order(){
        $user = Auth::user()->id;
        // $cart = Cart::find($user)->get();
        $cart_data = Cart::where("user_id","=",$user)->get();

        foreach($cart_data as $data){
            $obj = new Order();

            $obj->name = $data->name;
            $obj->email = $data->email;
            $obj->phone = $data->phone;
            $obj->address = $data->address;
            $obj->user_id = $data->user_id;
            $obj->product_title = $data->product_title;
            $obj->quntity = $data->quntity;
            $obj->price = $data->price;
            $obj->img = $data->img;
            $obj->product_id = $data->product_id;
            $obj->payment_status = "Cash on Delivery";
            $obj->delivery_status = "Processing";
            $obj->save();

            $id_cart = $data->id;
            Cart::find($id_cart)->delete();
        
        } 

        return redirect()->back()->with("message","We Have Recieved Your Order , We Will Connect With You Soon ");      
    }

    // pay with card
    public function stripe($totla){
        $total_price = $totla;
        return view('home.stripe',compact('total_price'));
    }

    // built in function 
    public function stripePost(Request $request,$total_price)
    {
if ($total_price > 0) {
    // return $total_price;
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    Stripe\Charge::create([
            "amount" => $total_price * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
    ]);

    $user = Auth::user()->id;
    // $cart = Cart::find($user)->get();
    $cart_data = Cart::where("user_id", "=", $user)->get();

    foreach ($cart_data as $data) {
        $obj = new Order();

        $obj->name = $data->name;
        $obj->email = $data->email;
        $obj->phone = $data->phone;
        $obj->address = $data->address;
        $obj->user_id = $data->user_id;
        $obj->product_title = $data->product_title;
        $obj->quntity = $data->quntity;
        $obj->price = $data->price;
        $obj->img = $data->img;
        $obj->product_id = $data->product_id;
        $obj->payment_status = "Paid";
        $obj->delivery_status = "Processing";
        $obj->save();

        $id_cart = $data->id;
        Cart::find($id_cart)->delete();
    }

    Session::flash('success', 'Payment successful!');

            return redirect("stripe/0");
        }else{
            return back();
        }
    } 

    // user_order
    public function user_order(){
        $auth = Auth::id();

        if($auth){
          $id = Auth::user()->id;
          $data = Order::where("user_id","=",$id)->get();
        //   return $data;
            return view("home.user_order",compact('data'));
        }else{
            return redirect()->back();
        }
    }

    // delete_order
    public function delete_order($id){
        Order::find($id)->delete();

        return redirect()->back()->with("message","You Canseled Product Sucessfull");
    }

    // contact 
    public function contact(){
        return view("home.contact");
    }

    // add_message
    public function add_message(Request $request){
        // return $request;

        $request->validate([
            "email"=>"required",
            "phone"=>"required",
            "address"=>"required",
            "message"=>"required",
        ]);

        Message::create([
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'message'=>$request->message,
        ]);

        return redirect()->back()->with("message","Message Sent Successfully");

        
    }

}
