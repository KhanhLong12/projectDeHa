<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = ['name', 'category_id', 'author_id', 'description', 'content', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'post_id');
    }

    public function getUrlImage($images, $id)
    {
        $info_images = [];
        if (!is_null($images)) {
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
            $image->post_id = $id;
            $image->save();
        }
        return $info_images;
    }
}
