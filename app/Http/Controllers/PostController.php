<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PostController extends Controller{

  const LOCAL_STRAGE_FOLDER = 'images/';
  private $post;

  public function __construct(Post $post){
    $this->post = $post;
  }

  public function index() {
    $all_posts = $this->post->latest()->get();
    return view ('posts.index')->with('all_posts',$all_posts); 
  }

  public function create() {
    return view('#');
 
  }

  public function store(Request $request) {
    $request->validate([
      'title'   => 'required|max50',
      'body'    => 'required|max50',
      'image'   => 'required|mimes:jpeg,jpg,png,gif|max:1048'
    ]);

    // $this->post->user_id = Auth::user()->id;
    // $this->post->title = $request->title;
    // $this->post->body  = $request->body;
    // $this->post->image = $this->saveImage($request->image);
    // $this->post->save();

    // return redirect()->route('index');
     
  }
  // public function saveImage($image) {
  
  //   $image_name() . "." . $image->extension();

  //   $image->storeAs(self::LOCAL_STORAGE_FOLDER , $image_name);
  //   return $image_name;

  // }
     
  
}

?>