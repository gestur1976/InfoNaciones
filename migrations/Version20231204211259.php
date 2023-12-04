<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231204211259 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alt_spellings (id INT AUTO_INCREMENT NOT NULL, cca3_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_8F7E438E769EE162 (cca3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE capital_cities (id INT AUTO_INCREMENT NOT NULL, cca3_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_734D75C0769EE162 (cca3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country_currency (country_id INT NOT NULL, currency_id INT NOT NULL, INDEX IDX_5A9CD982F92F3E70 (country_id), INDEX IDX_5A9CD98238248176 (currency_id), PRIMARY KEY(country_id, currency_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country_languages (country_id INT NOT NULL, languages_id INT NOT NULL, INDEX IDX_15325619F92F3E70 (country_id), INDEX IDX_153256195D237A9A (languages_id), PRIMARY KEY(country_id, languages_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country_native_name (id INT AUTO_INCREMENT NOT NULL, cca3_id INT NOT NULL, lang_code VARCHAR(4) NOT NULL, official VARCHAR(255) NOT NULL, common VARCHAR(255) NOT NULL, INDEX IDX_32D9E2E6769EE162 (cca3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE currency (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(4) NOT NULL, currency_name VARCHAR(255) NOT NULL, symbol VARCHAR(4) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domain_suffix (id INT AUTO_INCREMENT NOT NULL, cca3_id INT NOT NULL, domain_suffix VARCHAR(30) NOT NULL, INDEX IDX_DAD38B17769EE162 (cca3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE languages (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(4) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alt_spellings ADD CONSTRAINT FK_8F7E438E769EE162 FOREIGN KEY (cca3_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE capital_cities ADD CONSTRAINT FK_734D75C0769EE162 FOREIGN KEY (cca3_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE country_currency ADD CONSTRAINT FK_5A9CD982F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country_currency ADD CONSTRAINT FK_5A9CD98238248176 FOREIGN KEY (currency_id) REFERENCES currency (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country_languages ADD CONSTRAINT FK_15325619F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country_languages ADD CONSTRAINT FK_153256195D237A9A FOREIGN KEY (languages_id) REFERENCES languages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country_native_name ADD CONSTRAINT FK_32D9E2E6769EE162 FOREIGN KEY (cca3_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE domain_suffix ADD CONSTRAINT FK_DAD38B17769EE162 FOREIGN KEY (cca3_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE country ADD common_name VARCHAR(255) NOT NULL, ADD official_name VARCHAR(255) NOT NULL, ADD cioc VARCHAR(4) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alt_spellings DROP FOREIGN KEY FK_8F7E438E769EE162');
        $this->addSql('ALTER TABLE capital_cities DROP FOREIGN KEY FK_734D75C0769EE162');
        $this->addSql('ALTER TABLE country_currency DROP FOREIGN KEY FK_5A9CD982F92F3E70');
        $this->addSql('ALTER TABLE country_currency DROP FOREIGN KEY FK_5A9CD98238248176');
        $this->addSql('ALTER TABLE country_languages DROP FOREIGN KEY FK_15325619F92F3E70');
        $this->addSql('ALTER TABLE country_languages DROP FOREIGN KEY FK_153256195D237A9A');
        $this->addSql('ALTER TABLE country_native_name DROP FOREIGN KEY FK_32D9E2E6769EE162');
        $this->addSql('ALTER TABLE domain_suffix DROP FOREIGN KEY FK_DAD38B17769EE162');
        $this->addSql('DROP TABLE alt_spellings');
        $this->addSql('DROP TABLE capital_cities');
        $this->addSql('DROP TABLE country_currency');
        $this->addSql('DROP TABLE country_languages');
        $this->addSql('DROP TABLE country_native_name');
        $this->addSql('DROP TABLE currency');
        $this->addSql('DROP TABLE domain_suffix');
        $this->addSql('DROP TABLE languages');
        $this->addSql('ALTER TABLE country DROP common_name, DROP official_name, DROP cioc');
    }
}
