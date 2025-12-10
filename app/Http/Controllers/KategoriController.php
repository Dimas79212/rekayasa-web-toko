<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    //create
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required'
        ]);

        $kategori = Kategori::create($request->all());

        return response()->json([
            'pesan' => 'Data kategori berhasil dibuat',
            'data' => $kategori
        ],  201);
    }

    //read
    public function index()
    {
        $kategori = Kategori::all();

        if ($kategori->isEmpty()) {
            return response->json([
                'pesan' => 'Belum ada data kategori'
            ],  404);
        }

        return response()->json($kategori);
    }

    //update {id}
    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return response()->json([
                'pesan' => 'Data kategori tidak ditemukan'
            ],  404);
        }

        $kategori->update($request->all());

        return response()->json([
            'pesan' => 'Data kategori berhasil diubah',
            'data' => $kategori
        ]);
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);

        if (!$kategori) {
            return response()->json([
                'pesan' => 'Data kategori tidak ditemukan'
            ],  404);
        }

        $kategori->delete();

        return response()->json([
            'pesan' => 'Data kategori berhasil dihapus'
        ]);
    }
}