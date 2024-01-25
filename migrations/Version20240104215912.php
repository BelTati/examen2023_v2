<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240104215912 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE livre_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE livre (id INT NOT NULL, titre VARCHAR(255) DEFAULT NULL, resume VARCHAR(255) DEFAULT NULL, auteur VARCHAR(255) DEFAULT NULL, votes INT DEFAULT NULL, date_ajout INT DEFAULT NULL, date_parution INT DEFAULT NULL, PRIMARY KEY(id))');
       // $this->addSql('ALTER TABLE genre ALTER nom DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE livre_id_seq CASCADE');
        //$this->addSql('DROP TABLE livre');
       // $this->addSql('ALTER TABLE genre ALTER nom SET NOT NULL');
    }
}
