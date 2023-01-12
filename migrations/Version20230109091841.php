<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230109091841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_tree (id INT NOT NULL, root_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, lft INT NOT NULL, lvl INT NOT NULL, rgt INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3CA5249B79066886 ON category_tree (root_id)');
        $this->addSql('CREATE INDEX IDX_3CA5249B727ACA70 ON category_tree (parent_id)');
        $this->addSql('ALTER TABLE category_tree ADD CONSTRAINT FK_3CA5249B79066886 FOREIGN KEY (root_id) REFERENCES category_tree (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE category_tree ADD CONSTRAINT FK_3CA5249B727ACA70 FOREIGN KEY (parent_id) REFERENCES category_tree (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE category_tree DROP CONSTRAINT FK_3CA5249B79066886');
        $this->addSql('ALTER TABLE category_tree DROP CONSTRAINT FK_3CA5249B727ACA70');
        $this->addSql('DROP TABLE category_tree');
    }
}
