<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Author extends Model
{
    protected $table = 'authors';
    protected $fillable = ['name', 'thumbnail'];

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }


    public function createNew($attribute, $thumbnail)
    {
        $attribute['thumbnail'] = $this->insertImage($thumbnail);
        $result = $this->create($attribute);
        return $result;
    }

    public function search($name)
    {
        return $this->when($name, function ($query) use ($name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })->paginate(2);
    }

    public function updateThumbnail($thumbnail, $currentThumbnail)
    {
        if ($currentThumbnail) {
            File::delete('images/author/' . $currentThumbnail);
        }
        $currentThumbnail = $this->insertImage($thumbnail);
        return $currentThumbnail;
    }

    public function updateAuthor($id, $attribute, $thumbnail)
    {
        $author = $this->find($id);
        $attribute['thumbnail'] = $this->updateThumbnail($thumbnail, $author['thumbnail']);
        return $this->update($attribute);

    }

    public function insertImage($image)
    {
        $nameImage = '';
        if ($image != null) {
            $nameImage = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images/author');
            $image->move($destinationPath, $nameImage);
        }
        return $nameImage;
    }

    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = strtoupper($value);
    }

}
