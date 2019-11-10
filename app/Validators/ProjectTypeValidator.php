<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ProjectTypeValidator.
 *
 * @package namespace App\Validators;
 */
class ProjectTypeValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'id' => 'required|alpha_dash|max:30|unique:project_types,id',
            'name' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'id' => 'required|alpha_dash|max:30',
            'name' => 'required'
        ],
    ];
}
