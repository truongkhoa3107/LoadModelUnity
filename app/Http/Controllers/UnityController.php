<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UnityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('show3dModel');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'name' => 'required',
            'files' => 'required',
            'file_type' => 'required',
            'main' => 'required',
            'preview' => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

        $date = date('Y-m-d');
        $folder = $date.time();
        $files = $request->file('files');
        foreach ($files as $file) {
            $file_name = $file->getClientOriginalName();
            $fileName = pathinfo($file_name, PATHINFO_FILENAME);
         
            try {
                $path = Storage::disk('public')->putFileAs($folder , $file, $file_name);
            } catch (\Exception $e) {
                return false;
            }
        }

        if ($request->hasFile('preview')) {
            $file = $request->file('preview');
            $file_name = $file->getClientOriginalName();
            $imageName = time().'.'.$file->extension();  
            $preview_path = Storage::disk('public')->putFileAs($folder, $file, $file_name);
        
        }

        if ($request->hasFile('main')) {
            $file = $request->file('main');
            $file_name = $file->getClientOriginalName();
            $imageName = time().'.'.$file->extension();  
            $path = Storage::disk('public')->putFileAs($folder,$file, $file_name);
        
        }

        return response()->json(['success'=> true, 'msg'=>'Record is successfully added', 'url'=> '/']);
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
