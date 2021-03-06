@extends('app')

@section('htmlheader_title')
    Roles
@endsection

@section('main-content')

    <h1>Role</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Slug</th><th>Description</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $role->id }}</td> <td> {{ $role->name }} </td><td> {{ $role->slug }} </td><td> {{ $role->description }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection