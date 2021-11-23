<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211123160408 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE enigme ADD difficulty_id INT NOT NULL, ADD number_picarats VARCHAR(3) NOT NULL, ADD message_response_is_correct LONGTEXT NOT NULL, ADD image_response_is_correct VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE enigme ADD CONSTRAINT FK_29C41377FCFA9DAE FOREIGN KEY (difficulty_id) REFERENCES difficulte (id)');
        $this->addSql('CREATE INDEX IDX_29C41377FCFA9DAE ON enigme (difficulty_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE enigme DROP FOREIGN KEY FK_29C41377FCFA9DAE');
        $this->addSql('DROP INDEX IDX_29C41377FCFA9DAE ON enigme');
        $this->addSql('ALTER TABLE enigme DROP difficulty_id, DROP number_picarats, DROP message_response_is_correct, DROP image_response_is_correct');
    }
}
