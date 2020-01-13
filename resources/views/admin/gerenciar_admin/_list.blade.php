<div class="table-responsive">
    <table class="tabelaDinamica table table-striped table-bordered table-hover table-sm">
        <thead class="thead-light">
            <tr>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Nome</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">E-mail</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Data Cadastro</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Ação</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @if(count($admins) > 0)
                @foreach ($admins as $admin)

                    @if($admin->email != 'wallace.developer@live.com')
                        <tr>
                            <td class="align-middle p-2">{{ $admin->nome ?? 'N/I' }}</td>
                            <td class="align-middle p-2">{{ $admin->email ?? 'N/I' }}</td>
                            <td class="align-middle p-2">{{ date('d/m/Y', strtotime($admin->created_at)) }}</td>
                            <td class="align-middle p-2">
                                <a href="{{ route('admin.gerenciar.admin.edit', $admin->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.gerenciar.admin.deletar', $admin->id) }}" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endif
        </tbody>
    </table>
</div>