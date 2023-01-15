<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SiswaModel;
use Illuminate\Contracts\Support\ValidatedData;

class SiswaController extends Controller
{

    public function siswa(){
        $data = SiswaModel::all();
        return view('siswa', compact('data'));
    }

    public function insertsiswa(Request $request){

        $ValidatedData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'gambar' => 'required',
        ]);

        $data = new SiswaModel();
        $data->nis = $request->input('nis');
        $data->nama = $request->input('nama');
        $data->kelas = $request->input('kelas');
        $data->jk = $request->input('jk');
        $data->alamat = $request->input('alamat');
        $data->gambar = $request->input('gambar');
        // dd($data);
        $data->save();

        if($request->hasFile('gambar')){
            $request->file('gambar')->move('foto/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('siswa')->with('success','Data Berhasil Di Simpan');
    }
    public function updatasiswa(Request $request, $id){
        $data = SiswaModel::findOrFail($id);
        $data->nis = $request->input('nis');
        $data->nama = $request->input('nama');
        $data->kelas = $request->input('kelas');
        $data->jk = $request->input('jk');
        $data->alamat = $request->input('alamat');
        $data->gambar = $request->input('gambar');
        $data->update();

        if($request->hasFile('gambar')){

            $destination ='foto/'.$data->fotosiswa;

            $request->file('gambar')->move('foto/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
            $data->save();

        }

        return redirect()->route('siswa')->with('success','Data Berhasil Di Ubah');
    }
    public function deletesiswa($id){
        $data = SiswaModel::findOrFail($id);
        $data->delete();

        return redirect()->route('siswa')->with('success','Data Berhasil Di Hapus');
    }
}
