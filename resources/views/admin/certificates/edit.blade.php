@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.certificate.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.certificates.update", [$certificate->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                            <label for="photo">{{ trans('cruds.certificate.fields.photo') }}</label>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <span class="help-block" role="alert">{{ $errors->first('photo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificate.fields.photo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                            <label class="required" for="first_name">{{ trans('cruds.certificate.fields.first_name') }}</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', $certificate->first_name) }}" required>
                            @if($errors->has('first_name'))
                                <span class="help-block" role="alert">{{ $errors->first('first_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificate.fields.first_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('middle_name') ? 'has-error' : '' }}">
                            <label for="middle_name">{{ trans('cruds.certificate.fields.middle_name') }}</label>
                            <input class="form-control" type="text" name="middle_name" id="middle_name" value="{{ old('middle_name', $certificate->middle_name) }}">
                            @if($errors->has('middle_name'))
                                <span class="help-block" role="alert">{{ $errors->first('middle_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificate.fields.middle_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                            <label class="required" for="last_name">{{ trans('cruds.certificate.fields.last_name') }}</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', $certificate->last_name) }}" required>
                            @if($errors->has('last_name'))
                                <span class="help-block" role="alert">{{ $errors->first('last_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificate.fields.last_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.certificate.fields.gender') }}</label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Certificate::GENDER_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('gender', $certificate->gender) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gender'))
                                <span class="help-block" role="alert">{{ $errors->first('gender') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificate.fields.gender_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date_of_birth') ? 'has-error' : '' }}">
                            <label class="required" for="date_of_birth">{{ trans('cruds.certificate.fields.date_of_birth') }}</label>
                            <input class="form-control date" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $certificate->date_of_birth) }}" required>
                            @if($errors->has('date_of_birth'))
                                <span class="help-block" role="alert">{{ $errors->first('date_of_birth') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificate.fields.date_of_birth_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('institution') ? 'has-error' : '' }}">
                            <label class="required" for="institution_id">{{ trans('cruds.certificate.fields.institution') }}</label>
                            <select class="form-control select2" name="institution_id" id="institution_id" required>
                                @foreach($institutions as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('institution_id') ? old('institution_id') : $certificate->institution->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('institution'))
                                <span class="help-block" role="alert">{{ $errors->first('institution') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificate.fields.institution_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('certificate_number') ? 'has-error' : '' }}">
                            <label class="required" for="certificate_number">{{ trans('cruds.certificate.fields.certificate_number') }}</label>
                            <input class="form-control" type="text" name="certificate_number" id="certificate_number" value="{{ old('certificate_number', $certificate->certificate_number) }}" required>
                            @if($errors->has('certificate_number'))
                                <span class="help-block" role="alert">{{ $errors->first('certificate_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificate.fields.certificate_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('student_identification') ? 'has-error' : '' }}">
                            <label class="required" for="student_identification">{{ trans('cruds.certificate.fields.student_identification') }}</label>
                            <input class="form-control" type="text" name="student_identification" id="student_identification" value="{{ old('student_identification', $certificate->student_identification) }}" required>
                            @if($errors->has('student_identification'))
                                <span class="help-block" role="alert">{{ $errors->first('student_identification') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificate.fields.student_identification_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('qualification_type') ? 'has-error' : '' }}">
                            <label class="required" for="qualification_type">{{ trans('cruds.certificate.fields.qualification_type') }}</label>
                            <input class="form-control" type="text" name="qualification_type" id="qualification_type" value="{{ old('qualification_type', $certificate->qualification_type) }}" required>
                            @if($errors->has('qualification_type'))
                                <span class="help-block" role="alert">{{ $errors->first('qualification_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificate.fields.qualification_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('programme') ? 'has-error' : '' }}">
                            <label class="required" for="programme">{{ trans('cruds.certificate.fields.programme') }}</label>
                            <input class="form-control" type="text" name="programme" id="programme" value="{{ old('programme', $certificate->programme) }}" required>
                            @if($errors->has('programme'))
                                <span class="help-block" role="alert">{{ $errors->first('programme') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificate.fields.programme_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('class') ? 'has-error' : '' }}">
                            <label class="required" for="class">{{ trans('cruds.certificate.fields.class') }}</label>
                            <input class="form-control" type="text" name="class" id="class" value="{{ old('class', $certificate->class) }}" required>
                            @if($errors->has('class'))
                                <span class="help-block" role="alert">{{ $errors->first('class') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificate.fields.class_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('year_of_entry') ? 'has-error' : '' }}">
                            <label class="required" for="year_of_entry">{{ trans('cruds.certificate.fields.year_of_entry') }}</label>
                            <input class="form-control date" type="text" name="year_of_entry" id="year_of_entry" value="{{ old('year_of_entry', $certificate->year_of_entry) }}" required>
                            @if($errors->has('year_of_entry'))
                                <span class="help-block" role="alert">{{ $errors->first('year_of_entry') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificate.fields.year_of_entry_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('year_of_completion') ? 'has-error' : '' }}">
                            <label class="required" for="year_of_completion">{{ trans('cruds.certificate.fields.year_of_completion') }}</label>
                            <input class="form-control date" type="text" name="year_of_completion" id="year_of_completion" value="{{ old('year_of_completion', $certificate->year_of_completion) }}" required>
                            @if($errors->has('year_of_completion'))
                                <span class="help-block" role="alert">{{ $errors->first('year_of_completion') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.certificate.fields.year_of_completion_helper') }}</span>
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
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.certificates.storeMedia') }}',
    maxFilesize: 5, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($certificate) && $certificate->photo)
      var file = {!! json_encode($certificate->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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