@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')


@section('content')

<form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
    @csrf
    @isset($task)
        @method('PUT')
    @endisset
    <div class="mb-4">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title"
        @class (['border-red-500' => $errors->has( 'title')])
        value="{{ $task->title ?? old( 'title' ) }}" />
        @error('title')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="description">Description:</label>
        <textarea
        @class (['border-red-500' => $errors->has('description')])
        type="text" id="description" name="description" rows="5">{{ $task->description ?? old('description') }}</textarea>
        @error('description')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-4">
        <label for="long_description">Long Description:</label>
        <textarea
        @class (['border-red-500' => $errors->has('long_description')])
        type="text" id="long_description" name="long_description" rows="5">{{ $task->long_description ??  old( 'long_description' ) }}</textarea>
        @error('long_description')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex items-center gap-2">
        <button class="btn" type="submit">@isset($task)
            Update
        @else
            Add Task
        @endisset
        </button>
        <button type="button" onclick="window.history.back()" class="link">Cancel</button>

    </div>
</form>
@endsection

