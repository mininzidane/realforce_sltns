<?php

declare(strict_types=1);

namespace App\Service\Salary;

use App\Model\Employee;

class SalaryCalculator
{
    private array $strategies;

    public function __construct(
        SalaryCalculatorAgeStrategy $salaryCalculatorAgeStrategy,
        SalaryCalculatorChildrenCountStrategy $salaryCalculatorChildrenCountStrategy,
        SalaryCalculatorUsingCarStrategy $salaryCalculatorUsingCarStrategy
    )
    {
        $this->strategies = [
            $salaryCalculatorAgeStrategy,
            $salaryCalculatorChildrenCountStrategy,
            $salaryCalculatorUsingCarStrategy,
        ];
    }

    public function calculate(Employee $employee): int
    {
        /** @var SalaryCalculatorStrategyInterface $strategy */
        foreach ($this->strategies as $strategy) {
            $strategy->changeSalary($employee);
            $strategy->changeTax($employee);
        }

        $employee->salary = (int)round($employee->salary * (1 - $employee->tax / 100));

        foreach ($this->strategies as $strategy) {
            $strategy->changeSalaryAfterTax($employee);
        }

        return $employee->salary;
    }
}
