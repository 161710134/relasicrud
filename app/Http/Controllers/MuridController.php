<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Murid;
use App\Guru;
use Session;

class MuridController extends Controller
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
        $mrd = Murid::with('Guru')->get();
        return view('murid.index',compact('mrd'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        return view('murid.create',compact('guru'));
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
            'nik' => 'required|unique:murids',
            'guru_id' => 'required'
        ]);
        $mrd = new Murid;
        $mrd->nama = $request->nama;
        $mrd->nik = $request->nik;
        $mrd->guru_id = $request->guru_id;
        $mrd->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$mrd->nama</b>"
        ]);
        return redirect()->route('murid.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mrd = Murid::findOrFail($id);
        return view('murid.show',compact('mrd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mrd = Murid::findOrFail($id);
        $guru = Guru::all();
        $selectedGuru = Murid::findOrFail($id)->guru_id;
        return view('murid.edit',compact('mrd','guru','selectedGuru'));
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
            'nik' => 'required|',
            'guru_id' => 'required'
        ]);
        $mrd = Murid::findOrFail($id);
        $mrd->nama = $request->nama;
        $mrd->nik = $request->nik;
        $mrd->guru_id = $request->guru_id;
        $mrd->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$mrd->nama</b>"
        ]);
        return redirect()->route('murid.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $h = Murid::findOrFail($id);
        $h->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('murid.index');
    }
}
