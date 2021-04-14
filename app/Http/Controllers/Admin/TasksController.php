<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TaskRequest;
use App\Models\Task;
use http\Env\Request;

class TasksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.index', ['values' => Task::paginate(5)]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('admin.edit', ['value' => Task::find($id)]);
    }

    /**
     * @param TaskRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TaskRequest $request, $id)
    {
        $data = $request->validated();
        if(!isset($data['status'])) {
            $data['status'] = false;
        }
        $task = Task::find($id);
        $task->update($data);
        return redirect()->route('admin.tasks.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('admin.tasks.index');
    }
}
