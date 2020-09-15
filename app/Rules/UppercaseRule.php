<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UppercaseRule implements Rule
{

    public function __construct()
    {
        //
    }

    public function passes($attribute, $value)
    {
        return (strtoupper($value) === $value);
    }

    public function message()
    {
        return 'Phải viết hoa tất cả các chữ cái';
    }
}
