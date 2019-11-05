<?php

namespace App\Presenters;

use App\Transformers\ImportMaterialLogTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ImportMaterialLogPresenter.
 *
 * @package namespace App\Presenters;
 */
class ImportMaterialLogPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ImportMaterialLogTransformer();
    }
}
