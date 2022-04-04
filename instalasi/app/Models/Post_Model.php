<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Post_Model extends Model
{
    use HasFactory;
    use Sluggable; //membuat slug otomatis

    //agar bisa isi database
    //protected $fillable = ['title', 'excerpt', 'body']; //yang boleh diisi
    protected $guarded = ['id']; //yang tidak boleh
    protected $with = ['category', 'author']; //n+1

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $fillters)
    {
        // if (isset($fillters['search']) ? $fillters['search'] : false) {
        //     return $query->where('title', 'like', '%' . $fillters['search'] . '%')->orWhere('body',  'like', '%' . $fillters['search'] . '%');
        // }
        $query->when($fillters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')->orWhere('body',  'like', '%' . $search . '%');
        });
        $query->when($fillters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
        $query->when(
            $fillters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function getRouteKey()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
