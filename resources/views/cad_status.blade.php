@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="display-4 text-center mb-5">Cadastro de Status de Transação</h1>

            {{ Form::open(array('route' => 'cadastrar_status')) }}

            {{ Form::token() }}
            <div class="form-row">
                <div class="form-group col-12">
                    {{ Form::text('nome', null, array('class' => 'form-control', 'placeholder'=> 'Nome do Status')) }}
                </div>
            </div>

            {{ Form::submit('Cadastrar', array('class'=>'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection