<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\MasterHariKerja;
use App\Models\MasterPegawai;
use Illuminate\Http\Request;

use Carbon\Carbon;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('absensi.index', [
            'absensis' => Absensi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('absensi.create', [
            'pegawais' => MasterPegawai::all(),
            'harikerjas' => MasterHariKerja::all()
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
        // dd($request->all());
        $request->merge(['create_at' => Carbon::now()]);
        $request->validate([
            'pegawai_id' => 'required',
            'hari_id' => 'required',
            'keterlambatan' => '',
            'denda' => '',
            'kehadiran' => 'required'
        ]);

        $hari = MasterHariKerja::findOrFail($request->input('hari_id'));
        $jamMasukKerja = $hari->jam_masuk;

        $jamMasukKerja = Carbon::parse('08:15');
        $jamAbsen = Carbon::parse($request->input('create_at'));

        if ($jamAbsen->gt($jamMasukKerja)) {

            $keterlambatan = $jamAbsen->diffInMinutes($jamMasukKerja);

            $denda = $keterlambatan * 500;

            $request->merge([
                'keterlambatan' => $keterlambatan,
                'denda' => $denda,
            ]);
        }

        Absensi::create($request->all());
        return redirect('/absensi')->with('success', 'New data absen has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        Absensi::destroy($absensi->id);
        return redirect('/absensi')->with('success', 'data absen has been deleted');
    }
}
