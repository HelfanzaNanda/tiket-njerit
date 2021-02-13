<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $dates = ['date'];

    public function passanger()
    {
        return $this->belongsTo(Passanger::class);
    }

    public function departure()
    {
        return $this->belongsTo(Departure::class);
    }
}
