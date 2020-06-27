@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            @if(isset($msg[0]))
                @if($msg[0]==true)
                    <div class="alert alert-success" role="alert">
                        {{ $msg['msg'] }}
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        {{ $msg['msg'] }}
                    </div>
                @endif
            @else
                <div class="display-4">Bem Vindo!</div>
                <h2 class="display-1">Sistema de Pagamentos <strong>CaçaPay</strong></h2>
                @auth
                <a href="{{ route('pagamentos') }}" class="btn btn-success btn-lg btn-block mt-5">Visualizar meus Pagamentos</a>
                @endauth
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
