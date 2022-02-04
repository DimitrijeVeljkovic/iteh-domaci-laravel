<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Employee;
use App\Http\Resources\EmployeeCollection;

class EmployerEmployeeController extends Controller
{
    public function index($id) {
        $employees = Employee::get()->where('id', $id);

        if(count($employees) == 0) {
            return response()->json('No data!', 404);
        }

        return new EmployeeCollection($employees);
    }
}
