<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getFullPrice(){
        $sum = 0;
        foreach ($this->products as $product){
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }
    public function saveOrder($street, $building, $apartment, $phone){
        if ($this->status == 0){
            $this->street = $street;
            $this->building = $building;
            $this->apartment = $apartment;
            $this->phone = $phone;
            $this->status=1;
            $this->save();
            session()->forget('orderId');
            return true;
        }
        else{
            return false;
        }
    }
}
