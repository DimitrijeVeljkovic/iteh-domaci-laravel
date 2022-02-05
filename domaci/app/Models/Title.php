<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Employee;

class Title extends Model
{
    use HasFactory;

    protected $fillable = [
        'titleName',
        'description'
    ];

    protected $table = 'titles';
    public $primaryKey = 'id';

    public function employee() {
        return $this->belongsTo(Employee::class);
    }
}
