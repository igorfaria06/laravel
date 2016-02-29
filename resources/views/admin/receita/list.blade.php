{{-- INDEX DE CONTAS --}}
<?php
$titulo = 'Receitas';
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
                        <td width="10%">Nome</td>
                        <td width="20%">Banco</td>
                        <td width="20%">Conta</td>
                        <td width="30%">Valor</td>
                        <td width="10%">Categorias</td>
                        <td width="10%">Acoes</td>
                    </tr>
                </thead>
                <tbody class="">
                    @forelse($receitas as $val)                    
                    <tr>
                        <td>{{$val->nome}}</td>
                        <td>bradesco</td>
                        <td>1230-213-0</td>
                        <td>askdjasdjkh</td>
                        <td>123k12j3ka</td>
                        <td>
                            <a href="{!! route('conta.receita.editar',$val->id) !!}" class="glyphicon glyphicon-th-list"></a> 
                            <a href="{!! route('conta.receita.deletar',$val->id) !!}" class="glyphicon glyphicon-remove">  </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">Não há receitas registradas</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="row">
                <div class="col-lg-offset-4 col-lg-4">
                    {!! $receitas->render() !!}
                </div>
            </div>

        </div>
    </div>
</div> <!-- row table -->
<div class="row">

    <div class="col-lg-offset-11 col-lg-1">
        <a href="{{url()}}/admin/receita/adicionar">
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