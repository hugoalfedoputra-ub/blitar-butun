<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $versi_kuisioner versi kuisioner
@property varchar $kode kode
@property int $id_bantuan id bantuan
@property varchar $nilai_default nilai default
@property varchar $target_table target table
@property mediumtext $target_field target field
@property timestamp $created_at created at
@property timestamp $updated_at updated at
@property IdBantuan $program belongsTo
   
 */
class DtksPengaturanProgramModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'dtks_pengaturan_program';

    /**
    * Mass assignable columns
    */
    protected $fillable=['versi_kuisioner',
'kode',
'id_bantuan',
'nilai_default',
'target_table',
'target_field'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * idBantuan
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function idBantuan()
    {
        return $this->belongsTo(Program::class,'id_bantuan');
    }




}