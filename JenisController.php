<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;

class JenisController extends Controller
{
    public function index()
    {
        $jenis = Jenis::all();
        return view('jenis.index', compact('jenis'));
    }

    public function create()
    {
        return view('jenis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required',
            'keterangan' => 'nullable',
            'poin' => 'required|integer',
        ]);

        Jenis::create([
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
            'poin' => $request->poin,
        ]);

        return redirect()->route('jenis.index')->with('success', 'Data Jenis Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $jenis = Jenis::findOrFail($id);
        return view('jenis.edit', compact('jenis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required',
            'keterangan' => 'nullable',
            'poin' => 'required|integer',
        ]);

        $jenis = Jenis::findOrFail($id);
        $jenis->update([
            'jenis' => $request->jenis,
            'keterangan' => $request->keterangan,
            'poin' => $request->poin,
        ]);

        return redirect()->route('jenis.index')->with('success', 'Data Jenis Berhasil Diupdate');
    }

    public function destroy($id)
    {
        $jenis = Jenis::findOrFail($id);
        $jenis->delete();

        return redirect()->route('jenis.index')->with('success', 'Data Jenis Berhasil Dihapus');
    }
}
