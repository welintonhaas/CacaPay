@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="display-4 text-center mb-5">Cadastro de Crédito</h1>

            {{ Form::open(array('route' => 'cadastrar_credito')) }}

            {{ Form::token() }}
            <div class="form-row">
                <div class="form-group col-4">
                    {{ Form::number('valor', null, array('class' => 'form-control', 'step' => '0.01','placeholder'=> 'Valor')) }}
                </div>
                <div class="form-group col-6">
                    {{ Form::select('cliente', $clientes, 'Selecione um Cliente', array('class'=> 'form-control')) }}
                </div>
                <div class="form-group col-2">
                    {{ Form::submit('Cadastrar', array('class'=>'btn btn-primary')) }}
                </div>
            </div>

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection