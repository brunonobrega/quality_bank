@extends('layouts.app')

@section('content')
    <div class="title m-b-md">
        Quality Bank
    </div>

    <div class="conteudo">
        <div class="alert alert-danger" role="alert">
            <p class="texto-erro">Não é possível realizar o saque solicitado com as notas informadas.</p>
        </div>
        <button type="submit" class="btn-lg btn-block btn-primary" onClick="window.history.back();">Voltar</button>
    </div>
@endsection