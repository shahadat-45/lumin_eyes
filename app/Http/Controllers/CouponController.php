<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\CouponUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(){
        $coupons = Coupon::all();
        return view('backEnd.coupon.coupon' , [
            'coupons' => $coupons,
        ]);
    }

    public function store(Request $request){
        Coupon::insert([
            'coupon_name' => $request->coupon_name,
            'coupon_type' => $request->coupon_type,
            'amount' => $request->amount,
            'count' => $request->quantity,
            'validity' => $request->validity,
            'unique_id' => $request->coupon_type . uniqid() . $request->amount . $request->validity,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success' , 'Coupon added successfully');
    }
    function delete($id){
        Coupon::find($id)->delete();
        CouponUser::where('coupon_id' , $id)->delete();
        return back()->with('cpn_dlt' , 'Coupon deleted successfully');
    }

    public function apply(Request $request){

        $coupon = $request->coupon;
        $pack = Coupon::where('coupon_name' , $coupon)->first();        
        
        if($coupon == Coupon::where('coupon_name' , $coupon)->exists()){
            if ($pack->count >  0) {
                if ($pack->validity < Carbon::now()) {
                    return response()->json([ 'success' => false, 'message' => 'Expired Coupon' ]);
                }
                else{                    
                    if ($pack->type == 2) {
                        $total = $request->amount - (($request->amount / 100) * $pack->amount);
                        $discount =  ($request->amount / 100) * $pack->amount;      
                    }
                    else{
                        $total = $request->amount - $pack->amount;
                        $discount = $pack->amount;      
                    }
                    return response()->json([ 
                        'success' => true,
                        'message' => 'Coupon Added Successfully.',
                        'amount' => $total,
                        'discount' => $discount,
                        'id' => $pack->id,
                    ]);
                }
            }
            else{
                return response()->json([ 'success' => false, 'message' => 'Coupon Usage Limit Reached!' ]);
            }
        }
        else{
            return response()->json([ 'success' => false, 'message' => 'Invalid Coupon' ]);
        }
    }

}
