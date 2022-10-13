<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*************************************************
 * Nama kelas reprentasi tabel
 * tabel pegawai nama Class nya Pegawai
 *
 * @property $id
 * @property $nama
 * @property $alamat
 * @property $tanggal_lahir
 * @property $jenis_kel
 * @property $agama
 * @property $telepon
 * @property $email
 * @property $file_foto
 * @property $mst_jabatan_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Gaji[] $gajis
 * @property MstJabatan $mstJabatan
 * @property RiwayatPangkat[] $riwayatPangkats
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 *************************************************/
class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $primaryKey = 'id';

    static $rules = [
        'nama' => 'required',
        'alamat' => 'required',
        'jenis_kel' => 'required',
        'tanggal_lahir' => 'required',
        'agama' => 'required',
        'mst_jabatan_id' => 'required',
    ];

    protected $perPage = 20;

    /*************************************************
     * menetapkan nilai atribut/kolom/field.
     * dari tabel pegawai
     * ke @varibel array
     ************************************************/
    protected $fillable = ['nama', 'alamat', 'jenis_kel', 'tanggal_lahir', 'agama', 'telepon', 'email', 'file_foto', 'mst_jabatan_id'];

    /**************************************************************
     * Relasi antar object/model
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **************************************************************/
    public function mstJabatan()
    {
        return $this->hasOne('App\Models\MstJabatan', 'id', 'mst_jabatan_id');
    }

    static function listAgama()
    {
        return array(
            1 => 'Islam', 2 => 'Katholik',
            3 => 'Protestan', 4 => 'Hindu',
            5 => 'Budha', 6 => 'Konghucu'
        );
    }

    public function getAgama()
    {
        if ($this->agama == "1")
            return "Islam";
        elseif ($this->agama == "2")
            return "Katholik";
        elseif ($this->agama == "3")
            return "Protistan";
        elseif ($this->agama == "4")
            return "Hindu";
        elseif ($this->agama == "5")
            return "Budha";
        elseif ($this->agama == "6")
            return "Konghucu";
        else
            return "Tidak diketahui";
    }

    public function getGapok($id)
    {
        $g = \DB::table('riwayat_pangkat')
            ->where('pegawai_id', $id)
            ->where('status', 1)->first();
        if ($g == null) //jika tidak ada
            return 0;
        else
            return $g->gaji_pokok;
    }

    public function getTunjangan($id)
    {
        $g = \DB::table('mst_jabatan')->where('id', $id)->first();
        if ($g == null) //jika tidak ada
            return 0;
        else
            return $g->tunjangan;
    }
}
