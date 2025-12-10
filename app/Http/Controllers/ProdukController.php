<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    //create
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'nama_kategori' => 'required|exists:kategori,nama_kategori'
        ]);

        $produk = Produk::create($request->all());

        return response()->json([
            'pesan' => 'Data produk berhasil dibuat',
            'data' => $produk
        ],  201);
    }

    //read
    public function index()
    {
        $produk = Produk::all();

        if ($produk->isEmpty()) {
            return response()->json([
                'pesan' => 'Belum ada data produk'
            ],  404);
        }
        return response()->json($produk);
    }

    //update {id}
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['pesan' => 'Data produk tidak ditemukan'], 404);
        }

        $produk->update($request->all());

        return response()->json([
            'pesan' => 'Data produk berhasil diubah',
            'data' => $produk
        ]);
    }

    //delete {id}
    public function destroy($id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json([
                'pesan' => 'Data produk tidak ditemukan'
        ], 404);
        }

        $produk->delete();

        return response()->json([
            'pesan' => 'Data produk berhasil dihapus'
        ]);
    }
}