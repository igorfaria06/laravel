<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>

<div class='row'>
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('Nome') !!}
            {!! Form::text('nome', isset($receita->nome) ? $receita->nome : null, ['placeholder'=>'Your name', 'class'=>'form-control']) !!}

            {!! Form::label('Nome | Conta | Banco | Saldo') !!}
            <select class="form-control" name="banco_id">
                @foreach($contas as $conta)
                <option value="{{$conta->id}}">{{$conta->nome}} | {{$conta->conta}} | {{$conta->banco->nome}} | {{$conta->saldo}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('Categoria') !!}
            {!! Form::text('nome', isset($receita->nome) ? $receita->nome : null, ['placeholder'=>'Your name', 'class'=>'form-control']) !!}

            {!! Form::label('Valor') !!}
            {!! Form::text('receita', isset($receita->conta_id) ? $receita->conta_id : null, ['placeholder'=>'Número da receita', 'class'=>'form-control']) !!}
        </div>
    </div>
</div> <!-- row table -->
<div class='row'>
    <div class="col-lg-12">
        {!! Form::label('Descrição') !!}
        {!! Form::textarea('descricao', isset($receita->descricao) ? $receita->descricao : null, ['class'=>'form-control']) !!}
    </div>
</div>
