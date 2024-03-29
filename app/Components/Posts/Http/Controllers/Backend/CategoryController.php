<?php namespace App\Components\Posts\Http\Controllers\Backend;

use App\Components\Posts\Http\Requests\CategoryFormRequest;
use App\Components\Posts\Repositories\CategoryRepository;
use App\Http\Controllers\Controller;
use App\Libraries\MediaManager;

class CategoryController extends Controller
{

    /**
     * The category category
     * @var categoryRepository
     */
    protected $category;
    protected $post_type;

    /**
     * Display a listing of the resource.
     *
     * @param categoryRepository $category
     * @param TimeLineRepository $timeline
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        parent::__construct();
        $this->category = $categoryRepository;

        if (\Request::is('backend/post*')) {
            $this->post_type = 'post';
        } else {
            $this->post_type = 'page';
        }
        view()->share('post_type', $this->post_type);
    }

    public function index()
    {
        $title = "List Categories";
        $categories = $this->category->all();
        return view('Posts::' . $this->link_type . '.' . $this->current_theme . '.categories.index', compact('title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = "Create New Category";
        return view('Posts::' . $this->link_type . '.' . $this->current_theme . '.categories.create_edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CategoryFormRequest $request)
    {
        $attr = $request->all();
        $this->category->create($attr);
        return redirect(route('backend.'.$this->post_type.'-categories.index'))->with('success_message', 'The category has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $title = "Edit Category";
        $category = $this->category->find($id);
        return view('Posts::' . $this->link_type . '.' . $this->current_theme . '.categories.create_edit', compact('title', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, categoryFormRequest $request, MediaManager $media)
    {
        $attr = $request->all();
        $category = $this->category->find($id);
        $this->category->update($category, $attr);
        return redirect()->back()->with('success_message', 'The category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->category->find($id);
        $category->delete();
        return redirect()->back()->with('success_message', 'The category has been deleted');
    }
}