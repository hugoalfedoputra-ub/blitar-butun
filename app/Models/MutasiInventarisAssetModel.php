<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_inventaris_asset id inventaris asset
@property varchar $jenis_mutasi jenis mutasi
@property date $tahun_mutasi tahun mutasi
@property double $harga_jual harga jual
@property varchar $sumbangkan sumbangkan
@property mediumtext $keterangan keterangan
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property int $visible visible
@property varchar $status_mutasi status mutasi
@property IdInventarisAsset $inventarisAsset belongsTo
   
 */
class MutasiInventarisAssetModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'mutasi_inventaris_asset';

    /**
    * Mass assignable columns
    */
    protected $fillable=['status_mutasi',
'id_inventaris_asset',
'jenis_mutasi',
'tahun_mutasi',
'harga_jual',
'sumbangkan',
'keterangan',
'created_by',
'updated_by',
'visible',
'status_mutasi'];

    /**
    * Date time columns.
    */
    protected $dates=['tahun_mutasi'];

    /**
    * idInventarisAsset
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function idInventarisAsset()
    {
        return $this->belongsTo(InventarisAsset::class,'id_inventaris_asset');
    }




}