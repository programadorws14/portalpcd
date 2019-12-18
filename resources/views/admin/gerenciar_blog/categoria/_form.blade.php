@csrf

@if(!empty($edit))
<input type="hidden" name="id" value="{{ $edit->id }}" />
@endif

<div class="col-md-12">
    <div class="input-group input-group-sm mb-4">
        <div class="input-group-prepend">
            <div class="input-group-text">Descrição</div>
        </div>
        <input type="text" class="form-control" value="@if(!empty($edit)) {{ $edit->descricao }} @else {{ old('descricao') }} @endif" name="descricao">
    </div>
</div>