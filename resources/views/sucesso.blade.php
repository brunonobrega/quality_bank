@extends('layouts.app')

@section('content')
    <div class="title">
        Quality Bank
    </div>

    <div class="conteudo-sucesso">
        @if($notas && $soma)
        <div class="alert alert-success" role="alert">
            <p class="texto-erro">
            @foreach($notas as $nota=>$valor)
                {{$nota}} notas de R$ {{$valor}},00 <br>
            @endforeach
            <br> Total Sacado R$ {{$soma}},00
            </p>
        </div>
        @else
        <div class="alert alert-danger" role="alert">
            <p class="texto-erro">
            Não é possível realizar o saque solicitado com as notas informadas.
            </p>
        </div>
        @endif
        <button type="submit" class="btn-lg btn-block btn-primary" onClick="window.history.back();">Voltar</button>
    </div>
@endsection