<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ImportMaterialValidator.
 *
 * @package namespace App\Validators;
 */
class ImportMaterialValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'id_material' => 'required|exists:materials,id',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:1',
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
