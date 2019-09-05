<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Configure;

/**
 * Class ConfigureTransformer.
 *
 * @package namespace App\Transformers;
 */
class ConfigureTransformer extends TransformerAbstract
{
    /**
     * Transform the Configure entity.
     *
     * @param \App\Entities\Configure $model
     *
     * @return array
     */
    public function transform(Configure $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
