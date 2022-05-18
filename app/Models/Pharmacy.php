<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pharmacy_name',
        'license',
        'user_id',
        'mobile',
        'phone',
        'fax',
        'image',
        'description',
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


    public function address(){
        return $this->hasMany(Address::class,'pharmacy_id');
    }

    public function contact(){
        return $this->hasMany(Contact::class,'pharmacy_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    // public function governorate(){
    //     return $this -> hasMany('App\Models\Doctor','hospital_id','id');
    // }

    // public function getIsActiveAttribute($value)
    // {
    //     if ($value)
    //         return 'مفعل';
    //     else
    //         return 'غير مفعل';
    // }

    // public function admin(){
    //     if($this->type == 1){
    //         return true;
    //     }else{
    //         return false;
    //     }
    // }

    public function orders(){
        return $this->hasMany(Order::class,'pharmacy_id');
    }
}
