@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-gray-800 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-white mb-6">Create Blog Post</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-600 text-white rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="title" class="block text-white font-semibold">Title:</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full p-2 mt-1 bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="content" class="block text-white font-semibold">Content:</label>
                <textarea name="content" id="content" class="w-full p-2 mt-1 bg-gray-700 text-white rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('content') }}</textarea>
            </div>

            <div>
                <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Create Post</button>
            </div>
        </form>
    </div>
@endsection
