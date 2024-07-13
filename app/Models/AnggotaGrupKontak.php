<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_grup id grup
@property int $id_kontak id kontak
@property int $id_penduduk id penduduk
@property timestamp $created_at created at
@property timestamp $updated_at updated at
@property IdPenduduk $twebPenduduk belongsTo
@property IdKontak $kontak belongsTo
@property IdGrup $kontakGrup belongsTo
   
 */
class AnggotaGrupKontak extends Model
{

    /**
     * Database table name
     */
    protected $table = 'anggota_grup_kontak';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'id_grup',
        'id_kontak',
        'id_penduduk'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * idPenduduk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idPenduduk()
    {
        return $this->belongsTo(TwebPenduduk::class, 'id_penduduk');
    }

    /**
     * idKontak
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idKontak()
    {
        return $this->belongsTo(Kontak::class, 'id_kontak');
    }

    /**
     * idGrup
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idGrup()
    {
        return $this->belongsTo(KontakGrup::class, 'id_grup');
    }
}
