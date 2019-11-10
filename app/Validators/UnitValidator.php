<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UnitValidator.
 *
 * @package namespace App\Validators;
 */
class UnitValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'id' => 'required|alpha_dash|max:30|unique:units,id',
            'name' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'id' => 'required|alpha_dash|max:30',
            'name' => 'required'
        ],
    ];
}
