<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\ContasPagar;

class ContasPagarController extends BaseController
{
    public function salvar(Request $request){
        // dd($request);
        try {
            $source = array('.', ',');
            $replace = array('', '.');
// $valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
            $novaContaPagar = new ContasPagar();
            $novaContaPagar['descricao']                 = $request['descricao'];
            $novaContaPagar['fornecedor']                 = $request['fornecedor'];
            $novaContaPagar['valor_contas_pagar']     = str_replace($source, $replace, $request['valor']);
            $novaContaPagar['vencimento']                     = $request['vencimento'];
            $novaContaPagar->save();
            return redirect("/cadContasPagar")->with('sucessocontaspagar', "Sucesso !!");

        } catch (\Exception $e) {
            // dd($e);
            return redirect("/cadContasPagar")->with('errorcontaspagar', "ERRO !!");
        }


    }

    public function listar($id=""){
        if($id){
            $contaPagar = ContasPagar::find($id);
            return $contaPagar;
        }
        $contaPagar = ContasPagar::get();
        return $contaPagar;
    }
    public function baixaContaPagar(Request $request){

        $contaPagar = ContasPagar::find($request['id']);
        $contaPagar['data_pagamento'] = $request['data_pagamento'];
        $contaPagar['situacao'] = 1;
        $contaPagar->save();

        $contaPagar = ContasPagar::get();
        return $contaPagar;

    }

}
