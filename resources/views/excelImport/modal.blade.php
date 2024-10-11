<!-- resources/views/excelImportModal.blade.php -->

<div class="modal fade" id="excelImportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Import Excel</h4>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class='col-md-12'>
                        <!-- Update form to point to the correct route for Institution Excel Import -->
                        <form class="form-horizontal" method="POST" action="{{ route('admin.institutions.parseExcelImport') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <!-- Excel File Input -->
                            <div class="form-group{{ $errors->has('excel_file') ? ' has-error' : '' }}">
                                <label for="excel_file" class="col-md-4 control-label">Import</label>

                                <div class="col-md-6">
                                    <input id="excel_file" type="file" class="form-control" name="excel_file" required accept=".xlsx, .xls">

                                    @if($errors->has('excel_file'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('excel_file') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Checkbox for Header Row -->
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="header" checked> @lang('global.app_file_contains_header_row')
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Import
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

