<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_pengaduan id pengaduan
@property varchar $nik nik
@property varchar $nama nama
@property varchar $email email
@property varchar $telepon telepon
@property varchar $judul judul
@property text $isi isi
@property int $status status
@property varchar $foto foto
@property varchar $ip_address ip address
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class Pengaduan extends Model
{

    /**
     * Database table name
     */
    protected $table = 'pengaduan';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'id_pengaduan',
        'nik',
        'nama',
        'email',
        'telepon',
        'judul',
        'isi',
        'status',
        'foto',
        'ip_address'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}
