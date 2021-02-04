<?php

declare(strict_types=1);

namespace App\Service\Salary;

use App\Model\Employee;

interface SalaryCalculatorStrategyInterface
{
    public function changeSalary(Employee $employee): void;

    public function changeTax(Employee $employee): void;

    public function changeSalaryAfterTax(Employee $employee): void;
}