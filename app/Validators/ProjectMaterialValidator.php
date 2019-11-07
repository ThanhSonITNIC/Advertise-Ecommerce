<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ProjectMaterialValidator.
 *
 * @package namespace App\Validators;
 */
class ProjectMaterialValidator extends LaravelValidator
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
            'quantity' => 'required|numeric|min:0',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'id_material' => 'required|exists:materials,id',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
        ],
    ];
}
