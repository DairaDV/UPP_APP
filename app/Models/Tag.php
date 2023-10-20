<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function users(){
        return $this->morphedByMany(User::class, 'taggable');
    }

    public function posts(): MorphToMany{
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function videos(): MorphToMany{
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
