<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class PasswordLength implements Rule
{
    protected $min_passwd_length = 6;
    protected $max_passwd_length = 18;
    protected $user;

    /**
     * Create a new rule instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
        $password_length = strlen($this->user->password);

        return ($password_length >= $this->min_passwd_length) && ($password_length <= $this->max_passwd_length);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The given account\'s password length does not match given security requirements.';
    }
}
