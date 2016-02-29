{{-- EDITAR DE CONTAS --}}
<?php
$titulo = 'Editar';
$subtitulo = 'Início';
?>
@extends('admin.templates.painel')
@section('titulo')
{{$titulo}}
@endsection
@section('header')
@include('admin.templates.header')
@endsection

@section('sidebar-left')
@include('admin.templates.sidebar-left')
@endsection

@section('conteudo')


{!! Form::open(array('route' => ['conta.atualizar', $conta->id])) !!}
@include('admin.conta.form')        


<div class="row" style="margin-top: 10px;">
    <div class="col-lg-1">
            {!! Form::submit('Enviar', ['class'=>'btn btn-success'])!!}
            {!! Form::close() !!}
    </div>


    <div class="col-lg-offset-10 col-lg-1">                
        <a href="{{ url() }}/admin/conta" class="btn btn-danger">
            Voltar
        </a>
    </div>
</div>

@endsection

@section('sidebar-direita')
include('admin.templates.sidebar-direita')


@endsection

@section ('scripts')
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>
@endsection