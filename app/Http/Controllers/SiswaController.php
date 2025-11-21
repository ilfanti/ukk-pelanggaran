<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'nis' => 'required',
        'nama' => 'required',
        'jenis_kelamin' => 'required',
        'agama' => 'required',
        'alamat' => 'required',
        'foto' => 'nullable|image|max:2048'
    ]);

    // upload foto
    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('fotos', 'public');
    }

    Siswa::create($data);

    return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
}


    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nis' => 'required|unique:siswa,nis,' . $siswa->id,
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'foto' => 'image|max:2048',
        ]);

        $data = $request->only(['nis', 'nama', 'jenis_kelamin', 'agama', 'alamat']);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('fotos', 'public');
            $data['foto'] = $fotoPath;
        }

        $siswa->update($data);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
