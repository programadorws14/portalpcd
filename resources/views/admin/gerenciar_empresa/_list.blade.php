<div class="table-responsive">
    <table class="tabelaDinamica table table-striped table-bordered table-hover table-sm">
        <thead class="thead-light">
            <tr>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="5%">Foto</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Nome</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">E-mail</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Telefone</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">CNPJ</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Tamanho</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Fundação</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Especialidades</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Estado Empresa</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Site</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">URL</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">CEP</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Rua</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Número</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Complemento</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Bairro</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Cidade</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Estado</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Ação</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @if(count($empresas) > 0)
                @foreach ($empresas as $empresa)
                    <tr>
                        <td class="align-middle p-2">
                            @if(!empty($empresa->logo_empresa))
                            <img src="{{ asset($empresa->logo_empresa) }}" width="60" height="60" style="border-radius:100%;" alt="" />
                            @else
                            <img src="{{ asset('site/assets/images/profile-image.png') }}" width="60" height="60" alt="" />
                            @endif
                        </td>
                        <td class="align-middle p-2">{{ $empresa->nome ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->email ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->telefone ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->cnpj ?? 'N/I'  }}</td>
                        <td class="align-middle p-2">{{ $empresa->tamanho_empresa ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ ( $empresa->data_fundacao ? date('d/m/Y', strtotime($empresa->data_fundacao)) : 'N/I') }}</td>
                        <td class="align-middle p-2">{{ $empresa->especialidades ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->estado_empresa ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->site_empresa ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->nome_url ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->cep ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->rua ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->numero ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->complemento ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->bairro ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->cidade ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->estado ?? 'N/I' }}</td>
                        <td class="align-middle p-2">
                            <a href="{{ route('admin.gerenciar.empresa.edit', $empresa->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>