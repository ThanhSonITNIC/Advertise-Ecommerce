<?php

namespace App\Presenters;

use App\Transformers\ProjectCommentTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProjectCommentPresenter.
 *
 * @package namespace App\Presenters;
 */
class ProjectCommentPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProjectCommentTransformer();
    }
}
