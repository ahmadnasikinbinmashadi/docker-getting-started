<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentLike extends Model
{
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}