<?php

namespace App\Http\Controllers\Endpoints;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Aux\County as Cidade;

class PeopleEndpointsController extends Controller
{
    public function cidades( $estado ) {
        $html = '<option value=""></option>';
        $cidades = Cidade::where('Uf', $estado)->get();
        
        foreach ($cidades as $cidade) {
            $html .= '<option value="'.$cidade->Nome.'">'.$cidade->Nome.'</option>';
        }

        return $html;
    }
}
