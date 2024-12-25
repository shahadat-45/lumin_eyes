<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Productcolor;
use App\Models\Productsize;
use App\Models\Size;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CompareController extends Controller
{
    public function compare()
{   
    $carts = Cart::instance('compare')->content()->reverse()->take(4);
    return view('frontEnd.layouts.pages.compare' , compact('carts'));
}

    public function store (Request $request)
{
    // Cart::instance('compare')->destroy();
    // Check if the product exists in the database
    $product = Product::find($request->id);

    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    // Check if the product is already in the wishlist
    $wishlistItem = Cart::instance('compare')->search(function ($cartItem, $rowId) use ($product) {
        return $cartItem->id == $product->id;
    });

    if ($wishlistItem->isNotEmpty()) {
        return response()->json(['message' => 'Product Already in Compare List'], 200);
    }
    $sizes = [];
    foreach (Productsize::where('product_id' , $request->id)->get() as $i => $size) {
        $sizes[] = Size::where('id' , $size->size_id)->first()->sizeName;        
    }
    
    $colors = [];
    foreach (Productcolor::where('product_id' , $request->id)->get() as $i => $color) {
        $colors[] = Color::where('id' , $color->color_id)->first()->colorName;        
    }
    // Add the product to the Compare
    Cart::instance('compare')->add([
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->new_price,
        'qty' => 1,
        'options' => [
            'partial' => isset($product->pre_booking) ? 'Yes' : 'No',
            'category' => $product->category->name  ?? 'Uncategorized',
            'size' => empty($sizes) ? 'NO' :  implode(',', $sizes),
            'color' => empty($colors) ? 'NO' :  implode(',', $colors),
            'image' => $product->image->image,
            'create' => Carbon::now(),
        ],
    ]);
    $data = Cart::instance('compare')->count();    
    return response()->json([
        'message' => 'Product In Comparison',
        'count' => $data,
    ], 200);
}
    public function delete_compare(Request $request)
{
    // Remove the item from the wishlist
    Cart::instance('compare')->remove($request->id);
    $data = Cart::instance('compare')->count();

    return response()->json([
        'message' => 'Product removed from compare successfully',
        'count' => $data,
    ], 200);
}
    public function moveToCart(Request $request)
{
    $product = Product::where('id' , $request->id)->first();

    Cart::instance('shopping')->add([
        'id' => $product->id,
        'name' => $product->name,
        'qty' => 1,
        'price' => $product->new_price,
        'options' => [
            'slug' => $product->slug,
            'image' => $product->image->image,
            'old_price' => $product->new_price,
            'purchase_price' => $product->purchase_price,
            'product_size' => $request->product_size ?? '',
            'product_color' => $request->product_color ?? '',
            'pro_unit' => $product->pro_unit,
            'partial_pay' => $product->pre_booking,
        ],
    ]);

    // Remove the item from the wishlist
    Cart::instance('compare')->remove($request->rowId);
    $cart = Cart::instance('shopping')->count();


    return response()->json([
        'message' => 'Product moved to cart successfully',
        'cart_count' => $cart,
    ], 200);
}
}
