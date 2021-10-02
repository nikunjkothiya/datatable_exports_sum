@extends('layouts.admin')
@section('content')
<div class="page-content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 mb-3 text-right">
            <a class="btn btn-primary" href="{{ route('admin.forms.index') }}">
                Back to list
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
       Show Form
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                           Id
                        </th>
                        <td>
                            {{ $form->id }}
                        </td>
                    </tr>
                    
                    <tr>
                        <th>
                        Title
                        </th>
                        <td>
                            {{ $form->title ?? ''}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Description
                        </th>
                        <td>
                            {{ $form->description ?? ''}}
                        </td>
                    </tr>
                </tbody>
            </table>
            
        </div>


    </div>
</div>
</div>
</div>
@endsection