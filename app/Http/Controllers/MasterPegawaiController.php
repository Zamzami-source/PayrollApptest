<?php

namespace App\Http\Controllers;

use App\Models\MasterGaji;
use App\Models\MasterPegawai;
use Illuminate\Http\Request;

class MasterPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master_pegawai.index', [
            'pegawais' => MasterPegawai::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master_pegawai.create', [
            'gajis' => MasterGaji::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pegawai' => 'required',
            'no_hp' => 'required',
            'gaji_id' => 'required'
        ]);

        MasterPegawai::create($validatedData);
        return redirect('/master_pegawai')->with('success', 'New data pegawai has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterPegawai  $masterPegawai
     * @return \Illuminate\Http\Response
     */
    public function show(MasterPegawai $masterPegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterPegawai  $masterPegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterPegawai $masterPegawai)
    {
        return view('master_pegawai.edit', [
            'pegawais' => $masterPegawai,
            'gajis' => MasterGaji::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterPegawai  $masterPegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterPegawai $masterPegawai)
    {
        $validatedData = $request->validate([
            'nama_pegawai' => 'required',
            'no_hp' => 'required',
            'gaji_id' => 'required'
        ]);

        MasterPegawai::where('id', $masterPegawai->id)->update($validatedData);
        return redirect('/master_pegawai')->with('success', 'data pegawai has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterPegawai  $masterPegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterPegawai $masterPegawai)
    {
        MasterPegawai::destroy($masterPegawai->id);
        return redirect('/master_pegawai')->with('success', 'data pegawai has been deleted');
    }
}
