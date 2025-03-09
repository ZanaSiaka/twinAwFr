@extends('admin')

@section('content')
    <div >
        <h3>Edit Award</h3>
        <a href="{{ route('admin.award.index') }}" class="btn btn-success my-1">
                Home
        </a>
        @include('awards/awardForm', ['award' => $award])
    </div>
@endsection