<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    
    public function index(Request $request)
    {
        
        $q = $request->get('q');
        $data['result'] = Kategori::where(function($query) use ($q) {
            $query->where('nama_kategori', 'like', '%' . $q . '%');
        })->paginate();

        $data['q'] = $q;
        return view('kategori.list3', $data);
    }

    public function buat(){
        return view ('kategori.form3');
    }

    public function store(Request $request, Kategori $kategori = null){
        $rules = [
            'nama_kategori' => 'required'
        ];
        $this->validate($request, $rules);

        Kategori::updateOrCreate(['id' => @$kategori->id], $request->all());
        return redirect('/kategori')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit(kategori $kategori)
    {
        return view('kategori.form3', compact('kategori'));
    }

    public function destroy(kategori $kategori)
    {
        $kategori->delete();
        return redirect('/kategori')->with('success', 'Data berhasil dihapus');
    }

}