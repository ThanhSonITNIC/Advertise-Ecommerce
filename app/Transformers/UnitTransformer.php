<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Unit;

/**
 * Class UnitTransformer.
 *
 * @package namespace App\Transformers;
 */
class UnitTransformer extends TransformerAbstract
{
    /**
     * Transform the Unit entity.
     *
     * @param \App\Entities\Unit $model
     *
     * @return array
     */
    public function transform(Unit $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
