<?php

namespace App\Http\Controllers;

use App\Models\tamu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tamus = tamu::orderBy('hadir', 'ASC')->simplePaginate(10);
        return view('buku', ['tamus' => $tamus]);
    }

    public function search(Request $request)
    {
        $keyword = $request->cari;
        $tamus = tamu::where('nama', 'like', "%" . $keyword . "%")->simplePaginate(10);
        return view('buku', compact('tamus'))->with('i', (request()->input('page', 1) - 1) * 10);
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
        //
        $request->validate([
            'nama' => 'required',
        ]);

        $tamu = new tamu;
        $tamu->nama = $request->nama;
        $tamu->hadir = 1;
        $tamu->save();

        if($tamu){
            return redirect()->route('landing')->with(['success' => 'Data Tamu'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->route('landing')->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function show(tamu $tamu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function edit($tamu)
    {
        //
        // $id = Crypt::decrypt($request->tamu);

        // $update = tamu::find($id);
        $tamu = tamu::where('id',  Crypt::decrypt($tamu))->update([
            'hadir' => 1,
        ]);

        if ($tamu) {
            return redirect()
                ->route('landing')
                ->with([
                    'success' => 'Tamu has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tamu $tamu)
    {
        //
    }

    public function report()
    {
        $tamuData = tamu::select(DB::raw("COUNT(*) as count"))
                    ->where('hadir', 1)
                    ->groupBy(DB::raw("HOUR(updated_at)"))
                    ->pluck('count');
        // dd($tamuData);
        $tamus = tamu::where('hadir', 1)->orderBy('updated_at', 'DESC')->paginate(5);
        $jumlah_hadir = tamu::where('hadir', 1)->count();
        $jumlah_tamu = tamu::all()->count();
        return view('report', compact('tamuData', 'tamus', 'jumlah_hadir', 'jumlah_tamu'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function destroy(tamu $tamu)
    {
        //
    }
}
