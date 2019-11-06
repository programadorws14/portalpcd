@extends('admin.layouts.app')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header"></b>Postagens</b>
            <a href="{{ route('admin.blog.post.create') }}" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Novo Post</a>
        </div>
        <div class="card-body">
            @if(Session('success'))
            <div class="alert alert-success">
                <b><i class="fas fa-check"></i> {{ Session('success') }}</b>
            </div>
            @elseif(Session('error'))
            <div class="alert alert-danger">
                <b><i class="fas fa-minus"></i> {{ Session('error') }}</b>
            </div>
            @endif
            <div class="table-responsive">
                <table class="tabelaDinamica table table-bordered table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="10%">Capa</th>
                            <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="40%">Titulo</th>
                            <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="10%">Categoria</th>
                            <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="8%">Visitas</th>
                            <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="10%">Autor</th>
                            <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="13%">Ação</th>
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
                            <td class="align-middle">{{ $post->categoria[0]->descricao ?? null }}</td>
                            <td class="align-middle">12</td>
                            <td class="align-middle">{{ $post->autor[0]->nome ?? null }}</td>
                            <td class="align-middle">
                                <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.blog.post.edit', $post->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.blog.post.delete', $post->id) }}" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection