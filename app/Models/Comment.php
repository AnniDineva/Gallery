<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $fillable = ['comment', 'photo_id', 'user_id','created_at', 'updated_at']; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
