<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ProjectComment;

/**
 * Class ProjectCommentTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProjectCommentTransformer extends TransformerAbstract
{
    /**
     * Transform the ProjectComment entity.
     *
     * @param \App\Entities\ProjectComment $model
     *
     * @return array
     */
    public function transform(ProjectComment $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
