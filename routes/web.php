<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Task;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});
//|--------------------------------------------------------------------------


// This is route group that contains all routes related with authentication
//|--------------------------------------------------------------------------

Route::get('/tasks', function ()  {
    return view('index', [
        'tasks' => Task::latest()->paginate(10) //Getting tasks from DB in descending order, paginating
    ]);
})->name('tasks.index');


//|--------------------------------------------------------------------------

Route::view('/tasks/create', 'create')->name('tasks.create');
//|--------------------------------------------------------------------------



// edit page*
//|--------------------------------------------------------------------------
Route::get('/tasks/{task}/edit', function (Task $task)  {

    return view('edit', [
        'task' => $task
    ]);

})->name('tasks.edit');
// end the route of edit page
//|--------------------------------------------------------------------------


// show page*
//|--------------------------------------------------------------------------
Route::get('/tasks/{task}', function (Task $task)  {

    return view('show', [
        'task' => $task
    ]);

})->name('tasks.show');
// end the route of show page

//|--------------------------------------------------------------------------


// form route of create page*
//|--------------------------------------------------------------------------
Route::post('/tasks', function (TaskRequest $request) {
    // $data = $request ->validated();

    $task = Task::create($request->validated());
    // Redirects user on previous page after successful adding task
    return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('success','New task has been created!');
})->name('tasks.store'); // this is the end point  for our form, it will be used to send data from our form to store method in tasks controller
// end the route of create page and go to show page with success message

// form route of edit page*
//|--------------------------------------------------------------------------
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    // $data = $request ->validated();
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();
    $task->update($request->validated());
    // Redirects user on previous page after successful updating task
    return redirect()->route('tasks.show', ['task' => $task->id])
    ->with('success','task has been updated successfully!');
})->name('tasks.update'); // this is the end point for our form, it will be used to send data from our form to update or edit method in tasks controller
// end the route of create page and go to show page with success message


// delete Route
Route::delete('/task/{task}', function (Task $task) {
    $task->delete();
    return redirect()
        ->route('tasks.index')
        ->withSuccess("The task '$task->title' was deleted");
})->name('tasks.destroy');


// toggle completed tasks states
Route::put('tasks/{task}/toggle-complete', function (Task $task) {
    $task->toggleCompleted();

    return redirect()->back()->with('success','Task has been updated successfully!');
})->name('tasks.toggle-complete');




Route::fallback(function () {
    return 'Still got somewhere!';
});
