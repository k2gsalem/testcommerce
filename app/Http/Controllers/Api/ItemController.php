<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Transformers\ItemTransformer;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ItemController extends Controller
{
    protected $model;

    public function __construct(Item $model)
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
        return fractal($paginator, new ItemTransformer())->respond(200);
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
            'category_id'=>['required','integer','exists:categories,id'],
            'title'=>['required','string', 'max:200'],
            'item_desc'=>['required','string', 'max:500'],
            'price'=>['required','regex:/^\d*(\.\d{1,2})?$/']           
        ];
        $this->validate($request, $rules);
        $item =$this->model->create($request->all());  
        if ($request->hasFile('item_image') && $request->file('item_image')->isValid()) {
            // $file = $request->file('avatar');
            $item->clearMediaCollection('item_image');
            $item->addMediaFromRequest('item_image')->toMediaCollection('item_image');
            // $user->addMedia($file)->toMediaCollection('avatar');
        }      
        return fractal($item, new ItemTransformer())->respond(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
        return fractal($item, new ItemTransformer())->respond(200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
        $rules = [            
            'category_id'=>['required','integer','exists:categories,id'],
            'title'=>['required','string', 'max:200'],
            'item_desc'=>['required','string', 'max:500'],
            'price'=>['required','regex:/^\d*(\.\d{1,2})?$/']           
        ];
        $this->validate($request, $rules);
        $item->update($request->all());       
        return fractal($item->fresh(), new ItemTransformer())->respond(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
        $item->delete();
        return response()->json(null, 204);
    }
    public function itemFilter(Request $request)
    {

        $paginator = QueryBuilder::for(Item::class)
            ->allowedFilters(['title', AllowedFilter::exact('category_id'), AllowedFilter::scope('price_between')])
            ->allowedIncludes(['category'])
            ->paginate($request->get('limit', config('app.pagination_limit')));
           
            return fractal($paginator, new ItemTransformer());
    }
}
