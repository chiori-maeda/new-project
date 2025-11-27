<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class ComentController extends Controller
{
  private $comment;

    public function __construct(Comment $comment) {
        $this->comment = $comment;
       
    }
    public function store(Request $request,$post_id) {
        $request->validate([
            "comment" => 'required|max:150'
        ]);

        $this->comment->user_id     =Auth::user()->id;
        $this->comment->post_id     =$post_id;
        $this->comment->body        =$request->comment;
        $this->comment->save();

        return redirect()->back();
       
    }
    public function destroy($id) {
        $this->comment->destroy($id);
        return redirect()->back();
       
    }

}
