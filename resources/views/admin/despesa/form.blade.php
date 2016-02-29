<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>

<div class='row'>
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('Nome') !!}
            {!! Form::text('nome', isset($despesa->nome) ? $despesa->nome : null, ['placeholder'=>'Your name', 'class'=>'form-control']) !!}

            {!! Form::label('Valor') !!}
            {!! Form::text('valor', isset($despesa->valor) ? $despesa->valor : null, ['class'=>'form-control']) !!}
            
            {!! Form::label('Categoria') !!}
            {!! Form::select('categorias[]', [''=> ''], isset($despesa->banco_id) ? $despesa->banco_id : null, ['class'=>'form-control']) !!}

        
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('Data de Pagamento') !!}
            {!! Form::text('data_pagamento', isset($despesa->data_pagamento) ? date("d/m/Y", strtotime($despesa->data_pagamento)) : null, ['placeholder'=>'Data de Pagamento', 'class'=>'form-control']) !!}

            {!! Form::label('Data de Vencimento') !!}
            {!! Form::text('data_vencimento', isset($despesa->data_vencimento) ? date("d/m/Y", strtotime($despesa->data_vencimento)) : null, ['placeholder'=>'Data de Vencimento','class'=>'form-control']) !!}

            {!! Form::label('Status') !!}
            {!! Form::text('status', isset($despesa->status) ? (($despesa->status == 1) ? 'Pago' : 'Pendente') : 'Despesa ainda não criada', ['class'=>'form-control', 'readonly']) !!}

        </div>
    </div>
</div> <!-- row table -->
<div class='row'>
    <div class="col-lg-12">
        {!! Form::label('Descrição') !!}
        {!! Form::textarea('descricao', isset($despesa->descricao) ? $despesa->descricao : null, ['class'=>'form-control']) !!}
    </div>
</div>
