<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211123115456 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demande (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, statement LONGTEXT NOT NULL, solution LONGTEXT NOT NULL, comment LONGTEXT NOT NULL, INDEX IDX_2694D7A5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, joueur_id INT NOT NULL, enigme_id INT NOT NULL, note DOUBLE PRECISION NOT NULL, comment LONGTEXT NOT NULL, is_valid TINYINT(1) NOT NULL, INDEX IDX_CFBDFA14A9E2D76C (joueur_id), INDEX IDX_CFBDFA14CA19FCF7 (enigme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enigme_resolue (enigme_id INT NOT NULL, PRIMARY KEY(enigme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enigme_favorite (enigme_id INT NOT NULL, PRIMARY KEY(enigme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A5A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14A9E2D76C FOREIGN KEY (joueur_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14CA19FCF7 FOREIGN KEY (enigme_id) REFERENCES enigme (id)');
        $this->addSql('ALTER TABLE users ADD nb_picarats INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE demande');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE enigme_resolue');
        $this->addSql('DROP TABLE enigme_favorite');
        $this->addSql('ALTER TABLE users DROP nb_picarats');
    }
}
