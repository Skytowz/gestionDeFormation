<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220524125627 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidat (id INT AUTO_INCREMENT NOT NULL, promotion_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, num_tel VARCHAR(255) NOT NULL, INDEX IDX_6AB5B471139DF194 (promotion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, num_tel VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formation (id INT AUTO_INCREMENT NOT NULL, organisme_de_formation_id INT NOT NULL, intitule VARCHAR(255) NOT NULL, INDEX IDX_404021BFF4EFDBC3 (organisme_de_formation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE organisme_de_formation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, num_tel VARCHAR(255) NOT NULL, email_contact VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, formation_id INT NOT NULL, referent_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_C11D7DD15200282E (formation_id), INDEX IDX_C11D7DD135E47E35 (referent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, formateur_id INT NOT NULL, promotion_id INT NOT NULL, salle_id INT DEFAULT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_D044D5D4155D8F51 (formateur_id), INDEX IDX_D044D5D4139DF194 (promotion_id), INDEX IDX_D044D5D4DC304035 (salle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE formation ADD CONSTRAINT FK_404021BFF4EFDBC3 FOREIGN KEY (organisme_de_formation_id) REFERENCES organisme_de_formation (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD15200282E FOREIGN KEY (formation_id) REFERENCES formation (id)');
        $this->addSql('ALTER TABLE promotion ADD CONSTRAINT FK_C11D7DD135E47E35 FOREIGN KEY (referent_id) REFERENCES formateur (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4155D8F51 FOREIGN KEY (formateur_id) REFERENCES formateur (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4DC304035 FOREIGN KEY (salle_id) REFERENCES salle (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD135E47E35');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4155D8F51');
        $this->addSql('ALTER TABLE promotion DROP FOREIGN KEY FK_C11D7DD15200282E');
        $this->addSql('ALTER TABLE formation DROP FOREIGN KEY FK_404021BFF4EFDBC3');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471139DF194');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4139DF194');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4DC304035');
        $this->addSql('DROP TABLE candidat');
        $this->addSql('DROP TABLE formateur');
        $this->addSql('DROP TABLE formation');
        $this->addSql('DROP TABLE organisme_de_formation');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
