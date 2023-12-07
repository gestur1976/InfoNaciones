<?php

namespace App\Controller\Admin;

use App\Entity\Country;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CountryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Country::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            yield IdField::new('id')->hideOnForm(),
            yield TextField::new('commonName', 'Nombre común'),
            yield TextField::new('officialName', 'Nombre oficial'),
            yield TextField::new('cca2Id', 'Código CCA2'),
            yield TextField::new('ccn3Id', 'Código CCN3'),
            yield TextField::new('cca3Id', 'Código CCA3'),
            yield TextField::new('cioc', 'Código del Comité Olímpico Internacional'),
            yield BooleanField::new('independent', 'Independiente'),
            yield TextField::new('status', 'Designación oficial'),
            yield TextField::new('region', 'Región'),
            yield TextField::new('subregion', 'Subregión'),
            yield TextField::new('latitude', 'Latitud º'),
            yield TextField::new('longitude', 'Longitud º'),
            yield TextField::new('flag', 'Bandera (emoji UTF-8)'),
            yield BooleanField::new('unMember', 'Miembro de la ONU'),
            yield TextField::new('area', 'Área (Km^2'),
            yield TextField::new('gini', 'Coeficiente de Gini (%)'),
            yield TextField::new('fifa', 'Código de la FIFA'),
            yield BooleanField::new('landlocked', 'Sin litoral'),
            yield TextField::new('population', 'Población total'),
            yield TextField::new('startOfWeek', 'Primer día de la semana'),
            yield TextField::new('trafficDirection', 'Sentido de circulación del tráfico'),
            yield TextField::new('flagImage', 'Imagen de la bandera'),
            yield TextField::new('flagVector', 'Imagen rasterizada de la bandera'),
            yield TextField::new('coatOfArms', 'Imagen del escudo'),
            yield TextField::new('coatOfArmsVector', 'Imagen rasterizada del escudo'),
            yield TextField::new('map', 'Imagen del mapa'),
        ];
    }
}
