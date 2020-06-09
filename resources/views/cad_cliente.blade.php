@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container-fluid">

                <h1 class="display-4 text-center mb-5">Cadastro de Clientes</h1>

                <form method="post" action="{{ route('cadastrar_cliente') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <input type="text" class="form-control" name="name" placeholder="Digite seu Nome">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="cpf" placeholder="Digite seu CPF">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="telefone" placeholder="Digite o seu Telefone">                                    
                        </div> 
                    </div> 

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <select name="estado" class="form-control">
                                <option selected>Selecione seu Estado</option>
                                    @foreach ($estado as $e)
                                        <option>{{$e->estado}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <select name="cidade" class="form-control">
                                <option selected>Selecione sua Cidade</option>
                                @foreach ($cidade as $c)
                                    <option value="{{$c->id}}">{{$c->cidade}}</option>
                                @endforeach
                            </select>
                          </div>
                    </div>

                    <p>Dados para Acesso a Conta</p>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <input type="email" class="form-control" name="email" placeholder="E-mail">                    
                        </div>
                        <div class="form-group col-md-4">
                            <input type="password" class="form-control" name="password" placeholder="Senha"> 
                        </div>
                    </div>
                    
                    <input type="submit" class="btn btn-primary" value ="Cadastrar">     
                </form>          
            </div>
        </div>
    </div>
</div>
@endsection
