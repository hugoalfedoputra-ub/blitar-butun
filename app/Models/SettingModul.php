<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $modul modul
@property varchar $slug slug
@property varchar $url url
@property tinyint $aktif aktif
@property varchar $ikon ikon
@property int $urut urut
@property tinyint $level level
@property tinyint $hidden hidden
@property varchar $ikon_kecil ikon kecil
@property int $parent parent
@property \Illuminate\Database\Eloquent\Collection $grupAkse hasMany
   
 */
class SettingModul extends Model
{

    /**
     * Database table name
     */
    protected $table = 'setting_modul';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'parent',
        'modul',
        'slug',
        'url',
        'aktif',
        'ikon',
        'urut',
        'level',
        'hidden',
        'ikon_kecil',
        'parent'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * grupAkses
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grupAkses()
    {
        return $this->hasMany(GrupAkses::class, 'id_modul');
    }
}
