<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'user_id',
        'category_id',
        'created_at',
        'updated_at',
    ];

    public function user() {
       return $this->belongsTo('App\User');
    }

    public function category() {
        return $this->belongsTo('App\Model\Category');
    }

    public function getRouteKeyName() {
        return 'slug';
    }

    public function createSlug($title) {
        $slug = Str::slug($title, '-');

        $oldPost = Post::where('slug', $slug)->first();

        $c = 0;
        while ($oldPost) {
            $newSlug = $slug . '-' . $c;
            $oldPost = Post::where('slug', $newSlug)->first();
            $c++;
        }

        return (empty($newSlug)) ? $slug : $newSlug;
    }
}
