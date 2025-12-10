<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    //create
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);

        $pelanggan = Pelanggan::create($request->all());

        return response()->json([
            'pesan' => 'Data pelanggan berhasil dibuat',
            'data' => $pelanggan
        ],  201);
    }

    //read
    public function index()
    {
        $pelanggan = Pelanggan::all();

        if ($pelanggan->isEmpty()) {
            return response()->json([
                'pesan' => 'Belum ada data pelanggan'
            ],  404);
        }

        return response()->json($pelanggan);
    }

    //update {id}
    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id);

        if (!$pelanggan) {
            return response()->json([
                'pesan' => 'Data pelanggan tidak ditemukan'
            ],  404);
        }

        $pelanggan->update($request->all());

        return response()->json([
            'pesan' => 'Data pelanggan berhasil diubah',
            'data' => $pelanggan
        ]);
    }

    //delete
    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);
        
        if (!$pelanggan) {
            return response()->json([
                'pesan' => 'Data pelanggan tidak ditemukan'
            ],  404);
        }

        $pelanggan->delete();

        return response()->json([
            'pesan' => 'Data pelanggan berhasil dihapus'
        ]);
    }
}
