@extends('layouts.admin')
@section('content')

<div class="page-content">
    <div class="container-fluid">
        @include("partials.alert")
        <div class="card">
            <div class="card-body">
                <form id="add_entity" action="{{ route('admin.forms.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputname4">Donnor Name</label>
                            <input type="text" class="form-control" id="inputname4" placeholder="Donnor Name" name="donnor_name" value="{{old('donnor_name')}}" required>
                            @if ($errors->has('donnor_name'))
                            <div class="error">
                                {{ $errors->first('donnor_name') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputbenefactor_name4">Benefactor Name</label>
                            <input type="text" class="form-control" id="inputbenefactor_name4" placeholder="Benefactor Name" name="benefactor_name" value="{{old('benefactor_name')}}" required>
                            @if ($errors->has('benefactor_name'))
                            <div class="error">
                                {{ $errors->first('benefactor_name') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <textarea class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" required>{{old('address')}}</textarea>
                        @if ($errors->has('address'))
                        <div class="error">
                            {{ $errors->first('address') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2 mr-5">
                            <label for="inputZip">Amount ($)</label>
                            <input type="number" class="form-control" id="inputZip" name="amount" value="{{old('amount')}}" required>
                            @if ($errors->has('amount'))
                            <div class="error">
                                {{ $errors->first('amount') }}
                            </div>
                            @endif
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputMo">Contact (Ex : 9999999999)</label>
                            <input type="tel" class="form-control" id="inputMo" name="contact" value="{{old('contact')}}" pattern="[0-9]{10}" required>
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

            <div class="card">
                <div class="card-header">
                    Forms List
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Donnor Name</th>
                                    <th>Benefactor Name</th>
                                    <th>Address</th>
                                    <th>Contact</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($forms as $key => $offer)
                                <tr data-entry-id="{{ $offer->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $offer->donnor_name ?? "" }}</td>
                                    <td>{{ $offer->benefactor_name ?? "" }}</td>
                                    <td>{{ $offer->address ?? ""}}</td>
                                    <td>{{ $offer->contact ?? "" }}</td>
                                    <td>
                                        ${{ $offer->amount ?? ''}}
                                    </td>
                                    <td>@include('partials.actions', ['id' => $offer->id])</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5" style="text-align:right">Total:</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection