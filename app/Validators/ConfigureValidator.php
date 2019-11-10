<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ConfigureValidator.
 *
 * @package namespace App\Validators;
 */
class ConfigureValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'key' => 'required|alpha_dash|max:30|unique:configures,key',
            'value' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'key' => 'required|alpha_dash|max:30',
            'value' => 'required'
        ],
    ];
}
