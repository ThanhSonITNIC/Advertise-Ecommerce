<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class MaterialValidator.
 *
 * @package namespace App\Validators;
 */
class MaterialValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'id' => 'required|max:30|alpha_dash|unique:materials,id',
            'name' => 'required',
            'price' => 'required|min:0',
            'quantity' => 'required|min:0',
            'id_unit' => 'required|exists:units,id',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'id' => 'required|max:30|alpha_dash',
            'name' => 'required',
            'price' => 'required|min:0',
            'quantity' => 'required|min:0',
            'id_unit' => 'required|exists:units,id',
        ],
    ];
}
