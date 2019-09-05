<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ProjectType;

/**
 * Class ProjectTypeTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProjectTypeTransformer extends TransformerAbstract
{
    /**
     * Transform the ProjectType entity.
     *
     * @param \App\Entities\ProjectType $model
     *
     * @return array
     */
    public function transform(ProjectType $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
