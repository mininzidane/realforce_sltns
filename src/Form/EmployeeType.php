<?php

declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('age', IntegerType::class, [
            'required' => true,
            'label_attr' => ['class' => 'form-label'],
            'attr' => ['class' => 'form-control'],
        ]);
        $builder->add('childrenCount', IntegerType::class, [
            'required' => true,
            'label_attr' => ['class' => 'form-label'],
            'attr' => ['class' => 'form-control'],
        ]);
        $builder->add('usingCar', ChoiceType::class, [
            'choices' => [
                'No' => 0,
                'Yes' => 1,
            ],
            'label_attr' => ['class' => 'form-label'],
            'attr' => ['class' => 'form-control'],
        ]);
        $builder->add('salary', IntegerType::class, [
            'required' => true,
            'label_attr' => ['class' => 'form-label'],
            'attr' => ['class' => 'form-control'],
        ]);
    }
}
