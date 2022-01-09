<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public $table = "barang";
    protected $primaryKey = 'idbarang';
    protected $fillable = [
        'nama_barang',
        'barcode_kode'
    ];
}
