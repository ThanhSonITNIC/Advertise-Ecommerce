<?php

namespace App\Presenters;

use App\Transformers\ProjectContentTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProjectContentPresenter.
 *
 * @package namespace App\Presenters;
 */
class ProjectContentPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProjectContentTransformer();
    }
}
