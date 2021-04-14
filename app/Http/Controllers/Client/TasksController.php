<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('clients.index', ['values' => Task::paginate(3)]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('clients.add');
    }

    /**
     * @param TaskRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        Task::create($data);
        return redirect()->route('main_page');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function sortTable(Request $request)
    {
        $values = Task::orderBy($request->sort, $request->sortMethod)->paginate(3);
        $method = $request->sortMethod == 'desc' ? 'asc' : 'desc';
        $html = view('clients.sort', ['values' => $values, 'method' => $method])->render();
        return response()->json(['response' => $html],200);
    }
}
