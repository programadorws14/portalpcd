<div class="modal fade" id="verCandidatos{{ $vaga->id }}" tabindex="-1" role="dialog" aria-labelledby="verCandidatos{{ $vaga->id }}Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="verCandidatos{{ $vaga->id }}Label">Candidatos a vaga: <b>{{ $vaga->titulo ?? 'N/I' }}</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <b>Candidatos a vaga:</b><br /><br />
            <hr/>
            <br />
            
            @if(count($vaga->candidaturas) >= 1)
                @foreach ($vaga->candidaturas as $candidato)
                <div class="row">
                    <div class="text-left col-md-8">
                        <b> #ID: </b>  {{ $candidato->candidato_vaga->id }}<br />
                        <b> Nome: </b>  {{ $candidato->candidato_vaga->nome }}<br />
                        <b> E-mail: </b> {{ $candidato->candidato_vaga->email }}<br />
                        <b> Telefone: </b>  {{ $candidato->candidato_vaga->telefone_celular ?? 'N/I'}} / {{ $candidato->candidato_vaga->telefone_comercial ?? 'N/I'}} / {{ $candidato->candidato_vaga->telefone_residencial ?? 'N/I'}} 
                    </div>
                    <div class="col-md-2">
                        <a href="#" class="btn btn-sm btn-warning"><b>BAIXAR CV</b></a>
                    </div>
                </div>
                <hr />
                @endforeach
            @endif

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><b>FECHAR</b></button>
          <button class="btn btn-sm btn-success" ><b>BAIXAR EXCEL</b></button>
        </div>
      </div>
    </div>
  </div>