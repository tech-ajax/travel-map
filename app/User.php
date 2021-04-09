<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Place;



class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'role','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function place(){
        return $this->hasOne('App\Place');
        
    }
    
     public function favorites()
    {
        return $this->belongsToMany(Place::class, 'favorites', 'user_id', 'place_id')->withTimestamps();
    }
    
    
    public function favorite($placeId)
    {
        // すでにお気に入りをしているかの確認
        $exist = $this->is_favorite($placeId);
       
        if ($exist) {
            return false;
        } else {
            $this->favorites()->attach($placeId);
            return true;
        }
    }
    
    public function unfavorite($placeId)
    {
        $exist = $this->is_favorite($placeId);
        
        if ($exist) {
            $this->favorites()->detach($placeId);
            return true;
        } else {
            return false;
        }
    }
    
    
    public function is_favorite($placeId)
    {
        
        // お気に入りの中に $placeIdのものが存在するか
        return $this->favorites()->where('place_id', $placeId)->exists();
    }
    
    
}
