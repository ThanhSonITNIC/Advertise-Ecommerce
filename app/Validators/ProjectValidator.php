<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ProjectValidator.
 *
 * @package namespace App\Validators;
 */
class ProjectValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required',
            'slug' => 'required|alpha_dash',
            'start_at' => 'required|date',
            'finish_at' => 'nullable|date|after:start_at',
            'id_type' => 'required|exists:project_types,id',
            'id_customer' => 'nullable|exists:users,id',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required',
            'slug' => 'required|alpha_dash',
            'start_at' => 'required|date',
            'finish_at' => 'nullable|date|after:start_at',
            'finished_at' => 'nullable|date|after:start_at',
            'id_type' => 'required|exists:project_types,id',
            'id_customer' => 'nullable|exists:users,id',
        ],
    ];
}
