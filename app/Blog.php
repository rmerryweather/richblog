<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Blog extends Eloquent
{
    protected $connection = 'mongodb';
}
