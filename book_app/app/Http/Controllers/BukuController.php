<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(){
        $client = new \GuzzleHttp\Client();
        $url= 'http://localhost:8000/api/buku';
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $buku = $contentArray['data'];

        return view('buku.index', ['buku' => $buku, 'title' => 'Daftar Buku']);

    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun' => 'required|date',
            'penerbit' => 'required',
            'sinopsis' => 'required',
            'jumlah_halaman' => 'required|numeric',
            'gambar' => 'required'
        ],[
            'judul.required' => 'Judul harus diisi',
            'penulis.required' => 'Penulis harus diisi',
            'tahun.required' => 'Tahun harus diisi',
            'penerbit.required' => 'Penerbit harus diisi',
            'sinopsis.required' => 'Sinopsis harus diisi',
            'jumlah_halaman.required' => 'Jumlah halaman harus diisi',
            'gambar.required' => 'Gambar harus diisi'
        ]);

        if($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'upload';
            $file->move($tujuan_upload,$nama_file);
        }

        $judul = $request->input('judul');
        $penulis = $request->input('penulis');
        $tahun = $request->input('tahun');
        $penerbit = $request->input('penerbit');
        $sinopsis = $request->input('sinopsis');
        $jumlah_halaman = $request->input('jumlah_halaman');
        $gambar = $nama_file;

        $param = [
            'judul' => $judul,
            'penulis' => $penulis,
            'tahun' => $tahun,
            'penerbit' => $penerbit,
            'sinopsis' => $sinopsis,
            'jumlah_halaman' => $jumlah_halaman,
            'gambar' => $gambar
        ];

        $client = new \GuzzleHttp\Client();
        $url= 'http://localhost:8000/api/buku';
        $response = $client->request('POST', $url, [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode($param)
        ]);

        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        if($contentArray['success']){
            return redirect()->route('buku.index')->with('success', $contentArray['message']);  
        }else{
            return redirect()->route('buku.index')->with('error', $contentArray['message']);  
        }

    }

    public function edit($id){
        $client = new \GuzzleHttp\Client();
        $url= 'http://localhost:8000/api/buku/'.$id;
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        if($contentArray['success'] = false) {
            return redirect()->route('buku.index')->with('error', $contentArray['message']);
        } else {
            $data = $contentArray['data'];
            return view('buku.index', ['data' => $data, 'title' => 'Edit Buku']);
        }
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun' => 'required|date',
            'penerbit' => 'required',
            'sinopsis' => 'required',
            'jumlah_halaman' => 'required|numeric',
        ],[
            'judul.required' => 'Judul harus diisi',
            'penulis.required' => 'Penulis harus diisi',
            'tahun.required' => 'Tahun harus diisi',
            'penerbit.required' => 'Penerbit harus diisi',
            'sinopsis.required' => 'Sinopsis harus diisi',
            'jumlah_halaman.required' => 'Jumlah halaman harus diisi',
        ]);

        // cek apakah ada file yang diupload
        if($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'upload';
            $file->move($tujuan_upload,$nama_file);

            // hapus file yang lama
            $client = new \GuzzleHttp\Client();
            $url= 'http://localhost:8000/api/buku/'.$id;
            $response = $client->request('GET', $url);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);
            $data = $contentArray['data'];
            $file_lama = $data['image'];
            unlink(public_path('upload/'.$file_lama));
        } else {
            $client = new \GuzzleHttp\Client();
            $url= 'http://localhost:8000/api/buku/'.$id;
            $response = $client->request('GET', $url);
            $content = $response->getBody()->getContents();
            $contentArray = json_decode($content, true);
            $data = $contentArray['data'];
            $nama_file = $data['image'];
        }


        $judul = $request->input('judul');
        $penulis = $request->input('penulis');
        $tahun = $request->input('tahun');
        $penerbit = $request->input('penerbit');
        $sinopsis = $request->input('sinopsis');
        $jumlah_halaman = $request->input('jumlah_halaman');
        $gambar = $nama_file;

        $param = [
            'judul' => $judul,
            'penulis' => $penulis,
            'tahun' => $tahun,
            'penerbit' => $penerbit,
            'sinopsis' => $sinopsis,
            'jumlah_halaman' => $jumlah_halaman,
            'gambar' => $gambar
        ];

        $client = new \GuzzleHttp\Client();
        $url= 'http://localhost:8000/api/buku/'.$id;
        $response = $client->request('PUT', $url, [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'body' => json_encode($param)
        ]);

        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        if($contentArray['success']){
            return redirect()->route('buku.index')->with('success', $contentArray['message']);
        }else{
            return redirect()->route('buku.index')->with('error', $contentArray['message']);
        }
    }

    public function show($id){
        $client = new \GuzzleHttp\Client();
        $url= 'http://localhost:8000/api/buku/'.$id;
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        if($contentArray['success'] = false) {
            return redirect()->route('buku.index')->with('error', $contentArray['message']);
        } else {
            $data = $contentArray['data'];
            return view('buku.detail', ['data' => $data, 'title' => 'Detail Buku']);
        }
    }

    public function destroy($id){
        $client = new \GuzzleHttp\Client();
        $url= 'http://localhost:8000/api/buku/'.$id;
        $response = $client->request('DELETE', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        if($contentArray['success']){
            return redirect()->route('buku.index')->with('success', $contentArray['message']);
        }else{
            return redirect()->route('buku.index')->with('error', $contentArray['message']);
        }
    }

    
}
