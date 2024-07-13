<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_pend id pend
@property varchar $telepon telepon
@property varchar $lat lat
@property varchar $lng lng
@property tinyint $zoom zoom
@property tinyint $status status
@property \Illuminate\Database\Eloquent\Collection $produk hasMany
   
 */
class Pelapak extends Model
{

    /**
     * Database table name
     */
    protected $table = 'pelapak';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'status',
        'id_pend',
        'telepon',
        'lat',
        'lng',
        'zoom',
        'status'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * produks
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produks()
    {
        return $this->hasMany(Produk::class, 'id_pelapak');
    }
}
