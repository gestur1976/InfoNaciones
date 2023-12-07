<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Entity\Map;
use App\Entity\User;
use App\Entity\Country;
use App\Entity\Currency;
use App\Entity\Language;
use App\Entity\TimeZone;
use App\Entity\Continent;
use App\Entity\CapitalCity;
use App\Entity\Translation;
use App\Entity\CountryBorder;
use App\Controller\CountryController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;


class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(CountryCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('InfoNaciones');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::subMenu('Países', 'fas fa-globe')->setSubItems([
            MenuItem::linkToCrud('Listado', 'fas fa-list', Country::class),
            MenuItem::linkToCrud('Añadir', 'fas fa-plus', Country::class)->setAction(Crud::PAGE_NEW),
        ]);
        /*
        // We add another item to the "Administration" menu and sub menu items
        yield MenuItem::subMenu('Continentes', 'fas fa-earth-americas')->setSubItems([
            MenuItem::linkToCrud('Listado', '', Continent::class),
        ]);
        // We do the same for CapitalCities entity
        yield MenuItem::subMenu('Capitales', 'fas fa-city')->setSubItems([
            MenuItem::linkToCrud('Listado', '', CapitalCity::class),
        ]);
        // Now for Currencies entity
        yield MenuItem::subMenu('Divisas', 'fas fa-coins')->setSubItems([
            MenuItem::linkToCrud('Listado', '', Currency::class),
        ]);
        // And for Languages entity
        yield MenuItem::subMenu('Idiomas', 'fas fa-language')->setSubItems([
            MenuItem::linkToCrud('Listado', '', Language::class),
        ]);
        */
    }
}
