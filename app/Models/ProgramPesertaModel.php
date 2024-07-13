<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $peserta peserta
@property int $program_id program id
@property varchar $no_id_kartu no id kartu
@property varchar $kartu_nik kartu nik
@property varchar $kartu_nama kartu nama
@property varchar $kartu_tempat_lahir kartu tempat lahir
@property date $kartu_tanggal_lahir kartu tanggal lahir
@property varchar $kartu_alamat kartu alamat
@property varchar $kartu_peserta kartu peserta
@property int $kartu_id_pend kartu id pend
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
   
 */
class ProgramPesertaModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'program_peserta';

    /**
    * Mass assignable columns
    */
    protected $fillable=['updated_by',
'peserta',
'program_id',
'no_id_kartu',
'kartu_nik',
'kartu_nama',
'kartu_tempat_lahir',
'kartu_tanggal_lahir',
'kartu_alamat',
'kartu_peserta',
'kartu_id_pend',
'created_by',
'updated_by'];

    /**
    * Date time columns.
    */
    protected $dates=['kartu_tanggal_lahir'];




}