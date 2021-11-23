<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211123110748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enigme (id INT AUTO_INCREMENT NOT NULL, type_enigme_id INT NOT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, statement LONGTEXT NOT NULL, difficulty INT NOT NULL, indice1 LONGTEXT NOT NULL, indice2 LONGTEXT NOT NULL, indice3 LONGTEXT NOT NULL, image_url VARCHAR(255) NOT NULL, message_response_is_incorrect LONGTEXT NOT NULL, INDEX IDX_29C413777EDFBDE7 (type_enigme_id), INDEX IDX_29C4137712469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE solution_achoix (id INT AUTO_INCREMENT NOT NULL, enigme_id INT NOT NULL, value VARCHAR(50) NOT NULL, position VARCHAR(2) NOT NULL, is_valid TINYINT(1) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_88F6DDB6CA19FCF7 (enigme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE solution_multiple (id INT AUTO_INCREMENT NOT NULL, enigme_id INT NOT NULL, value VARCHAR(255) NOT NULL, position VARCHAR(2) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_2EA785A4CA19FCF7 (enigme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE solution_unique (id INT AUTO_INCREMENT NOT NULL, enigme_id INT NOT NULL, value VARCHAR(50) NOT NULL, INDEX IDX_C3548111CA19FCF7 (enigme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_enigme (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE enigme ADD CONSTRAINT FK_29C413777EDFBDE7 FOREIGN KEY (type_enigme_id) REFERENCES type_enigme (id)');
        $this->addSql('ALTER TABLE enigme ADD CONSTRAINT FK_29C4137712469DE2 FOREIGN KEY (category_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE solution_achoix ADD CONSTRAINT FK_88F6DDB6CA19FCF7 FOREIGN KEY (enigme_id) REFERENCES enigme (id)');
        $this->addSql('ALTER TABLE solution_multiple ADD CONSTRAINT FK_2EA785A4CA19FCF7 FOREIGN KEY (enigme_id) REFERENCES enigme (id)');
        $this->addSql('ALTER TABLE solution_unique ADD CONSTRAINT FK_C3548111CA19FCF7 FOREIGN KEY (enigme_id) REFERENCES enigme (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE enigme DROP FOREIGN KEY FK_29C4137712469DE2');
        $this->addSql('ALTER TABLE solution_achoix DROP FOREIGN KEY FK_88F6DDB6CA19FCF7');
        $this->addSql('ALTER TABLE solution_multiple DROP FOREIGN KEY FK_2EA785A4CA19FCF7');
        $this->addSql('ALTER TABLE solution_unique DROP FOREIGN KEY FK_C3548111CA19FCF7');
        $this->addSql('ALTER TABLE enigme DROP FOREIGN KEY FK_29C413777EDFBDE7');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE enigme');
        $this->addSql('DROP TABLE solution_achoix');
        $this->addSql('DROP TABLE solution_multiple');
        $this->addSql('DROP TABLE solution_unique');
        $this->addSql('DROP TABLE type_enigme');
    }
}
