@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container-fluid" col-md-6 offset-md-3>

        <h1 class="display-2 text-center">Cadastro de Clientes</h1>
        <form method="post" action="{{ route('cad_cliente') }}">
            @csrf

            <div class="form-row">
                <div class="col-md-2 mb-3">
                    <label> Digite seu nome</label>
                        <input type="text" name="nome" placeholder="nome">
                </div>
                <div class="col-md-2 mb-3">
                    <label> Digite seu CPF</label>
                        <input type="text" name="cpf" placeholder="cpf">
                </div>
                <div class="col-md-2 mb-3">
                    <label>Digite seu Telefone</label>
                        <input type="text" name="telefone" placeholder="Telefone">                    
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-2 mb-3">
                    <label>Digite sua cidade</label>
                        <input type="text" name="cidade" placeholder="cidade">                    
                </div>
            <div class="col-md-2 mb-3">
                    <label>Digite seu Estado</label>
                        <input type="text" name="state" placeholder="estado">                 
            </div> 
            

            </div>
            <div class="col-md-2 mb-3">
                         <input type="submit" class="btn btn-primary value = Enviar Cadastro">               
            </div> 

            </div>  
        </div>
    </div>
</div>
@endsection
