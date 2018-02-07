<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Blog extends Eloquent
{
    protected $connection = 'mongodb';

    /**
     * Get the posts for the blog.
     */
    public function posts()
    {
        return $this->hasMany('App\BlogPost');
    }
}
