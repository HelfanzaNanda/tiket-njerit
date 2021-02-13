<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function departure()
    {
        return $this->hasOne(Departure::class);
    }

    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
