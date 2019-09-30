<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\ContasReceber;

class ContasReceberController extends BaseController
{
    public function salvar(Request $request){
        // dd($request);
        try {
            $source = array('.', ',');
            $replace = array('', '.');
            $novaContasReceber = new ContasReceber();
            $novaContasReceber['descricao']             = $request['descricao'];
            $novaContasReceber['cliente']               = $request['cliente'];
            $novaContasReceber['valor_contas_receber']  = str_replace($source, $replace, $request['valor']);
            $novaContasReceber['prazo']                 = $request['prazo'];
            $novaContasReceber->save();
            return redirect("/cadContasReceber")->with('sucessocadReceber', "Sucesso !!");

        } catch (\Exception $e) {
            // dd($e);
            return redirect("/cadContasReceber")->with('errorcadReceber', "ERRO !!");
        }


    }

    public function listar($id=""){
        if($id){
            $contasReceber = ContasReceber::find($id);
            return $contasReceber;
        }
        $contasReceber = ContasReceber::get();
        return $contasReceber;
    }

    public function baixaContaReceber(Request $request){

        // dd($request);
        $contaReceber = ContasReceber::find($request['id']);
        $contaReceber['data_pagamento'] = $request['data_pagamento'];
        $contaReceber['situacao'] = 1;
        $contaReceber->save();

        $contaReceber = ContasReceber::get();
        return $contaReceber;

    }


}
