<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                "attr" => ["class" => "form-control"]])
            ->add('address', TextType::class, [
                "attr" => ["class" => "form-control"]])
            ->add('zipcode', TextType::class, [
                "attr" => ["class" => "form-control"]])
            ->add('city', TextType::class, [
                "attr" => ["class" => "form-control"]])
            ->add("submit", SubmitType::class, [
                "attr" => ["class" => "btn btn-primary mt-2"]])
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
