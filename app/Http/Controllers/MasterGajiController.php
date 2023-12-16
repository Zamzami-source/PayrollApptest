<?php

namespace App\Http\Controllers;

use App\Models\MasterGaji;
use Illuminate\Http\Request;

class MasterGajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master_gaji.index', [
            'gajis' => MasterGaji::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master_gaji.create');
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
            'jumlah_gaji' => 'required'
        ]);

        MasterGaji::create($validatedData);
        return redirect('/master_gaji')->with('success', 'New data gaji has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterGaji  $masterGaji
     * @return \Illuminate\Http\Response
     */
    public function show(MasterGaji $masterGaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterGaji  $masterGaji
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterGaji $masterGaji)
    {
        return view('master_gaji.edit', [
            'gajis' => $masterGaji
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterGaji  $masterGaji
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterGaji $masterGaji)
    {
        $validatedData = $request->validate([
            'jumlah_gaji' => 'required'
        ]);

        MasterGaji::where('id', $masterGaji->id)->update($validatedData);
        return redirect('/master_gaji')->with('success', 'data gaji has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterGaji  $masterGaji
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterGaji $masterGaji)
    {
        MasterGaji::destroy($masterGaji->id);
        return redirect('/master_gaji')->with('success', 'data gaji has been deleted');
    }
}
