<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiwayatPangkat;
use App\Models\Pegawai;

class RiwayatPangkatController extends Controller
{
    public function index(Request $request)
    {
        //variabel pecarian
        $search = \Request::get('search');
        $p = Pegawai::paginate(); //mangatur tampil perhalaman
        //menjalankan query builder
        $pegawai = \DB::table('pegawai')
            ->join('mst_jabatan', 'pegawai.mst_jabatan_id', '=', 'mst_jabatan.id')
            ->select(
                'pegawai.id',
                'pegawai.nama',
                'pegawai.alamat',
                'mst_jabatan.nama_jabatan'
            )
            ->where('pegawai.id', 'LIKE', '%' . $search . '%')
            ->orwhere('pegawai.nama', 'LIKE', '%' . $search . '%')
            ->orWhere('pegawai.alamat', 'LIKE', '%' . $search . '%')
            ->paginate($p->perPage());

        //memanggil view dan menyertakan hasil quey
        return view('riwayat-pangkat.index', compact('pegawai'))
            ->with('i', (request()->input('page', 1) - 1) * $p->perPage());
    }

    public function proses($id)
    {
        //baca kepangkatan perpegawai
        $rw = RiwayatPangkat::where('pegawai_id', $id)->get();
        //baca identitas pegawai
        $peg = Pegawai::find($id);
        //tampilkan riwayat pangkat pegawai tertentu
        return view('riwayat-pangkat.index1', compact('rw', 'peg'));
    }

    
}
