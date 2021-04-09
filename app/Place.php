<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    protected $fillable = [
        'place_name', 'country', 'address','lat','lng','phone','link','comment','profile_photo'
    ];
    
    
    public function hashTags(){
        return $this->belongsToMany('App\HashTag');
    }
    
    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'place_user', 'place_id','user_id')->withTimestamps();
        
    }
    
}
