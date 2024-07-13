<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property tinyint $id_master id master
@property varchar $kategori kategori
@property varchar $kategori_kode kategori kode
   
 */
class AnalisisKategoriIndikator extends Model
{

    /**
     * Database table name
     */
    protected $table = 'analisis_kategori_indikator';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'kategori_kode',
        'id_master',
        'kategori',
        'kategori_kode'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}
