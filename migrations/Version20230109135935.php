<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230109135935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_closure (id INT NOT NULL, parent_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, level INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8FDFCDAF727ACA70 ON category_closure (parent_id)');
        $this->addSql('CREATE TABLE category_closure_relation (id SERIAL NOT NULL, ancestor INT DEFAULT NULL, descendant INT DEFAULT NULL, depth INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_249AC853B4465BB ON category_closure_relation (ancestor)');
        $this->addSql('CREATE INDEX IDX_249AC8539A8FAD16 ON category_closure_relation (descendant)');
        $this->addSql('CREATE INDEX closure_depth_idx ON category_closure_relation (depth)');
        $this->addSql('CREATE UNIQUE INDEX IDX_884D56E6F5781C97 ON category_closure_relation (ancestor, descendant)');
        $this->addSql('ALTER TABLE category_closure ADD CONSTRAINT FK_8FDFCDAF727ACA70 FOREIGN KEY (parent_id) REFERENCES category_closure (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE category_closure_relation ADD CONSTRAINT FK_249AC853B4465BB FOREIGN KEY (ancestor) REFERENCES category_closure (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE category_closure_relation ADD CONSTRAINT FK_249AC8539A8FAD16 FOREIGN KEY (descendant) REFERENCES category_closure (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE category_closure DROP CONSTRAINT FK_8FDFCDAF727ACA70');
        $this->addSql('ALTER TABLE category_closure_relation DROP CONSTRAINT FK_249AC853B4465BB');
        $this->addSql('ALTER TABLE category_closure_relation DROP CONSTRAINT FK_249AC8539A8FAD16');
        $this->addSql('DROP TABLE category_closure');
        $this->addSql('DROP TABLE category_closure_relation');
    }
}
