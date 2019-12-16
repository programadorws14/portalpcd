<table>
    <thead>
    <tr>
        <th>#ID</th>
        <th>Empresa</th>
        <th>Vaga</th>
        <th>Usuário</th>
        <th>E-mail Usuário</th>
        <th>Telefone Usuário</th>
        <th>Status Vaga</th>
        <th>Criada em</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($candidaturas as $candidatura)
            <tr>
                <td><b>{{ $candidatura->id ?? 'Não Informado' }}</b></td>
                <td>{{ Auth::guard('empresa')->user()->nome ?? 'Não Informado' }}</td>
                <td>{{ $candidatura->vaga->titulo ?? 'Não Informado' }}</td>
                <td>{{ $candidatura->candidato_vaga->nome ?? 'Não Informado' }}</td>
                <td>{{ $candidatura->candidato_vaga->email  ?? 'Não Informado' }}</td>
                <td>Telefone Residencial: {{ $candidatura->candidato_vaga->telefone_residencial  ?? 'Não Informado' }} / Telefone Comercial:  {{ $candidatura->candidato_vaga->telefone_comercial  ?? 'Não Informado' }} / Telefone Celular:  {{ $candidatura->candidato_vaga->telefone_celular  ?? 'Não Informado' }}</td>
                <td>
                    @if($candidatura->vaga->pausar_vaga == '')
                       <b>Ativa</b>
                    @else
                        <b>Pausada</b>
                    @endif
                </td>
                <td>{{ date('d/m/Y', strtotime($candidatura->vaga->created_at)) }}</td>
            </tr>
        @endforeach
      
    </tbody>
</table>