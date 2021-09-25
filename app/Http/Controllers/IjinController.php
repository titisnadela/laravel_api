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
        
        return Ijin::all();
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

        // $todayDate = Carbon::now([
        //     'waktu_ijin' => dd($todayDate),
        //     'waktu_kembali' => dd($todayDate)
        // ]);

        // $response = [
        //     'waktu_ijin' => $todayDate,
        //     'waktu_kembali' => $todayDate
        // ];
        
        return Ijin::create($request->all());
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
        $ijin = Ijin::find($id);
        $ijin->update($request->all());
        return $ijin;
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
