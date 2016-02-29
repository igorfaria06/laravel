{{-- INDEX DE CONTAS --}}
<?php
$titulo = 'Despesas';
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

<div class='row'>
    <div class="col-lg-12">
        <div class="box box-info">
            <table class="table table-striped table-hover text-center">
                <thead class="text-bold text-uppercase">
                    <tr>
                        <td width="5%"></td>
                        <td width="30">Nome</td>
                        <td width="30%">Categorias</td>
                        <td width="10%">Valor</td>                        
                        <td width="10%">Data Pagamento</td>
                        <td width="10%">Data Vencimento</td>
                        <td width="5%">Acoes</td>
                    </tr>
                </thead>
                <tbody class="">
                    @forelse($despesas as $val)                    
                    <tr>
                        <td><span class="glyphicon {!!($val->status == 1) ? 'glyphicon-ok' : 'glyphicon-time'!!}"></span></td>
                        <td>{{$val->nome}}</td>
                        <td>{{$val->valor}}</td>
                        <td>{{$val->status}}</td>
                        <td>{{date("d/m/Y", strtotime($val->data_vencimento))}}</td>
                        <td>{{date("d/m/Y", strtotime($val->data_pagamento))}}</td>
                        <td>
                            <a href="{!! route('conta.despesa.editar',$val->id) !!}" class="glyphicon glyphicon-th-list"></a> 
                            <a href="{!! route('conta.despesa.deletar',$val->id) !!}" class="glyphicon glyphicon-remove">  </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">Não há despesas registradas</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="row">
                <div class="col-lg-offset-4 col-lg-4">
                    {!! $despesas->render() !!}
                </div>
            </div>

        </div>
    </div>
</div> <!-- row table -->
<div class="row">

    <div class="col-lg-offset-11 col-lg-1">
        <a href="{{url()}}/admin/despesa/adicionar">
        <button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i></button>
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