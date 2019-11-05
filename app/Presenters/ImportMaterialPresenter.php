<?php

namespace App\Presenters;

use App\Transformers\ImportMaterialTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ImportMaterialPresenter.
 *
 * @package namespace App\Presenters;
 */
class ImportMaterialPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ImportMaterialTransformer();
    }
}
