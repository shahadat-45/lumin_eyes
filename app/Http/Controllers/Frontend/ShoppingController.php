<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productprice;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
class ShoppingController extends Controller
{

    public function addTocartGet($id,Request $request){
        $qty=1;
        $productInfo = DB::table('products')->where('id',$id)->first();
        $productImage = DB::table('productimages')->where('product_id',$id)->first();
        $cartinfo=Cart::instance('shopping')->add(['id'=>$productInfo->id,'name'=>$productInfo->name,'qty'=>$qty,'price'=>$productInfo->new_price,
            'options' => [
                'image'=>$productImage->image,
                'old_price'=>$productInfo->old_price,
                 'slug' => $productInfo->slug,
                 'purchase_price' => $productInfo->purchase_price,
                 ]]);

        // return redirect()->back();
        return response()->json($cartinfo);
    } 

    public function cart_store(Request $request)
    {
        // Check if the product exists in the cart
        $cartItem = Cart::instance('shopping')->search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id == $request->id;
        })->first();
    
        if ($cartItem) {
            Toastr::info('Product In Cart', 'Info');
            return redirect()->route('customer.checkout');
        }
    
        // Add the product to the cart
        $product = Product::where(['id' => $request->id])->first();
        Cart::instance('shopping')->add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $product->new_price,
            'options' => [
                'slug' => $product->slug,
                'image' => $product->image->image,
                'old_price' => $product->new_price,
                'purchase_price' => $product->purchase_price,
                'product_size' => $request->product_size,
                'product_color' => $request->product_color,
                'pro_unit' => $request->pro_unit,
                'partial_pay' => $product->pre_booking,
            ],
        ]);
    
        // Success feedback
        Toastr::success('Product successfully added to cart', 'Success!');
        return redirect()->route('customer.checkout');
    }    

    public function cart_storeTwo(Request $request)
    {
        $product = Product::where(['id' => $request->id])->first();
        
        Cart::instance('shopping')->add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->qty,
            'price' => $product->new_price,
            'options' => [
                'slug' => $product->slug,
                'image' => $product->image->image,
                'old_price' => $product->new_price,
                'purchase_price' => $product->purchase_price,
                'product_size' => $request->product_size ?? '',
                'product_color' => $request->product_color ?? '',
                'pro_unit' => $request->pro_unit,
                'partial_pay' => $product->pre_booking,
            ],
        ]);
    
        return response()->json(['success' , 'Product successfully added to cart'] , 200);
    }    
    public function cart_remove(Request $request)
    {
        $remove = Cart::instance('shopping')->update($request->id, 0);
        $data = Cart::instance('shopping')->content();
        return view('frontEnd.layouts.ajax.cart', compact('data'));
    }
    public function cart_increment(Request $request)
    {
        $item = Cart::instance('shopping')->get($request->id);
        $qty = $item->qty + 1;
        $increment = Cart::instance('shopping')->update($request->id, $qty);
        $data = Cart::instance('shopping')->content();
        return view('frontEnd.layouts.ajax.cart', compact('data'));
    }
    public function cart_decrement(Request $request)
    {
        $item = Cart::instance('shopping')->get($request->id);
        $qty = $item->qty - 1;
        $decrement = Cart::instance('shopping')->update($request->id, $qty);
        $data = Cart::instance('shopping')->content();
        return view('frontEnd.layouts.ajax.cart', compact('data'));
    }
    public function cart_count(Request $request)
    {
        $data = Cart::instance('shopping')->count();
        return view('frontEnd.layouts.ajax.cart_count', compact('data'));
    }
    public function mobilecart_qty(Request $request)
    {
        $data = Cart::instance('shopping')->count();
        return view('frontEnd.layouts.ajax.mobilecart_qty', compact('data'));
    }
    public function showCart(){
        $data = Cart::instance('shopping')->content();
        $count = Cart::instance('shopping')->count();
        $subtotal = Cart::instance('shopping')->subtotal();
        return response()->json(['cartItems' => $data , 'count' => $count , 'subtotal' => $subtotal]);
    }
}
