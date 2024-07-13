<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_grup id grup
@property int $id_modul id modul
@property tinyint $akses akses
@property IdModul $settingModul belongsTo
@property IdGrup $userGrup belongsTo
   
 */
class GrupAkses extends Model
{

    /**
     * Database table name
     */
    protected $table = 'grup_akses';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'akses',
        'id_grup',
        'id_modul',
        'akses'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * idModul
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idModul()
    {
        return $this->belongsTo(SettingModul::class, 'id_modul');
    }

    /**
     * idGrup
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idGrup()
    {
        return $this->belongsTo(UserGrup::class, 'id_grup');
    }
}
