<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        return Karyawan::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email|unique:karyawans',
        ]);

        return Karyawan::create($request->all());
    }

    public function show($id)
    {
        return Karyawan::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());
        return $karyawan;
    }

    public function destroy($id)
    {
        return Karyawan::destroy($id);
    }
}
