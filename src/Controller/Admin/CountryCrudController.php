<?php

namespace App\Controller\Admin;

use App\Entity\Country;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
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
            yield TextField::new('nativeCommonName', 'Nombre común nativo'),
            yield TextField::new('nativeOfficialName', 'Nombre oficial nativo'),
            yield TextField::new('cca2Id', 'Código CCA2'),
            yield NumberField::new('ccn3Id', 'Código ISO 3166-1 numérico'),
            yield TextField::new('cca3Id', 'Código ISO 3166-1 alfa-3'),
            yield TextField::new('cioc', 'Código del Comité Olímpico Internacional'),
            yield BooleanField::new('independent', 'Independiente'),
            yield TextField::new('status', 'Designación oficial'),
            yield TextField::new('region', 'Región'),
            yield TextField::new('subregion', 'Subregión'),
            yield NumberField::new('latitude', 'Latitud º'),
            yield NumberField::new('longitude', 'Longitud º'),
            yield TextField::new('flag', 'Bandera (emoji UTF-8)'),
            yield BooleanField::new('unMember', 'Miembro de la ONU'),
            yield NumberField::new('area', 'Área (Km^2'),
            yield NumberField::new('gini', 'Coeficiente de Gini (%)'),
            yield TextField::new('fifa', 'Código de la FIFA'),
            yield BooleanField::new('landlocked', 'Sin litoral'),
            yield NumberField::new('population', 'Población total'),
            yield TextField::new('startOfWeek', 'Primer día de la semana'),
            yield TextField::new('trafficDirection', 'Sentido de circulación del tráfico'),
            yield TextField::new('flagImage', 'Imagen de la bandera'),
            yield TextField::new('flagVector', 'Imagen rasterizada de la bandera'),
            yield TextField::new('coatOfArmsImage', 'Imagen del escudo'),
            yield TextField::new('coatOfArmsVector', 'Imagen rasterizada del escudo'),
            yield TextField::new('tld', 'Dominio de nivel superior (tld)'),
            yield CollectionField::new('capitalCities', 'Capital(es)'),
            yield CollectionField::new('currencies', 'Divisas'),
            yield CollectionField::new('countryBorders', 'Países fronterizos (códigos ISO 3166-1 alfa-3)'),
            yield CollectionField::new('languages', 'Idiomas hablados'),
            yield CollectionField::new('altSpellings', 'Denominaciones Alternativas'),
            yield CollectionField::new('translations', 'Denominaciones en otros idiomas'),
            yield CollectionField::new('maps', 'Mapas'),
            yield CollectionField::new('timeZones', 'Husos horarios'),
            yield CollectionField::new('continents', 'Continentes'),
            yield CollectionField::new('dateCreated', 'Creado'),
            yield CollectionField::new('dateModified', 'Última modificación'),
        ];
    }
}
