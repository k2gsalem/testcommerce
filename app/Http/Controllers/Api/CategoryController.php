<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Transformers\CategoryTransformer;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $paginator = $this->model->paginate($request->get('limit', config('app.pagination_limit')));
        if ($request->has('limit')) {
            $paginator->appends('limit', $request->get('limit'));
        }
        return fractal($paginator, new CategoryTransformer())->respond(200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'title' => ['required', 'string', 'max:200'],
            'category_desc' => ['required', 'string', 'max:200']
        ];

        $this->model->create($request->all());
        $category = $this->validate($request, $rules);
        return fractal($category, new CategoryTransformer())->respond(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
        return fractal($category, new CategoryTransformer())->respond(200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $rules = [
            'title' => ['required', 'string', 'max:200'],
            'category_desc' => ['required', 'string', 'max:500']
        ];
        $this->validate($request, $rules);
        $category->update($request->all());

        return fractal($category->fresh(), new CategoryTransformer())->respond(201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return response()->json(null, 204);
    }
}
