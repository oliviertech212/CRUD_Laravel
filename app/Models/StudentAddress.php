<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAddress extends Model
{
    use HasFactory;

    public function students(){
        return $this->hasMany(Student::class,'student_address_id');
    }
    protected $table = 'studentaddresses';

    protected $fillable = ['postalCode', 'street', 'city', 'country'];
}
