<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Listar Categorias</div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="tabelaDinamica table table-striped table-bordered table-hover table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="45%">Descrição</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="45%">URL</th>
                                    <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="10%">Ação</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($categorias as $categoria)
                                <tr>
                                    <td class="align-middle">{{ $categoria->descricao ?? null }}</td>
                                    <td class="align-middle">{{ $categoria->slug ?? null }}</td>
                                    <td class="align-middle">
                                        <a href="{{ route('admin.blog.categoria.edit', $categoria->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.blog.categoria.delete', $categoria->id) }}" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>