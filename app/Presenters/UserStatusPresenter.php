<?php

namespace App\Presenters;

use App\Transformers\UserStatusTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserStatusPresenter.
 *
 * @package namespace App\Presenters;
 */
class UserStatusPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserStatusTransformer();
    }
}
