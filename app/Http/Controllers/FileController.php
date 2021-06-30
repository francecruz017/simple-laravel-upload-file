<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'fileToUpload' => 'required|file|max:5000',
        ]);

        if($validator->fails()) {
            return "file is required, must be a file, max of 5mb";
        }

        if($request->keepOriginalName) {
            $request->file('fileToUpload')->storeAs(
                'uploads', $request->file('fileToUpload')->getClientOriginalName()
            );
        } else {
            $path = $request->file("fileToUpload")->store("uploads");
        }

        return redirect("/")
        ->with(['filepath' => $path]);
    }

    public function download(Request $request) 
    {
        if($request->filepath) {
            return Storage::download($request->filepath);
        }

        return "no file found";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
