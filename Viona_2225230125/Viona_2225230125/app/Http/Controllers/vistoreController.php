<?php

namespace App\Http\Controllers;

use App\Models\vistore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class vistoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = vistore::where('id_produk', 'like', "%$katakunci%")
                ->orWhere('nama_produk', 'like', "%$katakunci%")
                ->orWhere('stok', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = vistore::orderBy('id_produk', 'desc')->paginate($jumlahbaris);
        }
        return view('vistore.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vistore.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_produk', $request->id_produk);
        Session::flash('nama_produk', $request->nama_produk);
        Session::flash('stok', $request->stok);

        $request->validate([
            'id_produk' => 'required|numeric|unique:vistore,id_produk',
            'nama_produk' => 'required',
            'stok' => 'required',
        ], [
            'id_produk.required' => 'ID Produk wajib di isi',
            'id_produk. numeric' => 'ID Produk wajib dalam angka',
            'id_produk.unique' => 'ID Produk yang di isikan sudah ada dalam database',
            'nama_produk.required' => 'Nama Produk wajib di isi',
            'stok.required' => 'Stok wajib di isi',
        ]);
        $data = [
            'id_produk' => $request->id_produk,
            'nama_produk' => $request->nama_produk,
            'stok' => $request->stok,
        ];
        vistore::create($data);
        return redirect()->to('vistore')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = vistore::where('id_produk', $id)->first();
        return view('vistore.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'stok' => 'required',
        ], [
            'nama_produk.required' => 'Nama Produk wajib diisi',
            'stok.required' => 'stok wajib diisi',
        ]);
        $data = [
            'nama_produk' => $request->nama_produk,
            'stok' => $request->stok,
        ];
        vistore::where('id_produk', $id)->update($data);
        return redirect()->to('vistore')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        vistore::where('id_produk', $id)->delete();
        return redirect()->to('vistore')->with('success', 'Berhasil melakukan delete data');
    }
}
