<div class="table-responsive">
    <table class="tabelaDinamica table table-striped table-bordered table-hover table-sm">
        <thead class="thead-light">
            <tr>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="5%">Foto</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Nome</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">E-mail</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Data Nascimento</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Idade</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Sexo</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">CPF</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Telefone(s)</th>
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
            @if(count($usuarios) > 0)
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td class="align-middle p-2">
                            @if(!empty($usuario->foto))
                            <img src="{{ asset($usuario->foto) }}" width="60" height="60" style="border-radius:100%;" alt="" />
                            @else
                            <img src="{{ asset('site/assets/images/profile-image.png') }}" width="60" height="60" alt="" />
                            @endif
                        </td>
                        <td class="align-middle p-2">{{ $usuario->nome ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $usuario->email ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ ( $usuario->data_nascimento ? date('d/m/Y', strtotime($usuario->data_nascimento)) : '' ) }}</td>
                        <td class="align-middle p-2">{{ ( $usuario->data_nascimento ? date('Y') - date('Y', strtotime($usuario->data_nascimento)) . 'Anos' : '' ) }}</td>
                        <td class="align-middle p-2">{{ $usuario->sexo ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $usuario->cpf ?? 'N/I' }}</td>
                        <td class="align-middle p-2">
                            Telefone Comercial: {{ $usuario->telefone_comercial ?? 'N/I' }} <br />
                            Telefone Residencial: {{ $usuario->telefone_residencial ?? 'N/I' }} <br />
                            Celular: {{ $usuario->telefone_celular ?? 'N/I' }} <br />
                        </td>
                        <td class="align-middle p-2">{{ $usuario->cep ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $usuario->rua ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $usuario->numero ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $usuario->complemento ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $usuario->bairro ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $usuario->cidade ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $usuario->estado ?? 'N/I' }}</td>
                        <td class="align-middle p-2">
                            <a href="{{ route('admin.gerenciar.edit', $usuario->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('admin.gerenciar.deletar', $usuario->id) }}" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>