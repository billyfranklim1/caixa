<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\ContasPagar;
use App\ContasReceber;
use Money\Currency;
use Money\Money;

use Illuminate\Http\Request;


Route::get('/', function () {

/////////////////////////////////////
    $total = [];
    $pagar = ContasPagar::where('situacao',0)->get();
    foreach ($pagar as $pag) {array_push($total,$pag['valor_contas_pagar']); }
    $soma = 0;
    foreach ($total as $i) { $soma = $soma +(float) $i; }
    $total = number_format($soma, 2, ',', '.');
    // dd($total);
///////////////////////////
    $total2 = [];
    $receber = ContasReceber::where('situacao',0)->get();
    foreach ($receber as $pag) {array_push($total2,$pag['valor_contas_receber']); }
    $soma2 = 0;
    foreach ($total2 as $i) { $soma2 = $soma2 +(float) $i; }
    $total2 = number_format($soma2, 2, ',', '.');


///////////////////saldo///////////////////////////////
    $total_entrada = [] ;
    $entrada = ContasReceber::where('situacao',1)->get();
    foreach ($entrada as $pag) {array_push($total_entrada,$pag['valor_contas_receber']); }
    $soma_entrada = 0;
    foreach ($total_entrada as $i) { $soma_entrada = $soma_entrada +(float) $i; }

    $total_saida = [] ;
    $saida = ContasPagar::where('situacao',1)->get();
    foreach ($saida as $pago) {array_push($total_saida,$pago['valor_contas_pagar']); }
    $soma_saida = 0;
    foreach ($total_saida as $i) { $soma_saida = $soma_saida +(float) $i; }

    $saldo = $soma_entrada - $soma_saida;
    $saldo = number_format($saldo, 2, ',', '.');
    // dd($saldo);
    return view('welcome',compact('total','total2','saldo'));
});

Route::get('/cadContasReceber', function () {return view('cadContasReceber');});
Route::get('/cadContasPagar', function () {return view('cadContasPagar');});


Route::get('/listContasReceber', function () {
    $lista = ContasReceber::orderBy('id_contas_receber', 'desc')->get();
    return view('listContasReceber',compact('lista'));
});
Route::get('/listContasPagar', function () {
    $lista = ContasPagar::orderBy('id_contas_pagar', 'desc')->get();
    return view('listContasPagar',compact('lista'));
});


Route::post('/baixaContaPagar','ContasPagarController@baixaContaPagar');
Route::post('/baixaContaReceber','ContasReceberController@baixaContaReceber');
// baixaContaReceber



Route::post('/receber','ContasReceberController@salvar');
Route::post('/pagar','ContasPagarController@salvar');

Route::get('/receber/{id?}','ContasReceberController@listar');
Route::get('/pagar/{id?}','ContasPagarController@listar');
