<?php

namespace App\Http\Controllers;

use App\Models\Ijin;
use Illuminate\Http\Request;
use Carbon\Carbon;

class IjinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $todayDate = Carbon::now();
        // dd($todayDate);
        
        // $database = DB::table("ijins")->orderByRaw("DATE_FORMAT('d-m-Y',startDate), ASC")->get();
        // return $database;
        // return Ijin::all()->sortByDesc("id");

        return Ijin::orderByDesc('id')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'waktu_ijin' => 'required',
            'mesin' => 'required',
            'keterangan' => 'required',
            'waktu_kembali' => 'required'
        ]);

        
        return Ijin::create($request->all());
    }


    public function status() {

        $database = Ijin::where("status", "=", 1)->get();
        //dd($database);
        return $database;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Ijin::find($id);
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
        $database= Ijin::find($id);
        $database->status= 2;
        $database->save();
        
        // $ijin = Ijin::find($id);
        // $ijin->update($request->all());
        // return $ijin;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Ijin::destroy($id);
    }

       /**
     * Search for a nik
     *
     * @param  int  $nik
     * @return \Illuminate\Http\Response
     */
    public function search($nik)
    {
        return Ijin::where('nik', 'like', '%'.$nik.'%')->get();
    }
}
