<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama_barang nama barang
@property varchar $kode_barang kode barang
@property varchar $register register
@property varchar $merk merk
@property text $ukuran ukuran
@property text $bahan bahan
@property year $tahun_pengadaan tahun pengadaan
@property varchar $no_pabrik no pabrik
@property varchar $no_rangka no rangka
@property varchar $no_mesin no mesin
@property varchar $no_polisi no polisi
@property varchar $no_bpkb no bpkb
@property varchar $asal asal
@property double $harga harga
@property mediumtext $keterangan keterangan
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property int $status status
@property int $visible visible
@property \Illuminate\Database\Eloquent\Collection $mutasiInventarisPeralatan hasMany
   
 */
class InventarisPeralatanModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'inventaris_peralatan';

    /**
    * Mass assignable columns
    */
    protected $fillable=['visible',
'nama_barang',
'kode_barang',
'register',
'merk',
'ukuran',
'bahan',
'tahun_pengadaan',
'no_pabrik',
'no_rangka',
'no_mesin',
'no_polisi',
'no_bpkb',
'asal',
'harga',
'keterangan',
'created_by',
'updated_by',
'status',
'visible'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * mutasiInventarisPeralatans
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function mutasiInventarisPeralatans()
    {
        return $this->hasMany(MutasiInventarisPeralatan::class,'id_inventaris_peralatan');
    }



}