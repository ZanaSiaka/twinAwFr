@extends('admin')

@section('content')
    <div >
        <h3>Edit Role</h3>
        <a href="{{ route('admin.chat.index') }}" class="btn btn-success my-1">
                Home
        </a>
        @include('chats/chatForm', ['chat' => $chat])
    </div>
@endsection
