<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public function students(){
        return $this->hasMany(Student::class);
    }

    protected $fillable=[
        'City',
        'Country',
        'Street',
        'PostalCode'
    ]
}
