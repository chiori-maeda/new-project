<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psy;
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
            'user_id'=>Auth::id(),
            'post_id'=>$request->post_id,
            'shipping_adress'=>$request->shipping_adress,
        ]);
    }
}
?>