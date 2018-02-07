<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class BlogPostComment extends Eloquent
{
    protected $connection = 'mongodb';

    /**
     * Get the parent blog post
     */
    public function postComments()
    {
        return $this->belongsTo(BlogPost::class);
    }

    /**
     * Get the user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
