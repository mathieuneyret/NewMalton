<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211123130319 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE enigme_resolue DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE enigme_resolue CHANGE enigme_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE enigme_resolue ADD PRIMARY KEY (user_id)');
        $this->addSql('ALTER TABLE enigme_favorite DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE enigme_favorite CHANGE enigme_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE enigme_favorite ADD PRIMARY KEY (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE enigme_favorite DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE enigme_favorite CHANGE user_id enigme_id INT NOT NULL');
        $this->addSql('ALTER TABLE enigme_favorite ADD PRIMARY KEY (enigme_id)');
        $this->addSql('ALTER TABLE enigme_resolue DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE enigme_resolue CHANGE user_id enigme_id INT NOT NULL');
        $this->addSql('ALTER TABLE enigme_resolue ADD PRIMARY KEY (enigme_id)');
    }
}
