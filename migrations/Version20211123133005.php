<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211123133005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE enigme_resolue (id INT AUTO_INCREMENT NOT NULL, enigme_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_8F8B398FCA19FCF7 (enigme_id), INDEX IDX_8F8B398FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE enigme_resolue ADD CONSTRAINT FK_8F8B398FCA19FCF7 FOREIGN KEY (enigme_id) REFERENCES enigme (id)');
        $this->addSql('ALTER TABLE enigme_resolue ADD CONSTRAINT FK_8F8B398FA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE enigme_resolue');
    }
}
