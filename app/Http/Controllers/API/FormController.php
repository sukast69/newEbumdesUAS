<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function create(Request $request)
    {

        $request->validate([
            'nik' => 'required|unique:tb_pengguna_air,nik|min:16|max:16',
            'nama_lengkap' => 'required',
            'nomer_hp' => 'required|min:12|max:13|unique:tb_pengguna_air,nomer_hp',
            'jenis_kelamin' => 'required',
            'alamat_pengguna' => 'required',
            'status_pengguna' => 'required',
        ], [
            'nik.required' => 'NIK wajib diisi !!',
            'nik.unique' => 'NIK sudah terdaftar !!',
            'nik.min' => 'Masukan NIK 16 Karakter !!',
            'nik.max' => 'Masukan NIK max 16 Karakter !!',
            'nama_lengkap.required' => 'Nama wajib diisi !!',
            'nomer_hp.required' => 'Nomer HP wajib diisi !!',
            'nomer_hp.min' => 'nomer hp minimal 12 karakter',
            'nomer_hp.max' => 'nomer hp minimal 13 karakter',
            'nomer_hp.unique' => 'Nomer HP sudah digunakan !!',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi !!',
            'alamat_pengguna.required' => 'Alamat Pengguna wajib diisi !!',
            'status_penggguna.required' => 'Status Penggun awajib diisi !!',

        ]);

        // \dd($request)->all();

        $pengguna = new Pengguna;
        $pengguna->nik = $request->nik;
        $pengguna->nama_lengkap = $request->nama_lengkap;
        $pengguna->nomer_hp = $request->nomer_hp;
        $pengguna->jenis_kelamin = $request->jenis_kelamin;
        $pengguna->alamat_pengguna = $request->alamat_pengguna;
        $pengguna->status_pengguna = $request->status_pengguna;

        $pengguna->save();

        return response()->json([
            'message' => 'Pengguna air berhasil ditambahkan',
            'data_pengguna' => $pengguna,
        ], 200);
    }
}