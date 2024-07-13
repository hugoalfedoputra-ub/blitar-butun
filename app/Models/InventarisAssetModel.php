<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama_barang nama barang
@property varchar $kode_barang kode barang
@property varchar $register register
@property varchar $jenis jenis
@property varchar $judul_buku judul buku
@property varchar $spesifikasi_buku spesifikasi buku
@property varchar $asal_daerah asal daerah
@property varchar $pencipta pencipta
@property varchar $bahan bahan
@property varchar $jenis_hewan jenis hewan
@property varchar $ukuran_hewan ukuran hewan
@property varchar $jenis_tumbuhan jenis tumbuhan
@property varchar $ukuran_tumbuhan ukuran tumbuhan
@property int $jumlah jumlah
@property year $tahun_pengadaan tahun pengadaan
@property varchar $asal asal
@property double $harga harga
@property mediumtext $keterangan keterangan
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property int $status status
@property int $visible visible
@property \Illuminate\Database\Eloquent\Collection $mutasiInventarisAsset hasMany
   
 */
class InventarisAssetModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'inventaris_asset';

    /**
    * Mass assignable columns
    */
    protected $fillable=['visible',
'nama_barang',
'kode_barang',
'register',
'jenis',
'judul_buku',
'spesifikasi_buku',
'asal_daerah',
'pencipta',
'bahan',
'jenis_hewan',
'ukuran_hewan',
'jenis_tumbuhan',
'ukuran_tumbuhan',
'jumlah',
'tahun_pengadaan',
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
    * mutasiInventarisAssets
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function mutasiInventarisAssets()
    {
        return $this->hasMany(MutasiInventarisAsset::class,'id_inventaris_asset');
    }



}