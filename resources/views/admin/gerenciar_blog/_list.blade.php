<div class="table-responsive">
    <table class="tabelaDinamica table table-bordered table-sm">
        <thead class="thead-light">
            <tr>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="5%">Capa</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="40%">Titulo</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="10%">Categoria</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="5%">Ação</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($posts as $post)
            <tr>
                <td class="align-middle">
                    @if(!empty($post->capa))
                    <img style="border:1px solid #ccc;" src="{{ asset($post->capa)}}" width="120" height="120" class="img-fluid" alt="{{ $post->titulo }}" title="{{ $post->titulo }}">
                    @else
                    <img style="border:1px solid #ccc;" src="{{ asset('img/img-empresa.png')}}" width="120" height="120" class="img-fluid" alt="{{ $post->titulo }}" title="{{ $post->titulo }}">
                    @endif
                </td>
                <td class="align-middle">{{ $post->titulo ?? null }}</td>
                <td class="align-middle">{{ $post->categoria->descricao ?? null }}</td>
                <td class="align-middle">
                    <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>
                    <a href="{{ route('admin.blog.edit', $post->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="{{ route('admin.blog.delete', $post->id) }}" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
