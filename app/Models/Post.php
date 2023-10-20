<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()/*: BelongsTo)*/{
        return $this->belongsTo(User::class);
    }
    public function category()/*: BelongsTo*/{
        return $this->belongsTo(Category::class);
    }
    public function comments()/*: MorphMany*/{
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function image()/*:MorphOne*/{
        return $this->morphOne(Image::class, 'imageable');
    }
    public function tags()/*:MorphToMany*/{
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
