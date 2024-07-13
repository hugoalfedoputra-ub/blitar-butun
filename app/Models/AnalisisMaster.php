<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $nama nama
@property tinyint $subjek_tipe subjek tipe
@property tinyint $lock lock
@property mediumtext $deskripsi deskripsi
@property varchar $kode_analisis kode analisis
@property int $id_kelompok id kelompok
@property varchar $pembagi pembagi
@property smallint $id_child id child
@property tinyint $format_impor format impor
@property tinyint $jenis jenis
@property mediumtext $gform_id gform id
@property mediumtext $gform_nik_item_id gform nik item id
@property datetime $gform_last_sync gform last sync
   
 */
class AnalisisMaster extends Model
{

    /**
     * Database table name
     */
    protected $table = 'analisis_master';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'gform_last_sync',
        'nama',
        'subjek_tipe',
        'lock',
        'deskripsi',
        'kode_analisis',
        'id_kelompok',
        'pembagi',
        'id_child',
        'format_impor',
        'jenis',
        'gform_id',
        'gform_nik_item_id',
        'gform_last_sync'
    ];

    /**
     * Date time columns.
     */
    protected $dates = ['gform_last_sync'];
}
