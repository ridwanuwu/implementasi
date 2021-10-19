<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  PDF; 
class ProdukController  extends  Controller 
{
public function makePDF(){ 
$produk =  Produk:  :  join  (  'kategori'  ,  'kategori.  id  kategon', 
'=',  'produk.id  kategori') 
->orderBy('produk.id produk',  'desc')->get(); 
 
$no=  O; 
$pdf =  PDF:: loadView  (  'produk.pdf  •,  compact  (  •produk','no'))]
 
return $pdf->stream();
]
}
