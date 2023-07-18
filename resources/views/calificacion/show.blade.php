@extends('layouts.app')

@section('template_title')
    {{ $calificacion->name ?? "{{ __('Show') Calificacion" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Calificacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('calificacions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Alumno Id:</strong>
                            {{ $calificacion->alumno_id }}
                        </div>
                        <div class="form-group">
                            <strong>Asignatura Id:</strong>
                            {{ $calificacion->asignatura_id }}
                        </div>
                        <div class="form-group">
                            <strong>Calificacion:</strong>
                            {{ $calificacion->calificacion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
