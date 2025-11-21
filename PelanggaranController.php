<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    public function index()
    {
        $pelanggaran = Pelanggaran::all();
        return view('pelanggaran.index', compact('pelanggaran'));
    }

    public function create()
    {
        return view('pelanggaran.create');
    }

     public function store(Request $request)
    {
        $request->validate([
            'foto' => 'nullable|image|max:2048',
            'tanggal' => 'required|date',
        ]);

        // proses upload foto
       if ($request->hasFile('foto')) {
    $foto = $request->file('foto')->store('pelanggaran', 'public');
}


        Pelanggaran::create([
            'foto' => $foto,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('pelanggaran.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pelanggaran = Pelanggaran::findOrFail($id);
        return view('pelanggaran.edit', compact('pelanggaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'foto' => 'nullable|image|max:2048',
            'tanggal' => 'required|date',
        ]);

        $pel = Pelanggaran::findOrFail($id);
        $pel->tanggal = $request->tanggal;

        $foto = null;
        if ($request->hasFile('foto')) {
        $foto = $request->file('foto')->store('pelanggaran', 'public');
}


        if ($request->hasFile('foto')) {

            $filename = time() . '.' . $request->foto->extension();

            // simpan ke folder fotos
            $request->foto->storeAs('public/fotos', $filename);

            // simpan ke database
            $pel->foto = 'fotos/' . $filename;
        }

        $pel->save();

        return redirect()->route('pelanggaran.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        Pelanggaran::findOrFail($id)->delete();
        return redirect()->route('pelanggaran.index')->with('success', 'Data berhasil dihapus!');
    }
}
