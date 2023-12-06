<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231206110451 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE country ADD created_by_id INT DEFAULT NULL, ADD date_created DATETIME NOT NULL, ADD date_modified DATETIME NOT NULL, ADD date_deleted DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE country ADD CONSTRAINT FK_5373C966B03A8386 FOREIGN KEY (created_by_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_5373C966B03A8386 ON country (created_by_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE country DROP FOREIGN KEY FK_5373C966B03A8386');
        $this->addSql('DROP INDEX IDX_5373C966B03A8386 ON country');
        $this->addSql('ALTER TABLE country DROP created_by_id, DROP date_created, DROP date_modified, DROP date_deleted');
    }
}
