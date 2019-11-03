<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PostValidator.
 *
 * @package namespace App\Validators;
 */
class PostValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'title' => 'required',
            'slug' => 'required|alpha_dash',
            'id_author' => 'required|exists:users,id',
            'id_type' => 'required|exists:post_types,id',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'title' => 'required',
            'slug' => 'required|alpha_dash',
            'id_type' => 'required|exists:post_types,id',
        ],
    ];
}
