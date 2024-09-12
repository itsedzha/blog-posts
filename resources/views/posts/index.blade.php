@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-gray-800 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-white mb-6">All Blog Posts</h1>
        <a href="{{ route('posts.create') }}" class="inline-block mb-4 py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">Create New Post</a>

        @if ($message = Session::get('success'))
            <div class="mb-4 p-4 bg-green-600 text-white rounded-lg">
                {{ $message }}
            </div>
        @endif

        <ul class="space-y-4">
            @foreach ($posts as $post)
                <li class="p-4 bg-gray-700 rounded-lg flex justify-between items-center">
                    <div>
                        <a href="{{ route('posts.show', $post->id) }}" class="text-xl font-semibold text-white hover:underline">{{ $post->title }}</a>
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('posts.edit', $post->id) }}" class="py-1 px-3 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="py-1 px-3 bg-red-600 text-white rounded-lg hover:bg-red-700">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
