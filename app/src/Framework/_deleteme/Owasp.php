<?php

namespace App\Framework\_deleteme;

class Owasp
{
    // todo
    public static function validate($input): bool{

    }

    public static function sanitize($input): string{

    }

    public static function validateInput($input): bool
    {
        $input = self::sanitize($input);
        $input = self::validate($input);
        return ;
    }
}