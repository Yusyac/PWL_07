<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        $posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(5); 
        return view('users.Index', compact('mahasiswas'), ['posts' => $posts]); 
        with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.Create');
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
            'Nim' => 'required', 
            'Nama' => 'required', 
            'Tanggal_Lahir' => 'required',
            'Kelas' => 'required', 
            'Jurusan' => 'required',
            'Email' => 'required', 
            'No_Handphone' => 'required', ]);

            Mahasiswa::create($request->all());

            return redirect()->route('mahasiswa.index') ->with('Success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $Nim
     * @return \Illuminate\Http\Response
     */
    public function show($Nim)
    {
        $List = Mahasiswa::find($Nim); 
        return view('users.Detail', compact('List'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $Nim
     * @return \Illuminate\Http\Response
     */
    public function edit($Nim)
    {
        $List = Mahasiswa::find($Nim); 
        return view('users.Edit', compact('List'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $Nim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Nim)
    {
        $request->validate([ 
            'Nim' => 'required', 
            'Nama' => 'required',
            'Tanggal_Lahir' => 'required',
            'Kelas' => 'required', 
            'Jurusan' => 'required',
            'Email' => 'required',
            'No_Handphone' => 'required', ]);

            Mahasiswa::find($Nim)->update($request->all());

            return redirect()->route('mahasiswa.index') ->with('Success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $Nim
     * @return \Illuminate\Http\Response
     */
    public function destroy($Nim)
    {
        Mahasiswa::find($Nim)->delete(); 
        return redirect()->route('mahasiswa.index') -> with('Success', 'Mahasiswa Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $List = Mahasiswa::where('Nim', 'like', "%" . $keyword . "%")->paginate(5);
        return view('users.Search', compact('List'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

}
