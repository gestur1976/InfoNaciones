<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\Country;
use App\Manager\CountryManager;
use App\Repository\CountryRepository;
use App\Service\CountryInfoService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:import-country',
    description: 'Este comando importa la información de paises desde la API de restcountries.com.'
)]

class ImportCountryCommand extends Command
{
    protected static $defaultName = 'app:import-country';
    private EntityManager $entityManager;
    private CountryInfoService $countryInfoService;

    private CountryManager $countryManager;

    public function __construct(EntityManagerInterface $entityManager, CountryInfoService $countryInfoService, CountryManager $countryManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
        $this->countryInfoService = $countryInfoService;
        $this->countryManager = $countryManager;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Este comando te permite importar o actualizar un país existente por nombre o por '.
                'código de país (cca2, cca3, ccn3) desde la API de restcountries.com. Para sincronizar la lista completa de países '.
                'usa el parámetro "all" como valor para el parámetro "nombre".')
            ->addOption('nombre', null, InputOption::VALUE_OPTIONAL, 'Nombre del país o "todo"')
            ->addOption('codigo', null, InputOption::VALUE_OPTIONAL, 'Cualquier código de país (cca2, cca3 o ccn3)');
    }
    // TODO: Implementar manejo de errores
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $countryName = $input->getOption('nombre');
        $countryCode = $input->getOption('codigo');

        if ($countryName && $countryCode) {
            $io->error('Especifica solo uno de los parámetros "nombre" o "codigo".');
            return Command::FAILURE;
        }
        if (!$countryName && !$countryCode) {
            $io->error('Especifica uno de los parámetros "nombre" o "codigo".');
            return Command::FAILURE;
        }

        if ($countryName) {
            $searchResults = $countryName === "all" ?
                $this->countryInfoService->findAll() :
                $this->countryInfoService->findByName($countryName);
            if (empty($searchResults)) {
                $io->error("No se pudo encontrar ningún país con el nombre: $countryName. Intenta con otros nombres.");
                return Command::FAILURE;
            }

            foreach ($searchResults as $countryData) {
                $country = $countryRepository->getCountryByName($countryName);
                if ($country) {
                    $io->error('El país '.$country->getCountryName(). ' ya existe. Para volver a importarlo elimínalo ".
                        "primero desde el panel de administración.');
                } else {
                    $io->info('Importando: '.$countryData['name']['common'] . "...");
                }
                $country = $this->countryManager->newCountryFromRestCountryData($countryData);
                // }
            }
        }

        return Command::SUCCESS;
    }
}