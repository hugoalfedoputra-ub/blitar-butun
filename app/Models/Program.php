<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $nama nama
@property tinyint $sasaran sasaran
@property varchar $ndesc ndesc
@property date $sdate sdate
@property date $edate edate
@property mediumint $userid userid
@property tinyint $status status
@property char $asaldana asaldana
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property \Illuminate\Database\Eloquent\Collection $dtksPengaturanProgram hasMany
   
 */
class Program extends Model
{

    /**
     * Database table name
     */
    protected $table = 'program';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'updated_by',
        'nama',
        'sasaran',
        'ndesc',
        'sdate',
        'edate',
        'userid',
        'status',
        'asaldana',
        'created_by',
        'updated_by'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [
        'sdate',
        'edate'
    ];

    /**
     * dtksPengaturanPrograms
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dtksPengaturanPrograms()
    {
        return $this->hasMany(DtksPengaturanProgram::class, 'id_bantuan');
    }
}
