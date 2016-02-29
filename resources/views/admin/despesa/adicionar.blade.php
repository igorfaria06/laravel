{{-- ADICIONAR DE CONTAS --}}
<?php
$titulo = 'Despesas';
$subtitulo = 'Criar';
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


{!! Form::open(array('url' => 'admin/despesa/adicionar')) !!}
@include('admin.despesa.form')        


<div class="row" style="margin-top: 10px;">
    <div class="col-lg-1">
        <a href="{{url()}}/admin/despesa/adicionar">
            {!! Form::submit('Enviar', ['class'=>'btn btn-success'])!!}
            {!! Form::close() !!}
        </a>        
    </div>


    <div class="col-lg-offset-10 col-lg-1">                
        <a href="{{ url() }}/admin/despesa" class="btn btn-danger">
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