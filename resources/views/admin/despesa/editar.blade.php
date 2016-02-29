{{-- EDITAR DE CONTAS --}}
<?php
$titulo = 'Despesas';
$subtitulo = 'Editar';
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


{!! Form::open(array('route' => ['conta.despesa.atualizar', $despesa->id])) !!}
@include('admin.despesa.form')        


<div class="row" style="margin-top: 10px;">
    <div class="col-lg-1">
        {!! Form::submit('Enviar', ['class'=>'btn btn-success'])!!}
        {!! Form::close() !!}
    </div>


    <div class="col-lg-2">
        @if($despesa->status == '0')
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPagar">Pagar</button>
        @else
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalPagar">Inf. Pagamento</button>
        @endif
        <!-- Modal -->
        <div id="modalPagar" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Pagar Despesa</h4>
                    </div>
                    <div class="modal-body">
                        @if($despesa->status == '0')                  
                        {!! Form::open(array('route' => ['conta.despesa.pagar'])) !!}
                        {!! Form::label('Conta') !!}
                        {!! Form::select('conta', $contas, null, ['style'=>'margin-bottom:10px','class'=>'form-control']) !!}
                        {!! Form::label('Valor') !!}
                        {!! Form::text('valor', $despesa->valor, ['class'=>'form-control', 'readonly']) !!}
                        {!! Form::text('despesa_id', $despesa->id, ['class'=>'form-control hidden', 'readonly']) !!}
                        @else
                        {!! Form::open(array('route' => ['conta.despesa.pagar'])) !!}
                        {!! Form::label('Conta Débitada') !!}
                        {!! Form::text('conta', $despesa->conta->nome, ['style'=>'margin-bottom:10px','class'=>'form-control', 'readonly']) !!}
                        {!! Form::label('Valor') !!}
                        {!! Form::text('valor', $despesa->valor, ['class'=>'form-control', 'readonly']) !!}
                        @endif
                    </div>
                    <div class="modal-footer">
                        {!! Form::submit("", ['class'=>'btn btn-success hidden'])!!}
                        {!! Form::close() !!}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <div class="col-lg-offset-8 col-lg-1">                
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