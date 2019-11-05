<?php

namespace App\Presenters;

use App\Transformers\ProjectMaterialTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProjectMaterialPresenter.
 *
 * @package namespace App\Presenters;
 */
class ProjectMaterialPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProjectMaterialTransformer();
    }
}
