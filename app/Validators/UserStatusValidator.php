<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserStatusValidator.
 *
 * @package namespace App\Validators;
 */
class UserStatusValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'id' => 'required|alpha_dash|numeric',
            'name' => 'required'
        ],
    ];
}
