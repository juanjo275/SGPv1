@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.documentoComercial.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.documento-comercials.update", [$documentoComercial->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="monto">{{ trans('cruds.documentoComercial.fields.monto') }}</label>
                <input class="form-control {{ $errors->has('monto') ? 'is-invalid' : '' }}" type="number" name="monto" id="monto" value="{{ old('monto', $documentoComercial->monto) }}" step="0.01">
                @if($errors->has('monto'))
                    <div class="invalid-feedback">
                        {{ $errors->first('monto') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.documentoComercial.fields.monto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fecha">{{ trans('cruds.documentoComercial.fields.fecha') }}</label>
                <input class="form-control date {{ $errors->has('fecha') ? 'is-invalid' : '' }}" type="text" name="fecha" id="fecha" value="{{ old('fecha', $documentoComercial->fecha) }}">
                @if($errors->has('fecha'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.documentoComercial.fields.fecha_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="adjunto">{{ trans('cruds.documentoComercial.fields.adjunto') }}</label>
                <div class="needsclick dropzone {{ $errors->has('adjunto') ? 'is-invalid' : '' }}" id="adjunto-dropzone">
                </div>
                @if($errors->has('adjunto'))
                    <div class="invalid-feedback">
                        {{ $errors->first('adjunto') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.documentoComercial.fields.adjunto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tipo_documento_comercial_id">{{ trans('cruds.documentoComercial.fields.tipo_documento_comercial') }}</label>
                <select class="form-control select2 {{ $errors->has('tipo_documento_comercial') ? 'is-invalid' : '' }}" name="tipo_documento_comercial_id" id="tipo_documento_comercial_id">
                    @foreach($tipo_documento_comercials as $id => $tipo_documento_comercial)
                        <option value="{{ $id }}" {{ (old('tipo_documento_comercial_id') ? old('tipo_documento_comercial_id') : $documentoComercial->tipo_documento_comercial->id ?? '') == $id ? 'selected' : '' }}>{{ $tipo_documento_comercial }}</option>
                    @endforeach
                </select>
                @if($errors->has('tipo_documento_comercial'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tipo_documento_comercial') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.documentoComercial.fields.tipo_documento_comercial_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="estado_documento_comercials">{{ trans('cruds.documentoComercial.fields.estado_documento_comercial') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('estado_documento_comercials') ? 'is-invalid' : '' }}" name="estado_documento_comercials[]" id="estado_documento_comercials" multiple>
                    @foreach($estado_documento_comercials as $id => $estado_documento_comercial)
                        <option value="{{ $id }}" {{ (in_array($id, old('estado_documento_comercials', [])) || $documentoComercial->estado_documento_comercials->contains($id)) ? 'selected' : '' }}>{{ $estado_documento_comercial }}</option>
                    @endforeach
                </select>
                @if($errors->has('estado_documento_comercials'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estado_documento_comercials') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.documentoComercial.fields.estado_documento_comercial_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.adjuntoDropzone = {
    url: '{{ route('admin.documento-comercials.storeMedia') }}',
    maxFilesize: 2, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').find('input[name="adjunto"]').remove()
      $('form').append('<input type="hidden" name="adjunto" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="adjunto"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($documentoComercial) && $documentoComercial->adjunto)
      var file = {!! json_encode($documentoComercial->adjunto) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="adjunto" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection