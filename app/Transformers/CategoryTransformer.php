<?php

namespace App\Transformers;

use App\Models\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Category $model)
    {
        return [
            //
            'id'=>$model->id,
            'category_short_code'=>$model->category_short_code,
            'category_desc'=>$model->category_desc,
            'title'=>$model->title,
            'created_at'=>$model->created_at,
            'updated_at'=>$model->updated_at,
        ];
    }
}