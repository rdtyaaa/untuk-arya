@extends('layouts.app')

@section('content')
    <div class="bg-base-200 container -my-10 mx-auto mt-10 p-8">
        <a href="{{ route('regist.create') }}">
            <button>Daftar</button>
        </a>
    </div>

    <script src="https://cdn.tailwindcss.com"></script>
@endsection
