<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class LevelValidator.
 *
 * @package namespace App\Validators;
 */
class LevelValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'id' => 'required|alpha_dash|max:30|unique:levels,id',
            'name' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'id' => 'required|alpha_dash|max:30',
            'name' => 'required'
        ],
    ];
}
