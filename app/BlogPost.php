<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class BlogPost extends Eloquent
{
    protected $connection = 'mongodb';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'user_id'
    ];

    /**
     * Get the parent blog
     */
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    /**
     * Get the comments
     */
    public function comments()
    {
        return $this->hasMany(BlogPostComment::class);
    }

    /**
     * Get the user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
