<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_artikel id artikel
@property timestamp $tgl_agenda tgl agenda
@property varchar $koordinator_kegiatan koordinator kegiatan
@property varchar $lokasi_kegiatan lokasi kegiatan
@property IdArtikel $artikel belongsTo
   
 */
class AgendaModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'agenda';

    /**
    * Mass assignable columns
    */
    protected $fillable=['lokasi_kegiatan',
'id_artikel',
'tgl_agenda',
'koordinator_kegiatan',
'lokasi_kegiatan'];

    /**
    * Date time columns.
    */
    protected $dates=['tgl_agenda'];

    /**
    * idArtikel
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function idArtikel()
    {
        return $this->belongsTo(Artikel::class,'id_artikel');
    }




}