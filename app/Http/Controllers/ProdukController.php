<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;


class ProdukController extends Controller
{
public function create()
{
    return view('produk.form');
}

public function show(){
    return view('produk.show');
}

public function store(Request $request, Produk $produk = null){
    

    $rules = [
        'kategori_produk' => 'required',
        'harga_produk' => 'required|numeric|min:1000',
        'nama_produk' => 'required',
        'stok' => 'required',
    ];

    if ($request->hasFile('foto_produk')){
        $rules['foto_produk'] = 'required|mimes:jpg|max:1024';
    }

    $this->validate($request, $rules);

    $input = $request->all();
    
    if($request->hasFile('foto_produk')){
        $fileName = $request->foto_produk->getCLientOriginalName();
        $request->foto_produk->storeAs('produk', $fileName);
        $input['foto_produk'] = $fileName;
    }

    Produk::updateOrcreate(['id'=> @$produk->id],$input);
    return redirect('/produk')->with('success', 'Data Berhasil Disimpan');

}
    public function index(Request $request){
        $q = $request->get('q');

        $data['result'] = Produk::where(function($query) use ($q){
            $query->orwhere('kategori_produk', 'like', '%' . $q . '%');
            $query->orwhere('nama_produk', 'like', '%' . $q . '%');
            $query->orwhere('stok', 'like', '%' . $q . '%');
            $query->orwhere('harga_produk', 'like', '%' . $q . '%');
        })->paginate();

        $data['q'] = $q;
        return view('produk.list',$data);
    }
    public function edit(Produk $produk){
        return view('produk.form', compact('produk'));
    }

    public function destroy(Produk $produk){
        $produk->delete();
        return redirect('/produk')->with('success', 'Data Berhasil Dihapus');
    }
}