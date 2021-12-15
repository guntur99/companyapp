<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';

    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }
}
