<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PostController extends Controller{

  const LOCAL_STORAGE_FOLDER = 'images/';
  private $post;

  public function __construct(Post $post){
    $this->post = $post;
  }

  public function index() {
    $all_posts = $this->post->latest()->get();
    return view ('posts.index')->with('all_posts',$all_posts); 
  }

  public function create() {
    return view('posts.create');
 
  }

  public function store(Request $request) {
    $request->validate([
      'title'   => 'required|max:50',
      'body'    => 'required|max:50',
      'image'   => 'required|mimes:jpeg,jpg,png,gif|max:1048'
    ]);

     $this->post->user_id = Auth::user()->id;
     $this->post->title = $request->title;
     $this->post->cost = $request->cost;
     $this->post->body  = $request->body;
    $this->post->image = $this->saveImage($request->image);
    $this->post->save();

    return redirect()->route('index');
     
  }
  public function saveImage($image) {
  
    $image_name = time() . "." . $image->extension();

    $image->storeAs(self::LOCAL_STORAGE_FOLDER , $image_name);
    return $image_name;

  }

    public function show($id) {
        $post = $this->post->findOrFail($id);
        return view('posts.show')->with('post', $post);
       
    }

    public function edit($id) {
        $post = $this->post->findOrFail($id);
        if($post->user->id != Auth::user()->id){
            return redirect()->back();
        }
        return view('posts.edit')->with('post', $post);
       
    }

    public function update(Request $request,$id) {
        #1.Validate the request
        $request->validate([
            'title' => 'required|max:50',
            'body'  => 'required|max:1000',
            'image' => 'mimes:jpeg,jpg,png,gif|max:1048'
        ]);
       
        // mimes - multipurepose internrt mail extensions
        #2.Save the form date to posts table in database

        $post        =$this->post->findOrFail($id);
        $post->title =$request->title;
        $post->body =$request->body;

        #if there is a new imagete 
        if($request->image){
            #delethe previous image from the 
            $this->deleteImage($post->image);

            #save the new image
            $post->image = $this->saveImage($request->image);
        }
        $post->save();

        return redirect()->route('post.show',$id);
       
    }

    public function deleteImage($image) {
        $image_path = self::LOCAL_STORAGE_FOLDER .$image;
        // Sample:$image_past = 'images/172364947.jpg'

        if(Storage::disk('public')->exists($image_path)){
            Storage::disk('public')->delete($image_path);
        }
       
    }

    public function destroy($id) {
    //   $this->post->destroy($id);
    //   $this->deleteImage($this->post->id);
    $post = $this->post->findOrFail($id);
    $this->deleteImage($post->image);
    $post->delete();
    return redirect()->back();  
    }
     
  
}

?>