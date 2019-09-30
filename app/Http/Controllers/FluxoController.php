<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\FluxoCaixa;

class FluxoController extends BaseController
{
    public function salvar(Request $request){
        try {
            $source = array('.', ',');
            $replace = array('', '.');
            $novoFluxo = new FluxoCaixa();
            $novoFluxo['descricao'] = $request['descricao'];
            $novoFluxo['valor']     = str_replace($source, $replace, $request['valor']);
            $novoFluxo['tipo']      = $request['tipo_fluxo'];
            $novoFluxo['registro']  = date('Y-m-d H:i:s');
            $novoFluxo->save();
            // dd("ok");
            return redirect("/cadFluxo")->with('sucessocadFluxo', "Sucesso !!");

        } catch (\Exception $e) {
            // dd("erro");
            return redirect("/cadFluxo")->with('errorcadFluxo', "ERRO !!");
        }


    }

    public function listar($id=""){
        // dd("ok");
        if($id){
            $fluxos =   FluxoCaixa::find($id);
            return $fluxos;
        }
        $fluxos =   FluxoCaixa::get();
        return $fluxos;
    }
}
