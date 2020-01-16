@csrf

@if(!empty($edit))
<input type="hidden" name="id" value="{{ $edit->id }}" />
@endif

<div class="col-md-12">
    <div class="input-group input-group-sm mb-4">
        <div class="input-group-prepend">
            <div class="input-group-text">Descrição</div>
        </div>
    <input type="text" class="form-control" value="{{ (!empty($edit->descricao) ? $edit->descricao : old('descricao')) }}" name="descricao" required="required">
    </div>
</div>