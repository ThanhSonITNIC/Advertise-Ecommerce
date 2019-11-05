<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ProjectContent;

/**
 * Class ProjectContentTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProjectContentTransformer extends TransformerAbstract
{
    /**
     * Transform the ProjectContent entity.
     *
     * @param \App\Entities\ProjectContent $model
     *
     * @return array
     */
    public function transform(ProjectContent $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
