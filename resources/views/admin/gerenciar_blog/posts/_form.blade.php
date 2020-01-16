@csrf
@if(!empty($edit))
<input type="hidden" value="{{ $edit->id ?? null }}" name="id">
@endif

<div class="col-md-12">
    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <div class="input-group-text">Capa</div>
        </div>
        <input type="file" accept="image/*" class="form-control" name="capa">
    </div>
</div>

<div class="col-md-8">
    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <div class="input-group-text">Titulo</div>
        </div>
        <input type="text" class="form-control" value="{{ ( !empty($edit->titulo) ? $edit->titulo : old('titulo') ) }}" name="titulo" required>
    </div>
</div>

<div class="col-md-4">
    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <div class="input-group-text">Categoria</div>
        </div>
        <select class="form-control" name="categoria_id" required>
            <option value="">Selecione</option>
            @foreach($categorias as $categoria)
            <option @if(!empty($edit) && $edit->categoria_id == $categoria->id)
                selected
                @elseif(old('categoria_id') == $categoria->id)
                selected
                @endif
                value="{{ $categoria->id ?? null }}">{{ $categoria->descricao ?? null }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-12 mb-3">
    <textarea type="text" class="editor form-control" rows="15" name="conteudo" placeholder="Conteúdo">@if(!empty($edit)) {{ $edit->conteudo }} @else {{ old('conteudo') }} @endif</textarea>
</div>

@section('scripts')
<script src="https://cdn.tiny.cloud/1/lqk0zhhopgun65yfm2oh7o5wgu8lyeqseadx1t24nughq8gz/tinymce/5/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '.editor',
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tiny.cloud/css/codepen.min.css'
        ]
    });
</script>
@endsection