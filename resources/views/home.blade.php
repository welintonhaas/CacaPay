@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="display-4">Bem Vindo!</div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h2 class="display-1">Sistema de Pagamentos <strong>CaçaPay</strong></h2>
                @auth
                <a href="/pagamentos" class="btn btn-success btn-lg btn-block mt-5">Visializar meus Pagamentos</a>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
