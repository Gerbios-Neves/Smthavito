@extends('layouts.adminmaster')

@section('content')
<div class="main-content container-fluid">
<div class="card card-table">
      <div class="card-header">Detalhes do Aluno:
            <a href="/aluno" class="btn btn-warning">Retornar a Lista</a>
            
            @php
              $pagamentos = App\Pagamento::where('aluno_id',$aluno->id)->where('tipo_pagamento', 'Cartar')->get();
              $valor_pago = 0;
          
              foreach($pagamentos as $pagamento){
                  $valor_pago += $pagamento->valor_pago;
              }
              $aluno = App\Aluno::with('carta')->where('id',$aluno->id)->first();
              $divida = $aluno->carta->preco - $valor_pago;
            @endphp

        <a class="btn btn-default">
            Total Pago: {{$valor_pago}}   
        </a>
        @if ($divida > 0) 
        <a class="btn btn-default">
            Valor a Dever: {{$divida}}
        </a>
        @endif

                  <div class="tools dropdown"><span class=""></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class=""></span></a>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table">
                    <tbody>
                    <tr>
                        <td>#</td>
                        <td>{{$aluno->id}}</td>
                      </tr>
                      <tr>
                        <td>Numero do Processo</td>
                        <td>{{$aluno->numero_processo}}</td>
                      </tr>
                      <tr>
                        <td>Nome</td>
                        <td>{{$aluno->nome}}</td>
                      </tr>
                      <tr>
                        <td>Nome do Pai</td>
                        <td>{{$aluno->nome_pai}}</td>
                        
                      </tr>
                      <tr>
                        <td>Nome da Mae</td>
                        <td>{{$aluno->nome_mae}}</td>
                      </tr>
                      <tr>
                        <td>Estado Civil</td>
                        <td>{{$aluno->estado_civil}}</td>
                      </tr>
                      <tr>
                        <td>Naturalidade</td>
                        <td>{{$aluno->naturalidade}}</td>
                      </tr>
                      <tr>
                        <td>Data de Nascimento</td>
                        <td>{{$aluno->data_nascimento}}</td>
                      </tr>
                      <tr>
                        <td>Bilhete de Identidade</td>
                        <td>{{$aluno->bilhete}}</td>
                      </tr>
                      <tr>
                        <td>Local de Emissao</td>
                        <td>{{$aluno->local_emissao}}</td>
                      </tr>
                      <tr>
                        <td>Contacto</td>
                        <td>{{$aluno->contacto}}</td>
                      </tr>
                      <tr>
                        <td>Tipo de Carta</td>
                        <td>{{$aluno->carta->tipo_carta}}</td>
                      </tr>
                      <tr>
                        <td>Turma</td>
                        <td>{{$aluno->turma->horario}}</td>
                      </tr>
                      <tr>
                        <td>Tipo de Pagamento</td>
                        <td>{{$aluno->tipo_pagamento}}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
</div>
@endsection