<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lokasi_toko extends Model
{
    protected $table = 'lokasi_toko';
    protected $primaryKey = 'barcode';
    public $incrementing = false;
    protected $fillable = ['barcode','nama_toko','latitude','longitude','accuracy'];
    public $timestamps = false;
}
