<table border="1" style="border:1px solid #000000;">
    <thead>
        <tr>
            <th style="background:#f2f2f2; color:#000000; text-align:center; border:1px solid #000000;"><b>Vaga</b></th>
            <th style="background:#f2f2f2; color:#000000; text-align:center; border:1px solid #000000;"><b>Salário</b></th>
            <th style="background:#f2f2f2; color:#000000; text-align:center; border:1px solid #000000;"><b>Quantidade</b></th>
            <th style="background:#f2f2f2; color:#000000; text-align:center; border:1px solid #000000;"><b>Local</b></th>
            <th style="background:#f2f2f2; color:#000000; text-align:center; border:1px solid #000000;"><b>Data</b></th>
            <th style="background:#f2f2f2; color:#000000; text-align:center; border:1px solid #000000;"><b>Status</b></th>
            <th style="background:#f2f2f2; color:#000000; text-align:center; border:1px solid #000000;"><b>Candidato Nome</b></th>
            <th style="background:#f2f2f2; color:#000000; text-align:center; border:1px solid #000000;"><b>Candidato Telefone</b></th>
            <th style="background:#f2f2f2; color:#000000; text-align:center; border:1px solid #000000;"><b>Candidato Cidade</b></th>
            <th style="background:#f2f2f2; color:#000000; text-align:center; border:1px solid #000000;"><b>Candidato Estado</b></th>
            <th style="background:#f2f2f2; color:#000000; text-align:center; border:1px solid #000000;"><b>Candidato email</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($candidaturas as $candidatura)
        <tr>
            <td class="align-middle p-2" style="border:1px solid #000000; width:20%;">{{ $candidatura->vaga->titulo ?? null }}</td>
            <td class="align-middle p-2" style="border:1px solid #000000; width:20%;">{{ ( $candidatura->vaga->salario_de ? 'R$ '.number_format($candidatura->vaga->salario_de, 2, ',', '.') : 'Salário de N/I' )  ?? null }} - {{ ( $candidatura->vaga->salario_ate ? 'R$ '.number_format($candidatura->vaga->salario_ate, 2, ',', '.') : 'Salário até N/I' )  ?? null }}</td>
            <td class="align-middle p-2" style="border:1px solid #000000; width:20%;">{{ $candidatura->vaga->numero_vagas ?? null }}</td>
            <td class="align-middle p-2" style="border:1px solid #000000; width:20%;">{{ $candidatura->vaga->rua.', '.$candidatura->vaga->numero. ' - '. $candidatura->vaga->bairro. ' - '. $candidatura->vaga->cidade.'/'.$candidatura->vaga->estado  ?? null }}</td>
            <td class="align-middle p-2" style="border:1px solid #000000; width:20%;">{{ date('d/m/Y', strtotime($candidatura->vaga->created_at)) ?? null }}</td>
            <td class="align-middle p-2" style="border:1px solid #000000; width:20%;">{{ ( $candidatura->vaga->pausar_vaga == '' ? 'Ativa' : 'Pausada' ) }}</td>
            <td class="align-middle p-2" style="border:1px solid #000000; width:20%;">{{ $candidatura->candidato_vaga->nome ?? null }}</td>
            <td class="align-middle p-2" style="border:1px solid #000000; width:20%;">Telefone Residencial: {{ $candidatura->candidato_vaga->telefone_residencial ?? 'Não Possuí' }} / Telefone Comercial: {{ $candidatura->candidato_vaga->telefone_comercial ?? 'Não Possuí' }} / Telefone Celular: {{ $candidatura->candidato_vaga->telefone_celular ?? 'Não Possuí' }}   </td>
            <td class="align-middle p-2" style="border:1px solid #000000; width:20%;">{{ $candidatura->candidato_vaga->cidade ?? null }}</td>
            <td class="align-middle p-2" style="border:1px solid #000000; width:20%;">{{ $candidatura->candidato_vaga->estado ?? null }}</td>
            <td class="align-middle p-2" style="border:1px solid #000000; width:20%;">{{ $candidatura->candidato_vaga->email ?? null }}</td>
        </tr>
        @endforeach
    </tbody>
</table>