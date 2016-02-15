@extends('admin.templates.painel')

@section('header')
@include('admin.templates.header')
@endsection

@section('sidebar-left')
@include('admin.templates.sidebar-left')
@endsection

@section('conteudo')
<!-- PAINEIS INICIAIS -->
<div class='row'>
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>150</h3>
                <p>New Orders</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>
                <p>Bounce Rate</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->
    <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-gray">
            <div class="inner">
                <h3>44</h3>
                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div><!-- ./col -->

</div><!-- /.row -->

<div class="row">
    <div class="col-lg-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Collapsable</h3>
                <div class="box-tools pull-right">
                    <span class="fa fa-edit"></span>
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                The body of the box
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>

    <div class="col-lg-6">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Collapsable</h3>
                <div class="box-tools pull-right">
                    <span class="fa fa-edit"></span>
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                The body of the box
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /. div col-lg -->
    </div><!-- /. div row -->
    
    <div class='row'>
        
        
        
    </div>
    
    
    @endsection

    @section('sidebar-direita')
    include('admin.templates.sidebar-direita')
    @endsection

    @section ('scripts')

    
    @endsection