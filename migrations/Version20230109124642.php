<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230109124642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE category_materialized_path_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE category_materialized_path (id INT NOT NULL, parent_id INT DEFAULT NULL, path TEXT DEFAULT NULL, title VARCHAR(255) NOT NULL, level INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_73A9974C727ACA70 ON category_materialized_path (parent_id)');
        $this->addSql('ALTER TABLE category_materialized_path ADD CONSTRAINT FK_73A9974C727ACA70 FOREIGN KEY (parent_id) REFERENCES category_materialized_path (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE category_materialized_path_id_seq CASCADE');
        $this->addSql('ALTER TABLE category_materialized_path DROP CONSTRAINT FK_73A9974C727ACA70');
        $this->addSql('DROP TABLE category_materialized_path');
    }
}
