<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
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
    public function transform(User $model)
    {
        return [
            //
            'id'=>$model->id,
            'name'=>$model->name,
            'email'=>$model->email,
            'email_verified_at'=>$model->email_verified_at,           
            'created_at'=>$model->created_at,
            'updated_at'=>$model->updated_at,
        ];
    }
}
