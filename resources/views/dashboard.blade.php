{{-- resources/views/dashboard.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>¡Bienvenido, {{ Auth::user()->name }}!</h4>
                    <p>Empresa: <strong>{{ $empresa->nombre ?? 'Sin empresa asignada' }}</strong></p>
                    <p>Email: {{ Auth::user()->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection