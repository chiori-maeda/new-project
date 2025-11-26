<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model{
    public function comment() {
       $this->belongsTo(Post::class);
    }
}
?>
