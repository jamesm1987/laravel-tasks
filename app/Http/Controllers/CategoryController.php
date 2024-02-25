<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryDeleteRequest;
use App\Repositories\CategoryRepository;


use App\Models\Category;

class CategoryController extends Controller
{

    /**
     * The category repository instance.
     * 
     * @var CategoryRepository
     */
    
    protected $categories;

    /**
     * Create a new controller instance.
     * 
     * @param CategoryRepository $categories
     * @return void
     */


    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Display a list of all of the user's categories.
     *
     * @param Request $request
     * @return Response
     */

    public function index()
    {

        return view ('categories.index', [
            'categories' => $this->categories->forUser(auth()->user())
        ]);
    }

    /**
     * Create a new task.
     *
     * @param CategoryCreateRequest $request
     * @return Response
     */

    public function store(CategoryCreateRequest $request)
    {
        $task = $request->user()->categories()->create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories');
    }

    /**
     * Destroy the given category.
     *
     * @param CategoryDeleteRequest $request
     * @param Category $category
     * @return Response
     */

    public function destroy(CategoryDeleteRequest $request, Category $caegory)
    {
       
        $category->delete();

        return redirect()->route('categories');
    }

}
