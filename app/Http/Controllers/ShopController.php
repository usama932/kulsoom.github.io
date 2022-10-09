<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Shop;
use App\Models\Cart;
use App\Models\Order;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\File;
use Session;
use Mail;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Shop::all();
        return view('shop.index',['shops' => $data]);
        
    }

    public function showAll()
    {
        $data = Shop::all();
       // return view('shopping.shop', compact('shops'));
        return view('shop',['shops' => $data]);
        
    }

    public function searchData(Request $request)
    {

        $searchReq = $request->search;
        $data = Shop::where('name','LIKE',"%$searchReq%")->orWhere('category','LIKE',"%$searchReq%")->orWhere('description','LIKE',"%$searchReq%")->get();

      //  $data = Shop::all();
       // return view('shopping.shop', compact('shops'));
        return view('shop',['shops' => $data]);
        
    }

    public function filterIT()
    {

        //$searchReq = $request->search;
        $data = Shop::where('category','LIKE',"%IT%")->get();

      //  $data = Shop::all();
       // return view('shopping.shop', compact('shops'));
        return view('shop',['shops' => $data]);
    
    }

    public function filterScience()
    {

        //$searchReq = $request->search;
        $data = Shop::where('category','LIKE',"%Science%")->get();

      //  $data = Shop::all();
       // return view('shopping.shop', compact('shops'));
        return view('shop',['shops' => $data]);
        
    }
    public function filterMedical()
    {

        //$searchReq = $request->search;
        $data = Shop::where('category','LIKE',"%Medical%")->get();

      //  $data = Shop::all();
       // return view('shopping.shop', compact('shops'));
        return view('shop',['shops' => $data]);
        
    }

    public function filterCommerce()
    {

        //$searchReq = $request->search;
        $data = Shop::where('category','LIKE',"%Commerce%")->get();

      //  $data = Shop::all();
       // return view('shopping.shop', compact('shops'));
        return view('shop',['shops' => $data]);
        
    }

    public function filterArts()
    {

        //$searchReq = $request->search;
        $data = Shop::where('category','LIKE',"%Arts%")->get();

      //  $data = Shop::all();
       // return view('shopping.shop', compact('shops'));
        return view('shop',['shops' => $data]);
        
    }

    public function filterPoetry()
    {

        //$searchReq = $request->search;
        $data = Shop::where('category','LIKE',"%Poetry%")->get();

      //  $data = Shop::all();
       // return view('shopping.shop', compact('shops'));
        return view('shop',['shops' => $data]);
        
    }

    public function lowPrice()
    {

        //$searchReq = $request->search;
        $data = Shop::where('price','<','101')->get();

      //  $data = Shop::all();
       // return view('shopping.shop', compact('shops'));
        return view('shop',['shops' => $data]);
        
    }

    public function midPrice()
    {

        //$searchReq = $request->search;
        $data = Shop::where('price','>','100')->Where('price','<','201')->get();

      //  $data = Shop::all();
       // return view('shopping.shop', compact('shops'));
        return view('shop',['shops' => $data]);
        
    }

    public function highPrice()
    {

        //$searchReq = $request->search;
        $data = Shop::where('price','>','200')->get();

      //  $data = Shop::all();
       // return view('shopping.shop', compact('shops'));
        return view('shop',['shops' => $data]);
        
    }

    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Shop;
        $data -> name = $request -> name;
        $data -> price = $request -> price;
        $data -> description = $request -> description;
        $data -> pages = $request -> pages;
        $data -> quantity = $request -> quantity;
        $data -> category = $request -> category;

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/shop/' , $filename);
            $data -> image = $filename;
        }
       // $data -> image = $request -> image;

        $data -> save();
        //return view('shop.index');
        return redirect() ->route('shop.index');
        echo "<script> alert('Product has been added successfully!'); </script>";

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // return Shop::find($id);

        $data = Shop::find($id);

        return view('productdetail',['shops' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function addToCart(Request $request)
    {
        if($request->session()->has('loginid'))
        {
            $cart = new Cart;
            $cart->userid = $request->session()->get('loginid');
            $cart->productid = $request->productid;
            $cart->qty = $request->qty;
            $cart->save();

            echo "<script> alert('Product has been added to cart successfully!'); </script>";
            return redirect()->back();


        }
        else{
            return redirect()->route('custlogin');
        }
    }

    public static function cartItem()
    {
        $userid = Session::get('loginid');
        return Cart::where('userid',$userid)->count();
    }

    public function cartList()
    {
        $userid = Session::get('loginid');

        $product = DB::table('carts')
        ->join('shops','carts.productid','shops.id')
        ->join('custom_users','carts.userid','custom_users.id')
        ->select('shops.*','carts.id as cartid', 'carts.qty as qty','custom_users.name as uname','custom_users.address as uaddress','custom_users.phone as uphone', 'custom_users.email as email')
        ->where('carts.userid', $userid)
        ->get();

        // $product = DB::table('carts')
        // ->join('custom_users','carts.userid','custom_users.id')
        // ->select('custom_users.*','carts.id as cartid')
        // ->where('carts.userid', $userid)
        // ->get();


        return view('cart',['shops'=>$product]);
    }

     function removeCart($id)
    {
        // echo $id;

        Cart::destroy($id);
        // $delete = DB::table('carts')
        // ->where('id',$id)
        // ->delete();
        // $data = Cart::find($id);
        // $data->delete();
    //    $data = Cart::find($id);
    //    echo $data;
       echo "<script> alert('Product has been removed from cart!'); </script>";

       return redirect() ->route('cart');
       
    }

    // public function orderNow(){
    //     $userid = Session::get('loginid');

    //     $total = $product = DB::table('carts')
    //     ->join('shops','carts.productid','shops.id')
    //     ->select('shops.*','carts.id as cartid')
    //     ->where('carts.userid', $userid)
    //     ->sum('shops.price');

    //     return view('ordernow',['shops'=>$total]);

    // }
    public function orderNow(Request $request){
        $userid = Session::get('loginid');
       
        $order = Cart::where('userid',$userid)->get();
        foreach($order as $mycart)
        {
            $order = new Order;
            $order->productid = $mycart['productid'];
            $order->userid = $mycart['userid'];
            $order->paymentmethod = $request->payment;
            $order->address = $request->address;
            $order->name =  $request->name;
            $order->total = $request->total;
            $order->save();
            Cart::where('userid',$userid)->delete();
            
        }

         return view('thankyou');

        

    }

    public function thankyou(){
        return view('thankyou');
    }

    public function showAllOrders()
    {
        $data = Order::all();
       // return view('shopping.shop', compact('shops'));
        return view('order.index',['orders' => $data]);
        
    }

    public function myOrder(){
        $userid = Session::get('loginid');

        $orders = DB::table('orders')
        ->join('shops','orders.productid','shops.id')
        ->join('custom_users','orders.userid','custom_users.id')
        ->select('shops.*','orders.id as orderid','custom_users.name as uname','custom_users.address as uaddress','custom_users.phone as uphone', 'custom_users.email as email')
        ->where('orders.userid', $userid)
        ->get();

        return view('myorders',['orders'=>$orders]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = Shop::find($request->id);
        $destination = 'uploads/shop/'.$data->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $data->delete();
        return redirect() ->route('shop.index');
    }

    public function deleteOrder(Request $request){
        $data = Order::find($request->id);
        $data->delete();
        return redirect() ->route('order.index');
    }

    public function send(Request $request){

        if($this->connection())
        {





            $mail =[
                'recipient' => "sidraparacha27@gmail.com",
                'email' => $request->email,
                'subject' => 'Order Confirmation',
                'body' => 'Your order has confirmed! Delivery will be within two to three days.',

            ];
            $data=['name'=>"Southwell", 'sub'=>"Order Confirmation.", 'body'=> "Your order has confirmed! Delivery will be within two to three days."];
            $user['to']= $request->email;
            Mail::send('emailtemp', $data, function($message) use ($user){
                $message->to($user['to']);
                $message->subject('Order Confirmation');
               // $message->body('Your order has confirmed! Delivery will be within two to three days.');

            });

            return redirect()-> route('index');

        }
        else{
            echo "<script> alert('Oops! No connection! Sorry couldn't send mail.'); </script>";
            return view('index');
        }
    }

    public function connection($site = "https://youtube.com/")
    {
        if(@fopen($site, "r"))
        {
            return true;
        }
        else{
            return false;
        }
    }


}
