<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $fillable = ['title', 'path', 'user_id','created_at', 'updated_at']; 

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}

