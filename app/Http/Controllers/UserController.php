<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    private $user;
    const LOCAL_STRAGE_FOLDER = 'avatars/';


    public function __construct(User $user) {
       $this->user = $user;
    }

        public function show() {
        return view('users.show')->with('user', Auth::user());
       
    }

    public function edit() {
        return view('users.edit')->with('user', Auth::user());
       
    }
    public function update(Request $request) {
        $request->validate([
            'avatar'    =>'mimes:jpeg,jpg,png,gif|max:1048',
            'name'      =>'required|max:50',
            'email'     =>'required|email|max:50|unique:users,email,' . Auth::user()->id
            

        ]);

        $user =$this->user->findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;

        #if there is a new imagete 
        if($request->avatar){
            #delethe previous avatar from the 
            if($user->avatar){
                $this->deleteAvatar($user->avatar);
            }

            #save the new avatar
            $user->avatar = $this->saveAvatar($request->avatar);
        }

        $user->save();

        return redirect()->route('profile.show');
       
    }

    public function saveAvatar($avatar) {
        // Change the name of the avatar to CURRENT TIME to avoid overwriting
       
        $avatar_name = time() . "." . $avatar->extension();

        // Save the avatar to storage/app/pbulic/images/
        $avatar->storeAs(self::LOCAL_STORAGE_FOLDER , $avatar_name);
        return $avatar_name;
    }

        public function deleteAvatar($avatar) {
        $avatar_path = self::LOCAL_STORAGE_FOLDER .$avatar;
        // Sample:$image_past = 'avatars/172364947.jpg'

        if(Storage::disk('public')->exists($avatar_path)){
            Storage::disk('public')->delete($avatar_path);
        }
       
    }



}



