<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Title;
use \App\Models\Employer;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "phoneNumber",
        "age",
        "titleId"
    ];

    protected $table = 'employees';
    public $primaryKey = 'id';

    public function title() {
        return $this->hasMany(Title::class, 'id', 'titleId');
    }

    public function employer() {
        return $this->belongsTo(Employer::class);
    }
}
