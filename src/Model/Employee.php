<?php

declare(strict_types=1);

namespace App\Model;

class Employee
{
    public ?int $age;
    public ?int $childrenCount;
    public ?string $usingCar;
    public ?int $salary;
    public float $tax = 20;
}
