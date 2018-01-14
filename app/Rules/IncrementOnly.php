<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IncrementOnly implements Rule
{
    protected $model;

    /**
     * Create a new rule instance.
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     *
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return version_compare($this->model->version, $value, '<');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The value given can only be incremented.';
    }
}
