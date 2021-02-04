<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\EmployeeType;
use App\Model\Employee;
use App\Service\Salary\SalaryCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, SalaryCalculator $salaryCalculator): Response
    {
        $employee = new Employee();
        $form = $this->createForm(EmployeeType::class, $employee);
        $form->handleRequest($request);

        $salary = null;
        if ($form->isSubmitted() && $form->isValid()) {
            $salary = $salaryCalculator->calculate($employee);
        }

        return $this->render('home/index.html.twig', [
            'form'=> $form->createView(),
            'salary' => $salary,
        ]);
    }
}
