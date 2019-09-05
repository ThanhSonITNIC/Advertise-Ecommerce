<?php

namespace App\Presenters;

use App\Transformers\ConfigureTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ConfigurePresenter.
 *
 * @package namespace App\Presenters;
 */
class ConfigurePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ConfigureTransformer();
    }
}
