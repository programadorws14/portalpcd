@csrf
@if(!empty($edit))
<input type="hidden" value="{{ $edit->id ?? null }}" name="id">
@endif

<div class="col-md-12">
    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <div class="input-group-text">Titulo</div>
        </div>
        <input type="text" class="form-control" value="@if(!empty($edit)) {{ $edit->titulo }} @else {{ old('titulo') }} @endif" name="titulo">
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