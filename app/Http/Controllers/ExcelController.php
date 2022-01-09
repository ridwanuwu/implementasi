<?php

namespace App\Http\Controllers;


use App\Imports\CustomerImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{

    public function show()
    {
        return view('excel.body');
    }

  public function store(Request $request)
    {
          // validasi
        //   $validatedData = $request->validate([
        //   'excel' => 'file'
        //   ]);
          $file = $request->file('file');

        //   Excel::import(new CustomerImport, $file);

          $import = new CustomerImport;
          $import->import($file);

        //   if($import->failures()->isNotEmpty()){
        //     return back()->withFailures($import->failures());
        //   }

          return back()->withStatus('File excel berhasil diimpor');
    }
}
