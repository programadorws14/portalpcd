<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data de Criação</th>
        </tr>
    </thead>
    <tbody>
        @if(count($newsletters) > 0)
            @foreach ($newsletters as $newletter)
                <tr>
                    <td class="align-middle p-2">{{ $newletter->nome ?? 'N/I' }}</td>
                    <td class="align-middle p-2">{{ $newletter->email ?? 'N/I' }}</td>
                    <td class="align-middle p-2">{{ date('d/m/Y', strtotime($newletter->created_at)) ?? 'N/I' }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
