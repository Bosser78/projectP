<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sales;

class cartController extends Controller
{
    public function carts($id){
        $carts = sales::findOrFail($id);
        return view("cart", compact('carts'));
    }

    // public function deleteitem($id) {
    //     $carts = sales::findOrFail($id);

    //     $carts = $carts->idmedis;
    //     $carts->delete();

    //     return back()->with('success', 'medic has been deleted successfully.');
    //}
}
