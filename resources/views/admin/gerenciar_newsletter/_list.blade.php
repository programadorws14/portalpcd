<div class="table-responsive">
    <table class="tabelaDinamica table  table-bordered table-hover table-sm">
        <thead class="thead-light">
            <tr>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Nome</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">E-mail</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Ação</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @if(count($newsletters) > 0)
                @foreach ($newsletters as $newletter)
                    <tr>
                        <td class="align-middle p-2">{{ $newletter->nome ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $newletter->email ?? 'N/I' }}</td>
                        <td class="align-middle p-2">
                            <a href="{{ route('admin.newsletter.deletar', $newletter->id) }}" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>