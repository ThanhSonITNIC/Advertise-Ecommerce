<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ProjectMaterial;

/**
 * Class ProjectMaterialTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProjectMaterialTransformer extends TransformerAbstract
{
    /**
     * Transform the ProjectMaterial entity.
     *
     * @param \App\Entities\ProjectMaterial $model
     *
     * @return array
     */
    public function transform(ProjectMaterial $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
