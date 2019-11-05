<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\ImportMaterialLog;

/**
 * Class ImportMaterialLogTransformer.
 *
 * @package namespace App\Transformers;
 */
class ImportMaterialLogTransformer extends TransformerAbstract
{
    /**
     * Transform the ImportMaterialLog entity.
     *
     * @param \App\Entities\ImportMaterialLog $model
     *
     * @return array
     */
    public function transform(ImportMaterialLog $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
