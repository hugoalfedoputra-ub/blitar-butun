<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $ip_address ip address
@property varchar $keterangan keterangan
@property tinyint $keyboard keyboard
@property tinyint $status status
@property varchar $status_alasan status alasan
@property int $created_by created by
@property int $updated_by updated by
@property timestamp $created_at created at
@property timestamp $updated_at updated at
@property varchar $mac_address mac address
@property varchar $printer_ip printer ip
@property varchar $printer_port printer port
@property varchar $id_pengunjung id pengunjung
@property tinyint $tipe tipe
   
 */
class Anjungan extends Model
{

    /**
     * Database table name
     */
    protected $table = 'anjungan';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'tipe',
        'ip_address',
        'keterangan',
        'keyboard',
        'status',
        'status_alasan',
        'created_by',
        'updated_by',
        'mac_address',
        'printer_ip',
        'printer_port',
        'id_pengunjung',
        'tipe'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}
