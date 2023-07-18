<?php

namespace App\Enums;

enum UserType: int
{
    case CLIENT = 0;
    case TECHNICIAN = 1;
    case ADMIN = 2;
}
