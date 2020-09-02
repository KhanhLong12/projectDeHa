<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Model\Image;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['name', 'category_id', 'author_id', 'description', 'content', 'status'];

    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }

    public function author()
    {
        return $this->belongsTo('App\Model\Author');
    }

    public function images()
    {
        return $this->hasMany('App\Model\Image', 'post_id');
    }

    public function listItems($options)
    {
        if ($options == 'get_all_items') 
        {
            $result = $this->all();
        }
            
    	return $result;
    }

    public function storePost($attribute)
    {
        $result = $this->create($attribute);
        return $result;
    }

    public function getUrlImage($file, $id)
    {
         $info_images = [];
          if ($file->hasFile('images')) {
            $images = $file->file('images');
            foreach ($images as $key => $image) {
                $namefile = $image->getClientOriginalName();
                $url = 'images/posts/' . $namefile;
                $destinationPath = public_path('images/posts');
                $image->move($destinationPath, $namefile);
                $info_images[] = [
                    'url' => $url,
                    'name' => $namefile
                ];
            }
        }
        
        foreach ($info_images as $img) {
            $image = new Image();
            $image->name = $img['name'];
            $image->path = $img['url'];
            $image->post_id= $id;
            $image->save();
        }
        return $info_images;
    }


    public function getIdPost($id){
        $post = $this->find($id);
        return $post;
    }

    public function deletePost(){
        $post = $this->delete();
        return $post;
    }


    public function editPost($id){
        $post   = $this->find($id);
        $images = Image::where('post_id','=',$post->id)->get();
        $data   = [$post,$images];
        return $data;
    }

    public function updatePost($attribute){
        $result = $this->update($attribute);
        return $result;
    }

    public function deleteImage($idPost){
        $image = Image::where('post_id', '=', $idPost)->delete();
        return $image;
    }
}
