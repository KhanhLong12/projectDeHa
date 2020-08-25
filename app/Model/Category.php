<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','parent_category','display'];
    public $timestamps = true;

    public function posts()
    {
    	return $this->hasMany('App\Model\Posts','auther_id');
    }


    public function listItems($options){
        if ($options == 'get_all_items') {
            $result = Category::all();
        }
        elseif ($options == 'get_parent_name') {
            $result = Category::where('parent_category','=','danh muc cha')->get();
        }
            
    	return $result;
    }
    public function store($attribute){
        $result = Category::create($attribute);
        return $result;
    }
    
}
