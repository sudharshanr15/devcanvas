<?php

namespace App\Enums;

enum DBDrivers: string
{
    case sqlite = "sqlite";
    case mysql = "mysql";
    case mariadb = "mariadb";
    case pgsql = "pgsql";
}
