<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable =[

       'user_id',
       'fname',
       'lname',
       'email',
       'phoneo',
       'adresse1',
       'adresse2',
       'phoneo',
       'city',
       'state',
       'country',
       'total_price',
       'pincode',
        'status',
       'message',
       'tracking_no',
    ];

    public function orderitem()
    {
        return $this->hasMany(OrderItem::class);
    }

}
