<?php

namespace App\Models;

use App\Models\UserProfile;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
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
    ];

    public function profile(){
        return $this->hasOne(UserProfile::class,'user_id');
    }
    public function pharmacy(){
        return $this->hasOne(Pharmacy::class,'user_id');
    }

    public function advertisement(){
        return $this->hasMany(Advertisement::class,'user_id');
    }


    public function admin(){
        if($this->type == 1){
            return true;
        }else{
            return false;
        }
    }
    public function pharmacyType(){
        if($this->type == 2){
            return true;
        }else{
            return false;
        }
    }

    public function orders(){
        return $this->hasMany(Order::class,'user_id');
    }


}
