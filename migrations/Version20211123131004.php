<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211123131004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE enigme_favorite');
        $this->addSql('DROP TABLE enigme_resolue');
        $this->addSql('ALTER TABLE users ADD enigme_resolue_id INT DEFAULT NULL, ADD enigme_favorite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9F8C64E10 FOREIGN KEY (enigme_resolue_id) REFERENCES enigme (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9CC6AAA71 FOREIGN KEY (enigme_favorite_id) REFERENCES enigme (id)');
        $this->addSql('CREATE INDEX IDX_1483A5E9F8C64E10 ON users (enigme_resolue_id)');
        $this->addSql('CREATE INDEX IDX_1483A5E9CC6AAA71 ON users (enigme_favorite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE enigme_favorite (user_id INT NOT NULL, PRIMARY KEY(user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE enigme_resolue (user_id INT NOT NULL, PRIMARY KEY(user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9F8C64E10');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9CC6AAA71');
        $this->addSql('DROP INDEX IDX_1483A5E9F8C64E10 ON users');
        $this->addSql('DROP INDEX IDX_1483A5E9CC6AAA71 ON users');
        $this->addSql('ALTER TABLE users DROP enigme_resolue_id, DROP enigme_favorite_id');
    }
}
