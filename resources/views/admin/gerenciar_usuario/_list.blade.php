<div class="table-responsive">
    <table class="tabelaDinamica table table-striped table-bordered table-hover table-sm">
        <thead class="thead-light">
            <tr>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="5%">Foto</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Nome</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">E-mail</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Sexo</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">CPF</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Telefone(s)</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Localização</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Cadastro</th>
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
                        <td class="align-middle p-2">{{ $usuario->sexo ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $usuario->cpf ?? 'N/I' }}</td>
                        <td class="align-middle p-2">
                            Telefone Comercial: {{ $usuario->telefone_comercial ?? 'N/I' }} <br />
                            Telefone Residencial: {{ $usuario->telefone_residencial ?? 'N/I' }} <br />
                            Celular: {{ $usuario->telefone_celular ?? 'N/I' }} <br />
                        </td>
                        <td class="align-middle p-2">{{ $usuario->cidade ?? 'N/I' }} - {{ $usuario->estado ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ date('d/m/Y', strtotime($usuario->created_at)) }}</td>
                        <td class="align-middle p-2">
                            <a href="{{ route('admin.gerenciar.edit', $usuario->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('admin.gerenciar.deletar', $usuario->id) }}" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#usuario-{{ $usuario->id }}"><i class="fas fa-eye"></i></button>
                        </td>
                    </tr>

                    <!---MODAL VISUALIZAÇÃO RÁPIDA DO CANDIDATO--->
                    <div class="modal fade" id="usuario-{{ $usuario->id }}" tabindex="-1" role="dialog" aria-labelledby="usuario-{{ $usuario->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="font-weight:bold; font-size:17px; text-transform:uppercase;" id="usuario-{{ $usuario->id }}"><i class="fas fa-eye"></i> {{  $usuario->nome ?? null}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Veja as informações rápidas do usuário:</p>
                                <span><i class="fas fa-user"></i> Nome: <b>{{ $usuario->nome ?? null }}</b> </span>
                                <hr />
                                <span><i class="fas fa-calendar"></i> Telefone(s): <b>  Telefone Comercial: {{ $usuario->telefone_comercial ?? 'N/I' }} <br />
                                    Telefone Residencial: {{ $usuario->telefone_residencial ?? 'N/I' }} <br />
                                    Celular: {{ $usuario->telefone_celular ?? 'N/I' }} <br /></b>  </span><hr />
                                <span><i class="fas fa-info-circle"></i> Sobre o Candidato: <b>{{ $usuario->texto_sobre_voce ?? null }}</b> </span><hr />
                                <span><i class="fas fa-thermometer-half"></i> Status Laudo <b>Ótimo</b> </span><hr />
                                <button class="btn btn-info btn-sm" style="color:#333 !important; font-weight:bold;"><i class="fas fa-file-pdf"></i> Download Curriculum</button>
                                <br />
                                <br />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                @endforeach
            @endif
        </tbody>
    </table>
</div>