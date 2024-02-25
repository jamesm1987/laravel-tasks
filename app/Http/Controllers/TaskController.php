<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Task\TaskCreateRequest;
use App\Http\Requests\Task\TaskDeleteRequest;
use App\Repositories\TaskRepository;
use App\Repositories\CategoryRepository;


use App\Models\Task;

class TaskController extends Controller
{

    /**
     * The task repository instance.
     * 
     * @var TaskRepository
     */
    
    protected $tasks;

    /**
     * The category repository instance.
     * 
     * @var CategoryRepository
     */
    
     protected $categories;    

    /**
     * Create a new controller instance.
     * 
     * @param TaskRepository $tasks
     * @param CategoryRepository $categories
     * @return void
     */


    public function __construct(TaskRepository $tasks, CategoryRepository $categories)
    {
        $this->tasks = $tasks;
        $this->categories = $categories;
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param Request $request
     * @return Response
     */

    public function index()
    {

        return view ('tasks.index', [
            'tasks' => $this->tasks->forUser(auth()->user()),
            'categories' => $this->categories->forUser(auth()->user())
        ]);
    }

    /**
     * Create a new task.
     *
     * @param TaskCreateRequest $request
     * @return Response
     */

    public function store(TaskCreateRequest $request)
    {
        $task = $request->user()->tasks()->create([
            'name' => $request->name,
            'task_category_id' => $request->category_id,
        ]);

        return redirect()->route('tasks');
    }

    /**
     * Destroy the given task.
     *
     * @param TaskDeleteRequest $request
     * @param Task $task
     * @return Response
     */

    public function destroy(TaskDeleteRequest $request, Task $task)
    {
       
        $task->delete();

        return redirect()->route('tasks');
    }

}
