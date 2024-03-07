@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.paper.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.papers.update", [$paper->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.paper.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $paper->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paper.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.paper.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description', $paper->description) }}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paper.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('papers') ? 'has-error' : '' }}">
                            <label class="required" for="papers">{{ trans('cruds.paper.fields.papers') }}</label>
                            <div class="needsclick dropzone" id="papers-dropzone">
                            </div>
                            @if($errors->has('papers'))
                                <span class="help-block" role="alert">{{ $errors->first('papers') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paper.fields.papers_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('paper_title') ? 'has-error' : '' }}">
                            <label for="paper_title_id">{{ trans('cruds.paper.fields.paper_title') }}</label>
                            <select class="form-control select2" name="paper_title_id" id="paper_title_id">
                                @foreach($paper_titles as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('paper_title_id') ? old('paper_title_id') : $paper->paper_title->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('paper_title'))
                                <span class="help-block" role="alert">{{ $errors->first('paper_title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paper.fields.paper_title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('file_upload') ? 'has-error' : '' }}">
                            <label class="required" for="file_upload">{{ trans('cruds.paper.fields.file_upload') }}</label>
                            <div class="needsclick dropzone" id="file_upload-dropzone">
                            </div>
                            @if($errors->has('file_upload'))
                                <span class="help-block" role="alert">{{ $errors->first('file_upload') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.paper.fields.file_upload_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.papersDropzone = {
    url: '{{ route('admin.papers.storeMedia') }}',
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
      $('form').find('input[name="papers"]').remove()
      $('form').append('<input type="hidden" name="papers" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="papers"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($paper) && $paper->papers)
      var file = {!! json_encode($paper->papers) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="papers" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.fileUploadDropzone = {
    url: '{{ route('admin.papers.storeMedia') }}',
    maxFilesize: 10, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').find('input[name="file_upload"]').remove()
      $('form').append('<input type="hidden" name="file_upload" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="file_upload"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($paper) && $paper->file_upload)
      var file = {!! json_encode($paper->file_upload) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="file_upload" value="' + file.file_name + '">')
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