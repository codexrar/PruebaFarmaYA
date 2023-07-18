@extends('layouts.app')

@section('template_title')
    {{ $profesor->name ?? "{{ __('Show') Profesor" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Profesor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('profesors.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $profesor->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $profesor->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Cedula:</strong>
                            {{ $profesor->cedula }}
                        </div>
                        <div class="form-group">
                            <strong>Asignatura Id:</strong>
                            {{ $profesor->asignatura_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
