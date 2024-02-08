<?php
namespace App\Enums;
enum UserRole: int{
    case User = 0;
    case Crafter = 1;
    case Admin = 2;

    public function getUserRole(): string
    {
        return match($this)
        {
            self::Admin => 'Admin',
            self::Crafter => 'Crafter',
            self::User => 'User',
        };
    }
}
