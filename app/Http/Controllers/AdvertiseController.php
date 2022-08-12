<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Add;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdvertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adds=Add::latest()->get();
        return view('advertise.index',compact('adds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('advertise.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $add_pic = $request->image;
        $add_pic_name = time() . '.' . $add_pic->extension();
        Storage::putFileAs('public/articles', $add_pic,  $add_pic_name);
         $add=new Add;
         $add->image=$add_pic_name;
         $textToOutput = nl2br(htmlentities($request->description, ENT_QUOTES, 'UTF-8'));
         $add->description=$textToOutput;
         $add->link=$request->link;
         $add->save();
         return redirect()->back()->with('add_saved', 'تم حفظ الاعلان بنجاح');
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
        $add = Add::find($id);
        $img_destination = 'storage/articles/' . $add->image;
        if (File::exists($img_destination)) {
            File::delete($img_destination);
        }
        $add->delete();
        return redirect()->back();
    }
}
