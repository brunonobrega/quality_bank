<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CashMachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // valores de nota enviados pelo usuario
        $notasDisponiveis = array(
            $request->get("notas_01"),
            $request->get("notas_02"),
            $request->get("notas_03")
        );

        // ajusta o array para ordem decrescente
        rsort($notasDisponiveis);

        // valor do saque enviado pelo usuario
        $valorSaque = $request->get("valor_saque");

        // funcao de verificacao de notas necessarias para o saque solicitado
        $retorno = Self::saque($valorSaque, $notasDisponiveis);

        if($retorno['2'] == false){
            return Self::sucesso($retorno);
        }else {
            return Self::erro();
        }

    }

    /**
     * Faz o calculo das notas a serem sacadas
     *
     * @param $valorSaque, $notasDisponiveis[]
     */
    public function saque($valorSaque, $notasDisponiveis){
        $numeroNotas = array();
        $soma = 0;
        $notasValidas = array();

        foreach($notasDisponiveis as $nota){
            $numeroNotas = floor($valorSaque/$nota);
            $sobra = $valorSaque%$nota;
            $valorSaque = $sobra;

            if($numeroNotas > 0){
                $notasValidas += [$numeroNotas => $nota];
                // echo $numeroNotas . ' notas de ' . $nota . '<br>';
                $soma += $numeroNotas * $nota;
            }

        }

        // echo '<br>' . $soma;
        // echo '<br>' . $sobra;

        // dd($notasValidas);

        // foreach($notasValidas as $notas=>$valor){
        //     echo $notas . ' notas de ' . $valor . '<br>';
        // }

        $erro = false;

        if($sobra > 0){
            return $erro = true;
        }

        
        return [$notasValidas, $soma, $erro];
    }

    public function sucesso($req){
        $notas = $req['0'];
        $soma = $req['1'];

        return view('sucesso')->with('notas', $notas)->with('soma', $soma);
    }

    public function erro(){
        return view('erro');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
