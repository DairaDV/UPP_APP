<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profile(){
        return  $this->hasOne(Profile::class);
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }    

    public function groups(){
        return $this->belongsToMany(Group::class)->withTimestamps();
    }  

    public function location(){
        return  $this->hasOneTrough(Location::class, Profile::class);
    }

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function posts(): HasMany{
        return $this->hasMany(Post::class);
    }

    public function videos(): HasMany{
        return $this->hasMany(Video::class);
    }

    public function comments(): HasMany{
        return $this->hasMany(Comment::class);
    }

    public function image()/*: morphOne*/{
        return $this->morphOne(Image::class, 'imageable');
    }

    public function city(){
        return $this->belongsTo(City::class);
    } 

    public function phone(){
        return $this->morphOne(Phone::class, 'phonable');
    }

    public function gender(){
        return $this->belongsTo(Gender::class);
    }
}




