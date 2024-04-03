<?php
namespace App\Enums;
enum ProductStatus: int{
    case Waiting = 0;
    case Validate = 1;
    case Unvalidate = 2;

    public function getUserRole(): string
    {
        return match($this)
        {
            self::Waiting => 'Waiting',
            self::Validate => 'Validate',
            self::Unvalidate => 'Unvalidate',
        };
    }
}
