<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class User extends Authenticatable
{
    use Notifiable, HybridRelations;

    protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the users blogs
     */
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    /**
     * Get the users blog posts
     */
    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class);
    }
}
