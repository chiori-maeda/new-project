<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mockery\Generator\Method;

class Pays extends Model{
    protected $fillable = [
        'user_id','post_id','shipping_address'
    ];

     public function post() {
       return $this->belongsTo(User::class);
    }


    public function user() {
       return $this->belongsTo(Post::class);
    }
}
?>