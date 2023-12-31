<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\Continent;
use App\Entity\Country;
use App\Entity\Currency;
use App\Entity\Language;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CountryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cca2Id')
            ->add('ccn3Id')
            ->add('cca3Id')
            ->add('independent')
            ->add('status')
            ->add('unMember')
            ->add('region')
            ->add('subregion')
            ->add('latitude')
            ->add('longitude')
            ->add('landlocked')
            ->add('area')
            ->add('flag')
            ->add('population')
            ->add('gini')
            ->add('fifa')
            ->add('commonName')
            ->add('officialName')
            ->add('cioc')
            ->add('startOfWeek')
            ->add('trafficDirection')
            ->add('flagImage')
            ->add('flagVector')
            ->add('coatOfArmsImage')
            ->add('coatOfArmsVector')
            ->add('nativeOfficialName')
            ->add('tld')
            ->add('currencies', EntityType::class, [
                'class' => Currency::class,
'choice_label' => 'id',
'multiple' => true,
            ])
            ->add('continents', EntityType::class, [
                'class' => Continent::class,
'choice_label' => 'id',
'multiple' => true,
            ])
            ->add('languages', EntityType::class, [
                'class' => Language::class,
'choice_label' => 'id',
'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Country::class,
        ]);
    }
}
