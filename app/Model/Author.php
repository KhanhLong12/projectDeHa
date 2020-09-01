<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Post;

class Author extends Model
{
    protected $table = 'authors';
    protected $fillable = ['name','thumbnail'];

    public function posts()
    {
        return $this->hasMany('App\Model\Post','author_id');
    }

    public function listItems($options){
        if ($options == 'get_all_items') {
            $result = $this->all();
        }
            
    	return $result;
    }

    public function createAuthor($attribute){
        $thumb                    = $attribute['thumbnail'];
        $attribute['thumbnail']   = time().'.'.$thumb->getClientOriginalExtension();
        $destinationPath          = public_path('images/author');
        $thumb->move($destinationPath, $attribute['thumbnail']);
        $result = $this->create($attribute);
        return $result;
    }

    public function search($search){
        $result = $this->where('name', 'like', '%'. $search .'%')->get();
        return $result;
    }

    public function detail($id){
        $author = $this->findOrFail($id);
        $result = Post::where('author_id','=',$author->id)->get();
        $data   = [$author, $result];
        return $data;
    }

    public function editAuthor($id){
        $author = $this->find($id);
        return $author;
    }

    public function updateAuthor($attribute){
        if(isset($attribute['thumbnail'])){
            $thumb                    = $attribute['thumbnail'];
            $attribute['thumbnail']   = time().'.'.$thumb->getClientOriginalExtension();
            $destinationPath          = public_path('images/author');
            $thumb->move($destinationPath, $attribute['thumbnail']);
        }
        $author = $this->update($attribute);
        return $author;
    }

}
