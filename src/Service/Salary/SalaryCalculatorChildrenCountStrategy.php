<?php

declare(strict_types=1);

namespace App\Service\Salary;

use App\Model\Employee;

class SalaryCalculatorChildrenCountStrategy implements SalaryCalculatorStrategyInterface
{
    private const CHILDREN_COUNT = 2;

    public function changeSalary(Employee $employee): void
    {

    }

    public function changeTax(Employee $employee): void
    {
        if ($employee->childrenCount > self::CHILDREN_COUNT) {
            $employee->tax -= 2;
        }
    }

    public function changeSalaryAfterTax(Employee $employee): void
    {

    }
}
