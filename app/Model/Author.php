<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    public function posts()
    {
        return $this->hasMany('App\Model\Post','author_id');
    }
}
