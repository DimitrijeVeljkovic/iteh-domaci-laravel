<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Employee;

class Employer extends Model
{
    protected $table = 'employers';
    public $primaryKey = 'id';

    public function employee() {
        return $this->hasMany(Employee::class, 'id', 'employeeId');
    }
}
