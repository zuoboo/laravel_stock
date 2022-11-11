<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tasks = Task::where('status', false)->get();
        return view('tasks.index', compact('tasks',));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'name' => ['required'],
        ]);

        Task::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
        ]);


        return redirect()->route('tasks.index')->with('message', 'TODO追加!頑張ろう!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->status);
        // 更新
        if ($request->status == null) {
            $this->validate($request, [
                'name' => ['required']
            ]);
            $task = Task::findOrFail($id);
            $task->name = $request->name;
            $task->save();

        } else { // 完了
            $task = Task::findOrFail($id);
            $task->status = true;
            $task->save();
        }
        return redirect()->route('tasks.index')->with('message', '更新OK');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function finishedTaskIndex()
    {
        $finished_tasks = Task::where('status', true)->get();
        return view('finished-tasks', compact('finished_tasks'));

    }
}
