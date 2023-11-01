<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use Illuminate\Http\Request;

class BukuAPIController extends Controller
{
    // Controller ini digunakan untuk menangani request API

    public function index()
    {
        // Mengambil semua data buku
        $buku = BukuModel::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar data buku',
            'data' => $buku
        ], 200);
    }

    public function show($id)
    {
        // Mengambil data buku berdasarkan id
        $buku = BukuModel::find($id);

        if ($buku) {
            return response()->json([
                'success' => true,
                'message' => 'Detail data buku',
                'data' => $buku
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Buku tidak ditemukan',
                'data' => ''
            ], 404);
        }
    }

    public function store(Request $request) {
      $dataBuku = new BukuModel();

      // validasi
      $rules = [
        'judul' => 'required',
        'penulis' => 'required',
        'tahun' => 'required|date',
        'penerbit' => 'required',
        'sinopsis' => 'required',
        'jumlah_halaman' => 'required|numeric',
        'gambar' => 'required'
      ];

      $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules);
      if ($validator->fails()) {
        return response()->json([
          'success' => false,
          'message' => 'Gagal memasukkan data',
          'data' => $validator->errors()
        ], 400);
      }

      $dataBuku->title = $request->judul;
      $dataBuku->author = $request->penulis;
      $dataBuku->year = $request->tahun;
      $dataBuku->publisher = $request->penerbit;
      $dataBuku->summary = $request->sinopsis;
      $dataBuku->page_count = $request->jumlah_halaman;
      $dataBuku->image = $request->gambar;

      $dataBuku->save();

      return response()->json([
        'success' => true,
        'message' => 'Buku berhasil ditambahkan',
        'data' => $dataBuku
      ], 200);
    }

    public function update(Request $request, $id) {
      $dataBuku = BukuModel::find($id);

      if(empty($dataBuku)) {
        return response()->json([
          'success' => false,
          'message' => 'Buku tidak ditemukan',
          'data' => ''
        ], 404);
      }

      // validasi
      $rules = [
        'judul' => 'required',
        'penulis' => 'required',
        'tahun' => 'required|date',
        'penerbit' => 'required',
        'sinopsis' => 'required',
        'jumlah_halaman' => 'required|numeric',
        'gambar' => 'required'
      ];

      $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules);
      if ($validator->fails()) {
        return response()->json([
          'success' => false,
          'message' => 'Gagal memperbarui data',
          'data' => $validator->errors()
        ], 400);
      }

      $dataBuku->title = $request->judul;
      $dataBuku->author = $request->penulis;
      $dataBuku->year = $request->tahun;
      $dataBuku->publisher = $request->penerbit;
      $dataBuku->summary = $request->sinopsis;
      $dataBuku->page_count = $request->jumlah_halaman;
      $dataBuku->image = $request->gambar;

      $dataBuku->save();

      return response()->json([
        'success' => true,
        'message' => 'Buku berhasil diperbarui',
      ], 200);

    }

    public function destroy($id) {
      $dataBuku = BukuModel::find($id);

      if(empty($dataBuku)) {
        return response()->json([
          'success' => false,
          'message' => 'Buku tidak ditemukan',
          'data' => ''
        ], 404);
      }

      // hapus gambar
      if(!empty($dataBuku->image)) {
          $gambarPath = storage_path('/public/upload/' . $dataBuku->image);

          if (file_exists($gambarPath)) {
              unlink($gambarPath); // Hapus gambar dari penyimpanan
          }
      }

      $dataBuku->delete();

      return response()->json([
        'success' => true,
        'message' => 'Buku berhasil dihapus',
      ], 200);
    }

    
}
