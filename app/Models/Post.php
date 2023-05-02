<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'imageurl',
        'language',
        'pubdate',
        'title',
        'source',
        'link',
    ];

    public function tags(){
        return $this->hasMany(Tag::class);
    }

    public function countries(){
        return $this->hasMany(Country::class);
    }

    public function keywords(){
        return $this->hasMany(Keyword::class);
    }

    public function creators(){
        return $this->hasMany(Creator::class);
    }
}
