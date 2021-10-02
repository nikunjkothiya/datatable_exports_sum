@extends('layouts.admin')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        @include("partials.alert")
        <div class="card">
            <div class="card-header">
                Edit Form
            </div>

            <div class="card-body">
                <form id="update_offer" action="{{ route('admin.forms.update', [$form->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputname4">Donnor Name</label>
                            <input type="text" class="form-control" id="inputname4" placeholder="Donnor Name" name="donnor_name" value="{{old('donnor_name', isset($form) ? $form->donnor_name : '')}}" required>
                            @if ($errors->has('donnor_name'))
                            <div class="error">
                                {{ $errors->first('donnor_name') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputbenefactor_name4">Benefactor Name</label>
                            <input type="text" class="form-control" id="inputbenefactor_name4" placeholder="Benefactor Name" name="benefactor_name" value="{{old('benefactor_name', isset($form) ? $form->benefactor_name : '')}}" required>
                            @if ($errors->has('benefactor_name'))
                            <div class="error">
                                {{ $errors->first('benefactor_name') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <textarea class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" required>{{ old('address', isset($form) ? $form->address : '') }}</textarea>
                        @if ($errors->has('address'))
                        <div class="error">
                            {{ $errors->first('address') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2 mr-5">
                            <label for="inputZip">Amount ($)</label>
                            <input type="number" class="form-control" id="inputZip" name="amount" value="{{old('amount', isset($form) ? $form->amount : '')}}" required>
                            @if ($errors->has('amount'))
                            <div class="error">
                                {{ $errors->first('amount') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputMo">Contact   (Ex : 9999999999)</label>
                            <input type="tel" class="form-control" id="inputMo" name="contact" value="{{old('contact', isset($form) ? $form->contact : '')}}" pattern="[0-9]{10}" required>
                            @if ($errors->has('contact'))
                            <div class="error">
                                {{ $errors->first('contact') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection