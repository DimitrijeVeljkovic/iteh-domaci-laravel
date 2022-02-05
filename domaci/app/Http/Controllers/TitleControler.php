<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Employer;
use App\Http\Resources\TitleCollection;
use App\Http\Resources\TitleResource;
use Illuminate\Support\Facades\Validator;

class TitleControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TitleCollection(Title::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titleName' => 'required|string|max:30',
            'description' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $title = Title::create([
            'titleName' => $request->titleName,
            'description' => $request->description
        ]);

        $title->save();

        return response()->json(['Title is created successfully.', new TitleResource($title)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function show(Title $title)
    {
        return new TitleResource($title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function edit(Title $title)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Title $title)
    {
        $validator = Validator::make($request->all(),[
            'titleName' => 'required|string|max:30',
            'description' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $title->titleName = $request->titleName;
        $title->description = $request->description;

        $title->save();

        return response()->json(['Title is updated successfully!', new TitleResource($title)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function destroy(Title $title)
    {
        $title->delete();
        return response()->json('Title is deleted successfully!');
    }
}
