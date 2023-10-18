<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231018132058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__dragon_treasure AS SELECT id, name, description, value, cool_factor, created_at, published FROM dragon_treasure');
        $this->addSql('DROP TABLE dragon_treasure');
        $this->addSql('CREATE TABLE dragon_treasure (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description CLOB NOT NULL, value INTEGER NOT NULL, cool_factor INTEGER NOT NULL, plundered_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , published BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO dragon_treasure (id, name, description, value, cool_factor, plundered_at, published) SELECT id, name, description, value, cool_factor, created_at, published FROM __temp__dragon_treasure');
        $this->addSql('DROP TABLE __temp__dragon_treasure');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__dragon_treasure AS SELECT id, name, description, value, cool_factor, plundered_at, published FROM dragon_treasure');
        $this->addSql('DROP TABLE dragon_treasure');
        $this->addSql('CREATE TABLE dragon_treasure (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description CLOB NOT NULL, value INTEGER NOT NULL, cool_factor INTEGER NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , published BOOLEAN NOT NULL)');
        $this->addSql('INSERT INTO dragon_treasure (id, name, description, value, cool_factor, created_at, published) SELECT id, name, description, value, cool_factor, plundered_at, published FROM __temp__dragon_treasure');
        $this->addSql('DROP TABLE __temp__dragon_treasure');
    }
}
