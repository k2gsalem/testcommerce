<?php

namespace App\Transformers;

use App\Models\Item;
use League\Fractal\TransformerAbstract;

class ItemTransformer extends TransformerAbstract
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
    public function transform(Item $model)
    {
        return [
            //
            'id'=>$model->id,
            'category_id'=>$model->category_id,
            'title'=>$model->title,
            'item_desc'=>$model->item_desc,
            'price'=>$model->price,
            'item_image' => $model->getFirstMediaUrl('item_image') ?: $model->defaultPhotoUrl(),
            'created_at'=>$model->created_at,
            'updated_at'=>$model->updated_at,
        ];
    }
}
