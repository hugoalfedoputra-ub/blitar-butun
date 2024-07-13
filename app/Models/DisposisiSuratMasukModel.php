<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_surat_masuk id surat masuk
@property int $id_desa_pamong id desa pamong
@property varchar $disposisi_ke disposisi ke
@property IdDesaPamong $twebDesaPamong belongsTo
@property IdSuratMasuk $suratMasuk belongsTo
   
 */
class DisposisiSuratMasukModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'disposisi_surat_masuk';

    /**
    * Mass assignable columns
    */
    protected $fillable=['disposisi_ke',
'id_surat_masuk',
'id_desa_pamong',
'disposisi_ke'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * idDesaPamong
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function idDesaPamong()
    {
        return $this->belongsTo(TwebDesaPamong::class,'id_desa_pamong');
    }

    /**
    * idSuratMasuk
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function idSuratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class,'id_surat_masuk');
    }




}