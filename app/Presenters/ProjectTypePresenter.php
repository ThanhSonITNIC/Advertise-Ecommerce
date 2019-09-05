<?php

namespace App\Presenters;

use App\Transformers\ProjectTypeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProjectTypePresenter.
 *
 * @package namespace App\Presenters;
 */
class ProjectTypePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProjectTypeTransformer();
    }
}
