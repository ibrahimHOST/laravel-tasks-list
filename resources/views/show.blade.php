@extends('layouts.app')

@section('title', $task->title)


@section( 'content' )
        <div class="mb-4">
        <a class="link" href="{{ route('tasks.index') }}" class="btn btn-primary"><span class="text-lg">&larr;</span> Go Back To Task Lists!</a>
        </div>
        <div class="mb-4">
            <p class="mb-4 text-slate-700">{{$task->description}}</p>
            @if ($task->long_description)
                <p class="mb-4 text-slate-700">{{$task->long_description}}
            @endif
                <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} &bull; Updated {{ $task->updated_at->diffForHumans() }}</p>
        </div>
        <div>
            <p class="mb-4">
                @if ($task->completed)
                <span class="font-medium text-green-500">Completed</span>
                @else
                <span class="font-medium text-red-500">Incompleted</span>
                @endif
            </p>
        </div>
        <div class="flex gap-2">
                <a class="btn" href="/tasks/{{$task->id}}/edit" class="btn btn-primary">Edit</a>
            <form action="{{ route('tasks.toggle-complete', ['task' => $task->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <button class="btn" type="submit">
                Mark as {{ $task->completed ? 'Incomplete' : 'Completed' }}
                </button>
                </form>
            <form action="{{route('tasks.destroy',['task' => $task->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn" type="submit">Delete</button>
            </form>
        </div>
@endsection
