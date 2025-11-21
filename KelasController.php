<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'kelas' => 'required',
        'wali_kelas' => 'required',
        'keterangan' => 'nullable',
    ]);

    Kelas::create([
        'kelas' => $request->kelas,
        'wali_kelas' => $request->wali_kelas,
        'keterangan' => $request->keterangan,
    ]);
        
    return redirect()->route('kelas.index')->with('success', 'Data Kelas Berhasil Ditambahkan');
}



    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $request->validate([
            'kelas' => 'required|unique:kelas,kelas,' . $kelas->id,
            'wali_kelas' => 'required',
            'keterangan' => 'nullable',
        ]);

        $kelas->update($request->all());

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diupdate');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus');
    }
}
