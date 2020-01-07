<div class="table-responsive">
    <table class="tabelaDinamica table table-bordered table-sm">
        <thead class="thead-light">
            <tr>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="40%">Titulo</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="5%">Ação</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @if(count($paginas) > 0)
            @foreach($paginas as $pagina)
            <tr>
                <td class="align-middle">{{ $pagina->titulo ?? null }}</td>
                <td class="align-middle">
                    <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.paginas.edit', $pagina->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="{{ route('admin.paginas.delete', $pagina->id) }}" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>