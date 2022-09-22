<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\SegiEmpat;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class SegiEmpatController extends Controller
{
    /***********************************
    //method memanggil form input
     *************************************/
    public function inputSegiEmpat()
    {
        return View::make('segi-empat.inputSegiEmpat');
    }

    /**********************************
     * membaca hasil input
     * diteruskan menampilkan hasilnya
     *********************************/
    public function hasil(Request $request)
    {
        $segiEmpat = new SegiEmpat;
        //aturan validasi
        $rules = [
            'panjang' => 'required|numeric',
            'lebar' => 'required|numeric'
        ];

        $validator = Validator::make($request->all(), $rules);
        //cek validasi
        if ($validator->fails()) {
            //jika salah kembalikan ke form untuk diperbaiki
            return View::make(
                'segi-empat.inputSegiEmpat',
                compact('segiEmpat')
            )->withErrors($validator);
        } else {
            //lanjutkan ke menampilkan hasil/
            $segiEmpat->panjang = $request->panjang;
            $segiEmpat->lebar = $request->lebar;

            return View::make('segi-empat.hasil', compact('segiEmpat'));
        }
    }
}
