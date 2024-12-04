@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.contentPage.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.content-pages.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label class="required" for="title">{{ trans('cruds.contentPage.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                            @if($errors->has('title'))
                                <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentPage.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('categories') ? 'has-error' : '' }}">
                            <label for="categories">{{ trans('cruds.contentPage.fields.category') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="categories[]" id="categories" multiple>
                                @foreach($categories as $id => $category)
                                    <option value="{{ $id }}" {{ in_array($id, old('categories', [])) ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('categories'))
                                <span class="help-block" role="alert">{{ $errors->first('categories') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentPage.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                            <label for="tags">{{ trans('cruds.contentPage.fields.tag') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="tags[]" id="tags" multiple>
                                @foreach($tags as $id => $tag)
                                    <option value="{{ $id }}" {{ in_array($id, old('tags', [])) ? 'selected' : '' }}>{{ $tag }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('tags'))
                                <span class="help-block" role="alert">{{ $errors->first('tags') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentPage.fields.tag_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('page_text') ? 'has-error' : '' }}">
                            <label for="page_text">{{ trans('cruds.contentPage.fields.page_text') }}</label>
                            <textarea class="form-control ckeditor" name="page_text" id="page_text">{!! old('page_text') !!}</textarea>
                            @if($errors->has('page_text'))
                                <span class="help-block" role="alert">{{ $errors->first('page_text') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentPage.fields.page_text_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('excerpt') ? 'has-error' : '' }}">
                            <label for="excerpt">{{ trans('cruds.contentPage.fields.excerpt') }}</label>
                            <textarea class="form-control" name="excerpt" id="excerpt">{{ old('excerpt') }}</textarea>
                            @if($errors->has('excerpt'))
                                <span class="help-block" role="alert">{{ $errors->first('excerpt') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentPage.fields.excerpt_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('featured_image') ? 'has-error' : '' }}">
                            <label for="featured_image">{{ trans('cruds.contentPage.fields.featured_image') }}</label>
                            <div class="needsclick dropzone" id="featured_image-dropzone">
                            </div>
                            @if($errors->has('featured_image'))
                                <span class="help-block" role="alert">{{ $errors->first('featured_image') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.contentPage.fields.featured_image_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.content-pages.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $contentPage->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.featuredImageDropzone = {
        url: '{{ route('admin.content-pages.storeMedia') }}',
        maxFilesize: 2, // Maximum file size in MB
        acceptedFiles: '.jpeg,.jpg,.png,.gif', // Accepted file types
        maxFiles: 1, // Only allow one file
        addRemoveLinks: true, // Enable remove link
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}" // CSRF protection
        },
        params: {
            size: 2, // Max file size parameter for validation
            width: 4096, // Max width for image validation
            height: 4096 // Max height for image validation
        },
        success: function (file, response) {
            // Remove any existing hidden input for featured_image
            $('form').find('input[name="featured_image"]').remove();

            // Add hidden input with the uploaded file name
            $('form').append('<input type="hidden" name="featured_image" value="' + response.name + '">');
        },
        removedfile: function (file) {
            // Remove file preview from Dropzone
            file.previewElement.remove();

            // Remove associated hidden input if file is successfully removed
            if (file.status !== 'error') {
                $('form').find('input[name="featured_image"]').remove();

                // Reset max files limit
                this.options.maxFiles = this.options.maxFiles + 1;
            }
        },
        init: function () {
            // Check if an existing featured image is being edited
            @if(isset($contentPage) && $contentPage->featured_image)
                var file = {!! json_encode($contentPage->featured_image) !!};

                // Simulate the added file in Dropzone
                this.options.addedfile.call(this, file);

                // Set thumbnail for the existing image
                this.options.thumbnail.call(this, file, file.preview ?? file.preview_url);

                // Mark the file as complete
                file.previewElement.classList.add('dz-complete');

                // Append hidden input with the existing file name
                $('form').append('<input type="hidden" name="featured_image" value="' + file.file_name + '">');

                // Reduce max files count since an image is already present
                this.options.maxFiles = this.options.maxFiles - 1;
            @endif
        },
        error: function (file, response) {
            var message;
            if ($.type(response) === 'string') {
                // Use Dropzone's default error messages if response is a string
                message = response;
            } else {
                // Use the custom error message if response contains errors
                message = response.errors.file;
            }

            // Add error message to the file preview
            file.previewElement.classList.add('dz-error');
            var errorNodes = file.previewElement.querySelectorAll('[data-dz-errormessage]');
            for (var node of errorNodes) {
                node.textContent = message;
            }
        }
    };
</script>

@endsection