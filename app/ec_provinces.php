<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ec_provinces extends Model
{
    protected $table = "ec_provinces";
    protected $primaryKey =  "prov_id";
    protected $fillable = ['prov_name','status'];

    public function ec_cities(){
        return $this->hasMany(ec_cities::class,'prov_id');
    }
}
