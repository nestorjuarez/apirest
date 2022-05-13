<?php

namespace App\Http\Controllers;

use App\Models\Cpcode;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


class CpcodeController extends Controller
{
    //
    public function detalleAsenta(Request $request)
    { 
        $sel = Cpcode::where('d_codigo',$request->codigo)->get();
        $federal = ['key' => $sel[0]->c_estado,'name'=>$sel[0]->d_estado,'code'=>$sel[0]->c_CP];
        
        $asenta = ['zip_code'=>$sel[0]->d_codigo,'locality'=> $sel[0]->d_ciudad,
      
                   'federal_entity'=>$federal,
                   'settlements' => ['key'=>$sel[0]->id_asenta_cpcons,'name' => $sel[0]->d_asenta,'zone_type'=>$sel[0]->d_zona,
                                    'settlement_type' => ['name' => $sel[0]->d_tipo_asenta]],
                   'municipality' => ['key' => $sel[0]->c_mnpio,'name'=>$sel[0]->D_mnpio]
                                
    ];
        // dd($asenta);
       
        return $asenta;
    }
}
