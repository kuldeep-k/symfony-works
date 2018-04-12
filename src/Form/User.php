<?php

// src/Form/User.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class User extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            $builder
        ->add('email', EmailType::class, ['label' => 'Email Address'])
        ->add('firstName', TextType::class, ['label' => 'First Name'])
        ->add('lastName', TextType::class, ['label' => 'Last Name'])
        ->add('password', RepeatedType::class, array(
            'type' => PasswordType::class,
            'invalid_message' => 'The password fields must match.',
            'options' => array('attr' => array('class' => 'password-field')),
            'required' => true,
            'first_options'  => array('label' => 'Password'),
            'second_options' => array('label' => 'Repeat Password'),
        ))
        // ->add('confirmpassword', PasswordType::class, ['label' => 'Confirm Password'])
        ->add('dob', BirthdayType::class, ['label' => 'Date of Birth'])
        ->add('education', ChoiceType::class, ['multiple' => false, 'expanded' => false, 'label' => 'Education', 'choices' => [
            'Under Graduation' => 'Under Graduation',
            'Graduation' => 'Graduation',
            'Post Graduation' => 'Post Graduation',
            'PHD' => 'PHD'
        ]])
        ->add('occupation', ChoiceType::class, ['multiple' => false, 'expanded' => true, 'label' => 'Occupation', 
          'choices' => [
            'Govt. Job' => 'Govt. Job',
            'Private Job' => 'Private Job',
            'Business' => 'Business',
            'Student' => 'Student'
        ]])
        ->add('currentLocation', TextType::class, ['label' => 'Current Location'])
        ->add('permLocation', TextType::class, ['label' => 'Perm Location'])
        ->add('save', SubmitType::class, array('label' => 'Save'));
    }
}