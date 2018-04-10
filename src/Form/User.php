<?php

// src/Form/User.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class User extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('email', TextType::class, ['label' => 'Email Address'])
        ->add('firstName', TextType::class, ['label' => 'First Name'])
        ->add('lastName', TextType::class, ['label' => 'Last Name'])
        ->add('password', PasswordType::class, ['label' => 'Password'])
        ->add('confirmpassword', PasswordType::class, ['label' => 'Confirm Password'])
        ->add('dob', DateType::class, ['label' => 'Date of Birth'])
        ->add('education', TextType::class, ['label' => 'Education'])
        ->add('occupation', TextType::class, ['label' => 'Occupation'])
        ->add('currentLocation', TextType::class, ['label' => 'Current Location'])
        ->add('permLocation', TextType::class, ['label' => 'Perm Location'])
        ->add('save', SubmitType::class, array('label' => 'Save'));
    }
}