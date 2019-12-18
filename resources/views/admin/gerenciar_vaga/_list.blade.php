<div class="table-responsive">
    <table class="tabelaDinamica table table-striped table-bordered table-hover table-sm">
        <thead class="thead-light">
            <tr>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Empresa</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Titulo</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Salario</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Status</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Tipo Vaga</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Numero Vaga(s)</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">CEP</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Rua</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Número</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Complemento</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Bairro</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Cidade</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Estado</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Candidatos</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Ação</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @if(count($vagas) > 0)
            @foreach ($vagas as $vaga)
            <tr>
                <td class="align-middle p-2">{{ $vaga->empresa->nome ?? 'N/I' }}</td>
                <td class="align-middle p-2">{{ $vaga->titulo ?? 'N/I' }}</td>
                <td class="align-middle p-2">
                    @if($vaga->salario_acombinar != '')
                    Salario A Combinar
                    @else
                    Salário de: {{ $vaga->salario_de ?? 'N/I' }} <br />
                    Salário ate: {{ $vaga->salario_ate ?? 'N/I' }} <br />
                    @endif
                </td>
                <td class="align-middle p-2">
                    @if($vaga->pausar_vaga == '')
                    <span class="badge badge-success">Ativa</span>
                    @else
                    <span class="badge badge-secondary">Pausada</span>
                    @endif
                </td>
                <td class="align-middle p-2">{{ $vaga->tipo_emprego ?? 'N/I' }}</td>
                <td class="align-middle p-2">{{ $vaga->numero_vagas ?? 'N/I' }}</td>
                <td class="align-middle p-2">{{ $vaga->cep ?? 'N/I' }}</td>
                <td class="align-middle p-2">{{ $vaga->rua ?? 'N/I' }}</td>
                <td class="align-middle p-2">{{ $vaga->numero ?? 'N/I' }}</td>
                <td class="align-middle p-2">{{ $vaga->complemento ?? 'N/I' }}</td>
                <td class="align-middle p-2">{{ $vaga->bairro ?? 'N/I' }}</td>
                <td class="align-middle p-2">{{ $vaga->cidade ?? 'N/I' }}</td>
                <td class="align-middle p-2">{{ $vaga->estado ?? 'N/I' }}</td>
                <td class="align-middle p-2">
                @if(count($vaga->candidaturas) > 0)
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#verCandidatos{{ $vaga->id }}"> <i class="fas fa-users"></i> Candidatos</button>
                    @include('admin.gerenciar_vaga._modal_candidatos')
                @else 
                    <span class="badge badge-info">Não há candidatos</span>
                @endif
                </td>
                <td class="align-middle p-2">
                    <a href="{{ route('admin.gerenciar.vaga.edit', $vaga->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="#" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>