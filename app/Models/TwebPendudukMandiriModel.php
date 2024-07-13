<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property datetime $last_login last login
@property datetime $tanggal_buat tanggal buat
@property int $id_pend id pend
@property int $aktif aktif
@property varchar $scan_ktp scan ktp
@property varchar $scan_kk scan kk
@property varchar $foto_selfie foto selfie
@property tinyint $ganti_pin ganti pin
@property timestamp $email_verified_at email verified at
@property varchar $remember_token remember token
@property timestamp $updated_at updated at
@property IdPend $twebPenduduk belongsTo
   
 */
class TwebPendudukMandiriModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_penduduk_mandiri';

    /**
    * Mass assignable columns
    */
    protected $fillable=['last_login',
'tanggal_buat',
'id_pend',
'aktif',
'scan_ktp',
'scan_kk',
'foto_selfie',
'ganti_pin',
'email_verified_at'];

    /**
    * Date time columns.
    */
    protected $dates=['last_login',
'tanggal_buat',
'email_verified_at'];

    /**
    * idPend
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function idPend()
    {
        return $this->belongsTo(TwebPenduduk::class,'id_pend');
    }




}