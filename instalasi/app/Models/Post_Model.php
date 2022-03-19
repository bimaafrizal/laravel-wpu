<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_Model extends Model
{
    use HasFactory;

    //agar bisa isi database
    //protected $fillable = ['title', 'excerpt', 'body']; //yang boleh diisi
    protected $guarded = ['id']; //yang tidak boleh
    protected $with = ['category', 'author'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
