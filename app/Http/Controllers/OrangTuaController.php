<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Murid;
use App\OrangTua;
use Session;
class OrangTuaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orangtua = OrangTua::with('Murid')->get();
        return view('orangtua.index',compact('orangtua'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mrd = Murid::all();
        return view('orangtua.create',compact('mrd'));
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
            'nama' => 'required|',
            'murid_id' => 'required'
        ]);
        $orangtua = new OrangTua;
        $orangtua->nama = $request->nama;
        $orangtua->murid_id = $request->murid_id;
        $orangtua->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$orangtua->nama</b>"
        ]);
        return redirect()->route('orangtua.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orangtua = OrangTua::findOrFail($id);
        return view('orangtua.show',compact('orangtua'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orangtua = OrangTua::findOrFail($id);
        $mrd = Murid::all();
        $selectedMrd = OrangTua::findOrFail($id)->murid_id;
        return view('orangtua.edit',compact('mrd','orangtua','selectedMrd'));
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
        $this->validate($request,[
            'nama' => 'required|',
            'murid_id' => 'required'
        ]);
        $orangtua = OrangTua::findOrFail($id);
        $orangtua->nama = $request->nama;
        $orangtua->murid_id = $request->murid_id;
        $orangtua->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$orangtua->nama</b>"
        ]);
        return redirect()->route('orangtua.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $n = OrangTua::findOrFail($id);
        $n->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('orangtua.index');
    }
}
