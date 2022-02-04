<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Title;
use App\Http\Resources\TitleCollection;

class EmployeeTitleController extends Controller
{
    public function index($id) {
        $title = Title::get()->where('id', $id);

        if (count($title) == 0) {
            return response()->json('No data!', 404);
        }

        return new TitleCollection($title);
    }
}
