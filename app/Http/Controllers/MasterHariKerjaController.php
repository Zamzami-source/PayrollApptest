<?php

namespace App\Http\Controllers;

use App\Models\MasterGaji;
use App\Models\MasterHariKerja;
use Illuminate\Http\Request;

class MasterHariKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master_hari_kerja.index', [
            'hari_kerjas' => MasterHariKerja::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master_hari_kerja.create');
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
            'hari' => 'required',
            'jam_masuk' => '',
            'jam_pulang' => ''
        ]);

        MasterHariKerja::create($validatedData);
        return redirect('/master_hari_kerja')->with('success', 'New data hari kerja has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterHariKerja  $masterHariKerja
     * @return \Illuminate\Http\Response
     */
    public function show(MasterHariKerja $masterHariKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterHariKerja  $masterHariKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterHariKerja $masterHariKerja)
    {
        return view('master_hari_kerja.edit', [
            'hari_kerjas' => $masterHariKerja
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterHariKerja  $masterHariKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterHariKerja $masterHariKerja)
    {
        $validatedData = $request->validate([
            'hari' => 'required',
            'jam_masuk' => 'required',
            'jam_pulang' => 'required'
        ]);

        MasterHariKerja::where('id', $masterHariKerja->id)->update($validatedData);
        return redirect('/master_hari_kerja')->with('success', 'data hari kerja has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterHariKerja  $masterHariKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterHariKerja $masterHariKerja)
    {
        MasterHariKerja::destroy($masterHariKerja->id);
        return redirect('/master_hari_kerja')->with('success', 'data hari kerja has been deleted');
    }
}
