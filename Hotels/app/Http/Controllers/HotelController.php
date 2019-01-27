<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //get data from model Hotel and sort in descending order
         $hotels = Hotel::orderBy('created_at','desc')->get();
       //send the data to home view 
          return view('home')->with('hotels',$hotels);    

               

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
         $this->validate($request,[
            'title'=>'required',
            'desc'=>'required',
            'image'=>'required' 
        ]);


         $store = new Hotel;
        $files= $request->file('image');
           //get file name with extension
          $fileNameWithExt=$files->getClientOriginalName();
            //get just file name
            $filename=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            //GET JUST THE EXTENSION
            $extension =$files->getClientOriginalExtension();
            //file name to store
              $filenameToStore=$filename.'_'.time().'.'.$extension;
           
            //upload file
            $path=$files->storeAs('public/images/',$filenameToStore);
        $store->title= $request->title;
        $store->description= $request->desc;
        $store->image=$filenameToStore;
        $store->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show each hotel
         $hotel = Hotel::find($id);
       
          return view('details')->with('hotel',$hotel); 
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
