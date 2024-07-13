<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_pemohon id pemohon
@property int $id_surat id surat
@property text $isian_form isian form
@property tinyint $status status
@property varchar $alasan alasan
@property text $keterangan keterangan
@property varchar $no_hp_aktif no hp aktif
@property text $syarat syarat
@property timestamp $created_at created at
@property timestamp $updated_at updated at
@property varchar $no_antrian no antrian
   
 */
class PermohonanSurat extends Model
{

    /**
     * Database table name
     */
    protected $table = 'permohonan_surat';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'no_antrian',
        'id_pemohon',
        'id_surat',
        'isian_form',
        'status',
        'alasan',
        'keterangan',
        'no_hp_aktif',
        'syarat',
        'no_antrian'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}
