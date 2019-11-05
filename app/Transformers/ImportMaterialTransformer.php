<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ImportMaterial;

/**
 * Class ImportMaterialTransformer.
 *
 * @package namespace App\Transformers;
 */
class ImportMaterialTransformer extends TransformerAbstract
{
    /**
     * Transform the ImportMaterial entity.
     *
     * @param \App\Entities\ImportMaterial $model
     *
     * @return array
     */
    public function transform(ImportMaterial $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
