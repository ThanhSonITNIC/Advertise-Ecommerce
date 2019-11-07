<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\UserStatus;

/**
 * Class UserStatusTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserStatusTransformer extends TransformerAbstract
{
    /**
     * Transform the UserStatus entity.
     *
     * @param \App\Entities\UserStatus $model
     *
     * @return array
     */
    public function transform(UserStatus $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
