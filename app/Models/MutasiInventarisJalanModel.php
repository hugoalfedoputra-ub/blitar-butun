<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_inventaris_jalan id inventaris jalan
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
@property IdInventarisJalan $inventarisJalan belongsTo
   
 */
class MutasiInventarisJalan extends Model
{

    /**
     * Database table name
     */
    protected $table = 'mutasi_inventaris_jalan';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'status_mutasi',
        'id_inventaris_jalan',
        'jenis_mutasi',
        'tahun_mutasi',
        'harga_jual',
        'sumbangkan',
        'keterangan',
        'created_by',
        'updated_by',
        'visible',
        'status_mutasi'
    ];

    /**
     * Date time columns.
     */
    protected $dates = ['tahun_mutasi'];

    /**
     * idInventarisJalan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idInventarisJalan()
    {
        return $this->belongsTo(InventarisJalan::class, 'id_inventaris_jalan');
    }
}
