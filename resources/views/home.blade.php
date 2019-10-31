@extends('layouts.app')

@section('content')
    <div class="title m-b-md">
        Quality Bank
    </div>

    <div class="conteudo form-group">
        <form method="POST" action="cash">
        @csrf
            <div class="form-group offset-4 col-4 vl-geral row">
                <label for="notas_disponiveis">Notas Disponíveis</label>
                <input type="number" name="notas_01" value="" class="form-control valores" required>
                <input type="number" name="notas_02" value="" class="form-control valores">
                <input type="number" name="notas_03" value="" class="form-control valores">
            </div>

            <div class="form-group offset-4 col-4 vl-geral row">
                <label for="valor_saque">Valor Saque</label>
                <input type="number" name="valor_saque" value="" class="form-control valores" required>
            </div>

            <div class="form-group offset-4 col-4">
                <button type="submit" class="btn-lg btn-block btn-primary">Sacar</button>
            </div>
        </form>
    </div>
@endsection