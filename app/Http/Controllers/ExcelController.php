<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Excel;
class ExcelController extends Controller
{
    public function getexport()
    {
        $export = User::select('id', 'username', 'email', 'level')->get();
            Excel::create('export data', function($excel) use($export){
            $excel->sheet('Excel sheet', function($sheet) use($export){
                $sheet->fromArray($export);
            });
        })->export('xlsx');
    }
}
