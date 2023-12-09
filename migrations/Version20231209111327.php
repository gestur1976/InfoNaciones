<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231209111327 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alt_spelling (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_14B70189F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE capital_city (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_7F7B1120F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE continent (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE continent_country (continent_id INT NOT NULL, country_id INT NOT NULL, INDEX IDX_4B4B72F0921F4C77 (continent_id), INDEX IDX_4B4B72F0F92F3E70 (country_id), PRIMARY KEY(continent_id, country_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, cca2_id VARCHAR(4) DEFAULT NULL, ccn3_id INT DEFAULT NULL, cca3_id VARCHAR(4) DEFAULT NULL, independent TINYINT(1) DEFAULT NULL, status VARCHAR(255) DEFAULT NULL, un_member TINYINT(1) DEFAULT NULL, region VARCHAR(40) DEFAULT NULL, subregion VARCHAR(100) DEFAULT NULL, latitude DOUBLE PRECISION DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, landlocked TINYINT(1) DEFAULT NULL, area DOUBLE PRECISION DEFAULT NULL, flag VARCHAR(16) DEFAULT NULL, population INT DEFAULT NULL, gini DOUBLE PRECISION DEFAULT NULL, fifa VARCHAR(4) DEFAULT NULL, common_name VARCHAR(255) NOT NULL, official_name VARCHAR(255) NOT NULL, cioc VARCHAR(4) DEFAULT NULL, start_of_week VARCHAR(255) NOT NULL, traffic_direction VARCHAR(10) DEFAULT NULL, flag_image VARCHAR(255) NOT NULL, flag_vector VARCHAR(255) DEFAULT NULL, coat_of_arms_image VARCHAR(255) DEFAULT NULL, coat_of_arms_vector VARCHAR(255) DEFAULT NULL, native_common_name VARCHAR(255) DEFAULT NULL, native_official_name VARCHAR(255) DEFAULT NULL, tld VARCHAR(64) DEFAULT NULL, date_created DATETIME NOT NULL, date_modified DATETIME NOT NULL, date_deleted DATETIME DEFAULT NULL, flag_alt_text LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_5373C966CE228607 (cca2_id), UNIQUE INDEX UNIQ_5373C966F4CE76B3 (ccn3_id), UNIQUE INDEX UNIQ_5373C966769EE162 (cca3_id), INDEX IDX_5373C966B03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country_border (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, foreign_country_cca3 VARCHAR(4) NOT NULL, INDEX IDX_878D8004F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE currency (id INT AUTO_INCREMENT NOT NULL, currency_code VARCHAR(4) NOT NULL, currency_name VARCHAR(255) NOT NULL, symbol VARCHAR(4) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE currency_country (currency_id INT NOT NULL, country_id INT NOT NULL, INDEX IDX_8EDA338938248176 (currency_id), INDEX IDX_8EDA3389F92F3E70 (country_id), PRIMARY KEY(currency_id, country_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(4) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language_country (language_id INT NOT NULL, country_id INT NOT NULL, INDEX IDX_F7BE1E3282F1BAF4 (language_id), INDEX IDX_F7BE1E32F92F3E70 (country_id), PRIMARY KEY(language_id, country_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE map (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, provider VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_93ADAABBF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time_zone (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, utcoffset VARCHAR(10) NOT NULL, INDEX IDX_D56C92AF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE translation (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, lang_code VARCHAR(4) NOT NULL, official VARCHAR(255) NOT NULL, common VARCHAR(255) NOT NULL, INDEX IDX_B469456FF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alt_spelling ADD CONSTRAINT FK_14B70189F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE capital_city ADD CONSTRAINT FK_7F7B1120F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE continent_country ADD CONSTRAINT FK_4B4B72F0921F4C77 FOREIGN KEY (continent_id) REFERENCES continent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE continent_country ADD CONSTRAINT FK_4B4B72F0F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country ADD CONSTRAINT FK_5373C966B03A8386 FOREIGN KEY (created_by_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE country_border ADD CONSTRAINT FK_878D8004F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE currency_country ADD CONSTRAINT FK_8EDA338938248176 FOREIGN KEY (currency_id) REFERENCES currency (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE currency_country ADD CONSTRAINT FK_8EDA3389F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE language_country ADD CONSTRAINT FK_F7BE1E3282F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE language_country ADD CONSTRAINT FK_F7BE1E32F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE map ADD CONSTRAINT FK_93ADAABBF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE time_zone ADD CONSTRAINT FK_D56C92AF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE translation ADD CONSTRAINT FK_B469456FF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alt_spelling DROP FOREIGN KEY FK_14B70189F92F3E70');
        $this->addSql('ALTER TABLE capital_city DROP FOREIGN KEY FK_7F7B1120F92F3E70');
        $this->addSql('ALTER TABLE continent_country DROP FOREIGN KEY FK_4B4B72F0921F4C77');
        $this->addSql('ALTER TABLE continent_country DROP FOREIGN KEY FK_4B4B72F0F92F3E70');
        $this->addSql('ALTER TABLE country DROP FOREIGN KEY FK_5373C966B03A8386');
        $this->addSql('ALTER TABLE country_border DROP FOREIGN KEY FK_878D8004F92F3E70');
        $this->addSql('ALTER TABLE currency_country DROP FOREIGN KEY FK_8EDA338938248176');
        $this->addSql('ALTER TABLE currency_country DROP FOREIGN KEY FK_8EDA3389F92F3E70');
        $this->addSql('ALTER TABLE language_country DROP FOREIGN KEY FK_F7BE1E3282F1BAF4');
        $this->addSql('ALTER TABLE language_country DROP FOREIGN KEY FK_F7BE1E32F92F3E70');
        $this->addSql('ALTER TABLE map DROP FOREIGN KEY FK_93ADAABBF92F3E70');
        $this->addSql('ALTER TABLE time_zone DROP FOREIGN KEY FK_D56C92AF92F3E70');
        $this->addSql('ALTER TABLE translation DROP FOREIGN KEY FK_B469456FF92F3E70');
        $this->addSql('DROP TABLE alt_spelling');
        $this->addSql('DROP TABLE capital_city');
        $this->addSql('DROP TABLE continent');
        $this->addSql('DROP TABLE continent_country');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE country_border');
        $this->addSql('DROP TABLE currency');
        $this->addSql('DROP TABLE currency_country');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE language_country');
        $this->addSql('DROP TABLE map');
        $this->addSql('DROP TABLE time_zone');
        $this->addSql('DROP TABLE translation');
        $this->addSql('DROP TABLE `user`');
    }
}
