@extends('admin')

@section('content')
    <div >
        <h3>Edit Role</h3>
        <a href="{{ route('admin.nomine.index') }}" class="btn btn-success my-1">
                Home
        </a>
        @include('nomines/nomineForm', ['nomine' => $nomine])
    </div>
@endsection
