<?php

declare(strict_types=1);

namespace App\Tests\Service\Salary;

use App\Model\Employee;
use App\Service\Salary\SalaryCalculator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SalaryCalculatorTest extends KernelTestCase
{
    /**
     * @var SalaryCalculator
     */
    private $salaryCalculator;

    protected function setUp(): void
    {
        parent::setUp();
        self::bootKernel();

        $this->salaryCalculator = self::$container->get(SalaryCalculator::class);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testCalculate(int $age, int $childrenCount, string $usingCar, int $inputSalary, int $resultSalary): void
    {
        $employee = new Employee();
        $employee->age = $age;
        $employee->childrenCount = $childrenCount;
        $employee->usingCar = $usingCar;
        $employee->salary = $inputSalary;

        $this->salaryCalculator->calculate($employee);
        self::assertSame($employee->salary, $resultSalary);
    }

    public function dataProvider(): \Generator
    {
        yield [26, 2, '0', 6000, 4800];
        yield [52, 0, '1', 4000, 2924];
        yield [36, 3, '1', 5000, 3600];
    }
}
