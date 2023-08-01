<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
public function create()
{
    return view('pelanggan.form1');
}

public function store(Request $request, Pelanggan $pelanggan = null){
    

    $rules = [
        'nama_lengkap' => 'required',
        'jenis_kelamin' => 'required',
        'nomor_hp' => 'required',
        'alamat' => 'required',
        'email' => 'required'
    ];
    $this->validate($request, $rules);
    
    Pelanggan::updateOrcreate(['id'=> @$pelanggan->id],$request->all());
    return redirect('/pelanggan')->with('success', 'Data Berhasil Disimpan');
}
    
public function index(Request $request){
    $q = $request->get('q');

    $data['result'] = Pelanggan::where(function($query) use ($q){
        $query->where('nama_lengkap', 'like', '%' . $q . '%');
        $query->orwhere('jenis_kelamin', 'like', '%' . $q . '%');
        $query->where('nomor_hp', 'like', '%' . $q . '%');
        $query->where('alamat', 'like', '%' . $q . '%');
        $query->where('email', 'like', '%' . $q . '%');
    })->paginate();

    $data['q'] = $q;
    return view('pelanggan.list1',$data);
    }

public function edit(Pelanggan $pelanggan){
return view('pelanggan.form1', compact('pelanggan'));
}

public function destroy(Pelanggan $pelanggan){
$pelanggan->delete();
return redirect('/pelanggan')->with('success', 'Data Berhasil Dihapus');
}
}