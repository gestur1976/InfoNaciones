<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231204202627 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, cca2 VARCHAR(4) NOT NULL, ccn3 INT NOT NULL, cca3 VARCHAR(4) NOT NULL, independent TINYINT(1) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, un_member TINYINT(1) DEFAULT NULL, region VARCHAR(40) DEFAULT NULL, subregion VARCHAR(100) DEFAULT NULL, latitude DOUBLE PRECISION DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, landlocked TINYINT(1) DEFAULT NULL, area DOUBLE PRECISION DEFAULT NULL, flag VARCHAR(16) DEFAULT NULL, population BIGINT DEFAULT NULL, gini DOUBLE PRECISION DEFAULT NULL, fifa VARCHAR(4) DEFAULT NULL, UNIQUE INDEX UNIQ_5373C966F677F9EE (cca2), UNIQUE INDEX UNIQ_5373C9666E8D5B7 (ccn3), UNIQUE INDEX UNIQ_5373C9668170C978 (cca3), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE `user`');
    }
}
