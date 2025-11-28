<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pays;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;

class payController extends Controller
{
    public function store(Request $request) {

         $request->validate([
        'post_id' => 'required|exists:posts,id',
        'shipping_address' => 'required|max:500',
         ])
       
        Pays::create([
            'user_id'=> Auth::user()->id,
            'post_id'=>$request->post_id,
            'shipping_adress'=>$request->shipping_adress,
            'cost'=>$request->cost,
        ]);
        
        return redirect()->route('#');
    }

    public function complete() {
       return view('pay.complete');
    }
}
?>