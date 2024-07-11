@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.finance.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.finances.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('institutions') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.finance.fields.institutions') }}</label>
                            <select class="form-control" name="institutions" id="institutions" required>
                                <option value disabled {{ old('institutions', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Finance::INSTITUTIONS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('institutions', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('institutions'))
                                <span class="help-block" role="alert">{{ $errors->first('institutions') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finance.fields.institutions_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                            <label class="required" for="amount">{{ trans('cruds.finance.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                            @if($errors->has('amount'))
                                <span class="help-block" role="alert">{{ $errors->first('amount') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finance.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('payment_date') ? 'has-error' : '' }}">
                            <label for="payment_date">{{ trans('cruds.finance.fields.payment_date') }}</label>
                            <input class="form-control date" type="text" name="payment_date" id="payment_date" value="{{ old('payment_date') }}">
                            @if($errors->has('payment_date'))
                                <span class="help-block" role="alert">{{ $errors->first('payment_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finance.fields.payment_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label class="required" for="status">{{ trans('cruds.finance.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', 'Paid') }}" required>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.finance.fields.status_helper') }}</span>
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