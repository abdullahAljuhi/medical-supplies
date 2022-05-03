<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'street',
        'details',
        'lat',
        'lang',
        'city_id',
        'governorate_id',
        'pharmacy_id',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        
        'remember_token',
    ];
    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
    public function governorate(){
        return $this->belongsTo(Governorate::class,'governorate_id');
    }
    
}
