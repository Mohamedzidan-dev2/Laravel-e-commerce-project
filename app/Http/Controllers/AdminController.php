<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Category;
use App\Models\Message;
use App\Models\Order;
use PDF;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Hash;

use App\Models\Product;
use App\Models\User;
use App\Notifications\SendEmailNotification;
// use Illuminate\Notifications\Notification;
use Notification;
use Intervention\Image\ImageManagerStatic;
use Livewire\Commands\MakeCommand;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Contracts\Service\Attribute\Required;

class AdminController extends Controller
{
    // to solve the error attempt ....
    public function __construct()
    {
        $this->middleware("auth");
    }

    // category page
   public function view_category(){
      $data = Category::all();
      return view("admin.category",compact('data'));
   }

    // Add Category
   public function add_category(Request $request){

    // dd($request->img);

        $validate = $request->validate([
          "category" => "required",
          "img" => "required"
        ]);

        $obj_cat = new Category();
        $obj_cat->category_name = $request->category;
    
        
        $file = $request->hasFile('img');
        if($file){

              $f = $request->file('img');
              $img_cat = time().rand(1,1000).$f->getClientOriginalName();
              $request->img->move('category_img',$img_cat);
              $obj_cat->img =$img_cat;

        }
         $obj_cat->save();
         return redirect()->back()->with('message',"Added Category Successfully.");
   }

    // Delete Category
   public function delete_category($id){
        $delete =  Category::find($id)->delete();
        return Redirect()->back()->with("message","Category Deleted Successfully");
   }

 

    // poducts ------------------------------------------------------------------------------------------------------

   public function view_product(){
        $data = Category::all();
        return view("admin.product",compact('data'));
   }

   public function add_product(Request $request){
       
      $request->validate([
        "title"=>"required",
        "price"=>"required",
        "quntity"=>"required",
        "category"=>"required",
      
        "des"=>"required",
        "img"=>"required",
      ]);

        $obj =  new Product();

        $obj->title = $request->title;
        $obj->price = $request->price;
        $obj->quntity = $request->quntity;
        $obj->category = $request->category;
        $obj->discount_price = $request->dis_price;
        $obj->description = $request->des;

        $img =  $request->hasFile('img');

        if($img){
            $file = $request->file('img');
            $imgName = time().rand(1,1000).$file->getClientOriginalName();
            $request->img->move('product',$imgName);
            $obj->img = $imgName;
        };

       
        $obj->save();
        
        return redirect()->back()->with("message",'Added Product Succefully');
       
   } 


// show product
   public function show_product(){
    $data = Product::all();
    return view("admin.show_product",compact('data'));
   }

   public function delete_product($id){
     Product::find($id)->delete();
     return redirect()->back()->with("message","Product Deleted Successfully");
   }

// update product design page
   public function update_product($id){

      $data = Product::all()->where("id",$id);
      // return $data;
      $category = Category::all();
      return view("admin.update_product_view",compact('data'),compact('category'));
   }

   // update product logic page
   public function update_product_logic(Request $request,  $id){
      $val  = $request->validate([
          "title"=>"Required",
          "price"=>"Required",
          "quntity"=>"Required",
          "category"=>"Required",
        
          "des"=>"Required",
      ]);
        

      // $obj =  new Product();

      Product::where('id',$id)->update([
         "title"=>$request->title,
         "price"=>$request->price,
         "quntity"=>$request->quntity,
         "category"=>$request->category,
         "discount_price"=>$request->dis_price,
         "description"=>$request->des
      ]);
       
      $file = $request->hasFile('img');
      if($file){
         $f = $request->file('img');
         $img_name = time().rand(1,100).$f->getClientOriginalName();
         $request->img->move("product",$img_name);

         Product::where("id",$id)->update([
            "img"=>$img_name
         ]);
      }

      return redirect("/show_product")->with("message","Product Updated Successfully");
   }

   // orders
   public function orders(){
      $orders = Order::all();
      return view("admin.orders",compact('orders'));
   }

   // update_order_delevered
   public function update_order_delevered($id){
      $order_data = Order::find($id);
      // return   $order_data->delivery_status ;

      $order_data->payment_status  = 'Paid';
      $order_data->delivery_status = 'Deleiverd ';
      $order_data->save();

      return redirect()->back();
   }

   // order_pdf
   public function order_pdf($id){
      $data = Order::find($id);
      // return $data;
      $pdf = PDF::loadView('admin.pdf',compact('data'));
      return $pdf->download('order_details.pdf');
   
   }

   // send email
   public function send_email($id){
      $data =  Order::find($id);
      return view('admin.send_email',compact('data'));
   }
   // send_notification
   public function send_notification(Request $request , $id){
      $data = Order::find($id);

      $details =[
         "greeting"=>$request->greeting,
         "firstline"=>$request->firstline,
         "body"=>$request->body,
         "button"=>$request->button,
         "url"=>$request->url,
         "lastline"=>$request->lastline
      ];
    
      Notification::send($data, new SendEmailNotification($details));
      return redirect()->back();




   }

   // order_search
   public function order_search(Request $request){
      $orders =  Order::where("name","LIKE","%$request->search%")->orWhere("phone","LIKE","%$request->search%")->get();
      return view('admin.orders',compact('orders'));
   } 

   // -------------------------------- view_users ---------------------------------------------

   // view_users
   public function view_users(){
      $data =  User::where('usertype','=','0')->get();
      return view("admin.view_users",compact('data'));
   }

   // add_user
   public function add_user(){
      return view("admin.add_user");
   }

   // delete_user
   public function delete_user($id){
       User::find($id)->delete();

       return redirect()->back()->with("message","User Deleted Successfully");
   }

   // user_search
   public function user_search(Request $request){
    $data = User::where("name","LIKE","%$request->search%")->orWhere("phone","LIKE","%$request->search%")->get();
     return view("admin.view_users",compact('data'));
   }
   
   // messages
   public function messages(){
      $data =  Message::all();
      return view('admin.messages',compact('data'));
   }




}

