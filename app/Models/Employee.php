<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Employee extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'employees';
    protected $appends = ['full_name'];

    // public $sortable = [
    //     'full_name', 'first_name', 'last_name', 'company', 'email', 'phone', 'created_at'
    // ];

    public function getFullNameAttribute($value)
    {
        return "{$this->first_name} {$this->last_name}";
    }


}
