<?php

namespace App\Http\Controllers;

use App\Fileupload;
use Illuminate\Http\Request;

class FileuploadController extends Controller
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
        $file = $request->file('uploadedfile');
        $filename = $file->getClientOriginalName();
        $filename = time(). '.' . $filename;

        $path = $file->storeAs('public', $filename);
        
        Fileupload::create([
            'filename' => $filename,
        ]);
           $savedfile = Fileupload::latest()->firstOrFail();
        return view('showupload')->with('savedfile', $savedfile);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fileupload  $fileupload
     * @return \Illuminate\Http\Response
     */
    public function show(Fileupload $fileupload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fileupload  $fileupload
     * @return \Illuminate\Http\Response
     */
    public function edit(Fileupload $fileupload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fileupload  $fileupload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fileupload $fileupload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fileupload  $fileupload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fileupload $fileupload)
    {
        //
    }
}