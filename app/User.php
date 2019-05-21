<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'photo_filename', 'password',
    ];

    protected $visible = [
        'name', 'photo_url'
    ];

    protected $appends = [
        'photo_url'
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function getPhotoUrlAttribute()
    {
        if ($this->photo_filename) {
            $photo_url = Storage::cloud()->url($this->photo_filename);
        } else {
            $photo_url = Storage::cloud()->url('placeholder.jpg');
        }
        return $photo_url;
    }
}
