<?php

namespace App\Http\Controllers;

use App\Models\Cpcode;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


class CpcodeController extends Controller
{
    //
    public function detalleAsenta(Request $request)
    { 
        $sel = Cpcode::where('d_codigo',$request->codigo)->get();
       
        if(!isset($sel[0])){
            return response()->json([
                'resp' => 'no hay nada'
            ]);
        }
        $federal = ['key' => $sel[0]->c_estado,'name'=>Str::upper($sel[0]->d_estado),'code'=>$sel[0]->c_CP];
        
        $asenta = ['zip_code'=>$sel[0]->d_codigo,'locality'=> Str::upper($sel[0]->d_ciudad),
      
                   'federal_entity'=>$federal,
                   'settlements' => array(['key'=>$sel[0]->id_asenta_cpcons,'name' => Str::upper($sel[0]->d_asenta),'zone_type'=>Str::upper($sel[0]->d_zona),
                                    'settlement_type' => ['name' => Str::upper($sel[0]->d_tipo_asenta)]]),
                   'municipality' => ['key' => $sel[0]->c_mnpio,'name'=>Str::upper($sel[0]->D_mnpio)]
                                
    ];
        
       
        return response()->json($asenta);
    }
}
