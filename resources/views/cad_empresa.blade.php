@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1 class="display-4 text-center mb-5">Cadastro de Empresa</h1>

            {{ Form::open(array('route' => 'cadastrar_empresa')) }}

            {{ Form::token() }}
            <div class="form-row">
                <div class="form-group col-12">
                    {{ Form::text('razaoSocial', null, array('class' => 'form-control', 'placeholder'=> 'Razão Social')) }}
                </div>
  
                <div class="form-group col-6">
                    {{ Form::text('cnpj',null, array('class' => 'form-control', 'placeholder'=> 'CNPJ')) }}
                </div>
                <div class="form-group col-6">
                    {{ Form::text('telefone',null, array('class' => 'form-control', 'placeholder'=> 'Telefone')) }}
                </div>

                <div class="form-group col-12">
                {{ Form::email('email',null, array('class' => 'form-control', 'placeholder'=> 'E-mail')) }}
                </div>
            </div>

            {{ Form::submit('Cadastrar', array('class'=>'btn btn-primary')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection