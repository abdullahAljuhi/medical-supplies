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
        'name',
        'email',
        'password',
        'license',
        'description'
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
        return $this->haMany(Address::class,'id');
    }

    public function contact(){
        return $this->haMany(Address::class,'id');
    }
    public function getImgAttribute($value)
    {
        return url("assests/images/pharmacies/") . "/" . $value;
    }
    public function getIsActiveAttribute($value)
    {
        if ($value)
            return 'غير مفعل';
        else
            return 'مفعل';
    }
}
