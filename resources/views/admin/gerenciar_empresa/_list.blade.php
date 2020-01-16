<div class="table-responsive">
    <table class="tabelaDinamica table table-striped table-bordered table-hover table-sm">
        <thead class="thead-light">
            <tr>
               
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2" width="5%">Foto</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Nome</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Sócios</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Telefone</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Especialidades</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Estado Empresa</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Site</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Localização</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Cadastro</th>
                <th scope="col" style="font-size: 1em;" class="align-middle pl-2">Ação</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @if(count($empresas) > 0)
                @foreach ($empresas as $empresa)
                    <tr>
                        <td class="align-middle p-2">
                            @if(!empty($empresa->logo_empresa))
                            <img src="{{ asset($empresa->logo_empresa) }}" width="60" height="60" style="border-radius:100%;" alt="" />
                            @else
                            <img src="{{ asset('site/assets/images/profile-image.png') }}" width="60" height="60" alt="" />
                            @endif
                        </td>
                        <td class="align-middle p-2">{{ $empresa->nome ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->nome_socios ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->telefone ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->especialidades ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->estado_empresa ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->site_empresa ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ $empresa->cidade ?? 'N/I' }} - {{ $empresa->estado ?? 'N/I' }}</td>
                        <td class="align-middle p-2">{{ date('d/m/Y', strtotime($empresa->created_at)) }}</td>
                        <td class="align-middle p-2">
                            <a href="{{ route('admin.gerenciar.empresa.edit', $empresa->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="" onClick="return confirm('Deseja mesmo deletar ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#empresa-{{ $empresa->id }}"><i class="fas fa-eye"></i></button>
                        </td>
                    </tr>

                    <!---MODAL VISUALIZAÇÃO RÁPIDA DA Empresa--->
                    <div class="modal fade" id="empresa-{{ $empresa->id }}" tabindex="-1" role="dialog" aria-labelledby="empresa-{{ $empresa->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="font-weight:bold; font-size:17px; text-transform:uppercase;" id="empresa-{{ $empresa->id }}"><i class="fas fa-eye"></i> {{  $empresa->nome ?? null}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Veja as informações rápidas da empresa:</p>
                                    <span><i class="fas fa-user"></i> Nome: <b>{{ $empresa->nome ?? null }}</b></span><hr />
                                    <span><i class="fas fa-user-tag"></i> Especialidades: <b>{{ $empresa->especialidades ?? null }}</b></span><hr />
                                    <span><i class="fas fa-sitemap"></i> Data Cadastro: <b>{{ date('d/m/Y', strtotime($empresa->created_at)) ?? null }}</b></span><hr />
                                    <span><i class="fas fa-phone-square-alt"></i> Telefone: <b>{{ $empresa->telefone ?? null }}</b> / E-mail: <b>{{ $empresa->email ?? null }}</b></span><hr />
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