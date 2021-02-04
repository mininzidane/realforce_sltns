<?php

declare(strict_types=1);

namespace App\Service\Salary;

use App\Model\Employee;

class SalaryCalculatorAgeStrategy implements SalaryCalculatorStrategyInterface
{
    private const BORDER_AGE = 50;

    public function changeSalary(Employee $employee): void
    {
        if ($employee->age > self::BORDER_AGE) {
            $employee->salary = (int)round($employee->salary * 1.07);
        }
    }

    public function changeTax(Employee $employee): void
    {

    }

    public function changeSalaryAfterTax(Employee $employee): void
    {

    }
}
