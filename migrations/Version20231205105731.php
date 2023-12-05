<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231205105731 extends AbstractMigration
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
        $this->addSql('CREATE TABLE coat_of_arms (id INT AUTO_INCREMENT NOT NULL, cca3_id INT NOT NULL, png VARCHAR(255) DEFAULT NULL, svg VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_2CF997F1769EE162 (cca3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE continent (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, cca2_id VARCHAR(4) NOT NULL, ccn3_id INT NOT NULL, cca3_id VARCHAR(4) NOT NULL, independent TINYINT(1) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, un_member TINYINT(1) DEFAULT NULL, region VARCHAR(40) DEFAULT NULL, subregion VARCHAR(100) DEFAULT NULL, latitude DOUBLE PRECISION DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, landlocked TINYINT(1) DEFAULT NULL, area DOUBLE PRECISION DEFAULT NULL, flag VARCHAR(16) DEFAULT NULL, population INT DEFAULT NULL, gini DOUBLE PRECISION DEFAULT NULL, fifa VARCHAR(4) DEFAULT NULL, common_name VARCHAR(255) NOT NULL, official_name VARCHAR(255) NOT NULL, cioc VARCHAR(4) DEFAULT NULL, start_of_week VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5373C966CE228607 (cca2_id), UNIQUE INDEX UNIQ_5373C966F4CE76B3 (ccn3_id), UNIQUE INDEX UNIQ_5373C966769EE162 (cca3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country_currency (country_id INT NOT NULL, currency_id INT NOT NULL, INDEX IDX_5A9CD982F92F3E70 (country_id), INDEX IDX_5A9CD98238248176 (currency_id), PRIMARY KEY(country_id, currency_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country_languages (country_id INT NOT NULL, languages_id INT NOT NULL, INDEX IDX_15325619F92F3E70 (country_id), INDEX IDX_153256195D237A9A (languages_id), PRIMARY KEY(country_id, languages_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country_continent (country_id INT NOT NULL, continent_id INT NOT NULL, INDEX IDX_D924091CF92F3E70 (country_id), INDEX IDX_D924091C921F4C77 (continent_id), PRIMARY KEY(country_id, continent_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country_border (id INT AUTO_INCREMENT NOT NULL, cca3_id_one VARCHAR(4) DEFAULT NULL, cca3_id_two VARCHAR(4) DEFAULT NULL, UNIQUE INDEX UNIQ_878D800458AC6989 (cca3_id_one), UNIQUE INDEX UNIQ_878D8004330A651E (cca3_id_two), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country_native_name (id INT AUTO_INCREMENT NOT NULL, cca3_id INT NOT NULL, lang_code VARCHAR(4) NOT NULL, official VARCHAR(255) NOT NULL, common VARCHAR(255) NOT NULL, INDEX IDX_32D9E2E6769EE162 (cca3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE currency (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(4) NOT NULL, currency_name VARCHAR(255) NOT NULL, symbol VARCHAR(4) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domain_suffix (id INT AUTO_INCREMENT NOT NULL, cca3_id INT NOT NULL, domain_suffix VARCHAR(30) NOT NULL, INDEX IDX_DAD38B17769EE162 (cca3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flags (id INT AUTO_INCREMENT NOT NULL, cca3_id INT NOT NULL, png VARCHAR(255) DEFAULT NULL, svg VARCHAR(255) DEFAULT NULL, alt VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_B0541BA769EE162 (cca3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE languages (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(4) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maps (id INT AUTO_INCREMENT NOT NULL, cca3_id INT NOT NULL, provider VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_472E08A5769EE162 (cca3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE translation (id INT AUTO_INCREMENT NOT NULL, cca3_id INT NOT NULL, lang_code VARCHAR(4) NOT NULL, official VARCHAR(255) NOT NULL, common VARCHAR(255) NOT NULL, INDEX IDX_B469456F769EE162 (cca3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alt_spellings ADD CONSTRAINT FK_8F7E438E769EE162 FOREIGN KEY (cca3_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE capital_cities ADD CONSTRAINT FK_734D75C0769EE162 FOREIGN KEY (cca3_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE coat_of_arms ADD CONSTRAINT FK_2CF997F1769EE162 FOREIGN KEY (cca3_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE country_currency ADD CONSTRAINT FK_5A9CD982F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country_currency ADD CONSTRAINT FK_5A9CD98238248176 FOREIGN KEY (currency_id) REFERENCES currency (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country_languages ADD CONSTRAINT FK_15325619F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country_languages ADD CONSTRAINT FK_153256195D237A9A FOREIGN KEY (languages_id) REFERENCES languages (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country_continent ADD CONSTRAINT FK_D924091CF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country_continent ADD CONSTRAINT FK_D924091C921F4C77 FOREIGN KEY (continent_id) REFERENCES continent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country_border ADD CONSTRAINT FK_878D800458AC6989 FOREIGN KEY (cca3_id_one) REFERENCES country (cca3_id)');
        $this->addSql('ALTER TABLE country_border ADD CONSTRAINT FK_878D8004330A651E FOREIGN KEY (cca3_id_two) REFERENCES country (cca3_id)');
        $this->addSql('ALTER TABLE country_native_name ADD CONSTRAINT FK_32D9E2E6769EE162 FOREIGN KEY (cca3_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE domain_suffix ADD CONSTRAINT FK_DAD38B17769EE162 FOREIGN KEY (cca3_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE flags ADD CONSTRAINT FK_B0541BA769EE162 FOREIGN KEY (cca3_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE maps ADD CONSTRAINT FK_472E08A5769EE162 FOREIGN KEY (cca3_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE translation ADD CONSTRAINT FK_B469456F769EE162 FOREIGN KEY (cca3_id) REFERENCES country (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alt_spellings DROP FOREIGN KEY FK_8F7E438E769EE162');
        $this->addSql('ALTER TABLE capital_cities DROP FOREIGN KEY FK_734D75C0769EE162');
        $this->addSql('ALTER TABLE coat_of_arms DROP FOREIGN KEY FK_2CF997F1769EE162');
        $this->addSql('ALTER TABLE country_currency DROP FOREIGN KEY FK_5A9CD982F92F3E70');
        $this->addSql('ALTER TABLE country_currency DROP FOREIGN KEY FK_5A9CD98238248176');
        $this->addSql('ALTER TABLE country_languages DROP FOREIGN KEY FK_15325619F92F3E70');
        $this->addSql('ALTER TABLE country_languages DROP FOREIGN KEY FK_153256195D237A9A');
        $this->addSql('ALTER TABLE country_continent DROP FOREIGN KEY FK_D924091CF92F3E70');
        $this->addSql('ALTER TABLE country_continent DROP FOREIGN KEY FK_D924091C921F4C77');
        $this->addSql('ALTER TABLE country_border DROP FOREIGN KEY FK_878D800458AC6989');
        $this->addSql('ALTER TABLE country_border DROP FOREIGN KEY FK_878D8004330A651E');
        $this->addSql('ALTER TABLE country_native_name DROP FOREIGN KEY FK_32D9E2E6769EE162');
        $this->addSql('ALTER TABLE domain_suffix DROP FOREIGN KEY FK_DAD38B17769EE162');
        $this->addSql('ALTER TABLE flags DROP FOREIGN KEY FK_B0541BA769EE162');
        $this->addSql('ALTER TABLE maps DROP FOREIGN KEY FK_472E08A5769EE162');
        $this->addSql('ALTER TABLE translation DROP FOREIGN KEY FK_B469456F769EE162');
        $this->addSql('DROP TABLE alt_spellings');
        $this->addSql('DROP TABLE capital_cities');
        $this->addSql('DROP TABLE coat_of_arms');
        $this->addSql('DROP TABLE continent');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE country_currency');
        $this->addSql('DROP TABLE country_languages');
        $this->addSql('DROP TABLE country_continent');
        $this->addSql('DROP TABLE country_border');
        $this->addSql('DROP TABLE country_native_name');
        $this->addSql('DROP TABLE currency');
        $this->addSql('DROP TABLE domain_suffix');
        $this->addSql('DROP TABLE flags');
        $this->addSql('DROP TABLE languages');
        $this->addSql('DROP TABLE maps');
        $this->addSql('DROP TABLE translation');
        $this->addSql('DROP TABLE `user`');
    }
}
