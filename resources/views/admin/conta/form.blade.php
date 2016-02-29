<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>

<div class='row'>
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('Nome') !!}
            {!! Form::text('nome', isset($conta->nome) ? $conta->nome : null, ['placeholder'=>'Your name', 'class'=>'form-control']) !!}

            {!! Form::label('Banco') !!}
            {!! Form::select('banco_id', $bancos, isset($conta->banco_id) ? $conta->banco_id : null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('Conta') !!}
            {!! Form::text('conta', isset($conta->conta) ? $conta->conta : null, ['placeholder'=>'Número da conta', 'class'=>'form-control']) !!}

            {!! Form::label('Saldo Atual') !!}
            {!! Form::text('saldo', isset($conta->saldo) ? $conta->saldo : null, ['placeholder'=>'Saldo atual','class'=>'form-control']) !!}
        </div>
    </div>
</div> <!-- row table -->
<div class='row'>
    <div class="col-lg-12">
        {!! Form::label('Descrição') !!}
        {!! Form::textarea('descricao', isset($conta->descricao) ? $conta->descricao : null, ['class'=>'form-control']) !!}
    </div>
</div>
