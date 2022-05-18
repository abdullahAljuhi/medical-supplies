<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

   protected $fillable = [
       'total_price',
       'delivery_price',
       'user_id',
       'pharmacy_id',
       'address',
       'products',
       'status',
       'type',
   ];


   public function pharmacy(){
    return $this->belongsTo(Pharmacy::class,'pharmacy_id');
   }
   public function user(){
    return $this->belongsTo(User::class,'user_id');

   }



}
