<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230918180217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire (id INT AUTO_INCREMENT NOT NULL, employe_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, commentaire LONGTEXT NOT NULL, note INT NOT NULL, INDEX IDX_67F068BC1B65292 (employe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employe (id INT AUTO_INCREMENT NOT NULL, administrateur_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, INDEX IDX_F804D3B97EE5403C (administrateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employe_message (employe_id INT NOT NULL, message_id INT NOT NULL, INDEX IDX_72B25CDC1B65292 (employe_id), INDEX IDX_72B25CDC537A1329 (message_id), PRIMARY KEY(employe_id, message_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE garage (id INT AUTO_INCREMENT NOT NULL, rue VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, ouverture TIME NOT NULL, fermeture TIME NOT NULL, services LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modele (id INT AUTO_INCREMENT NOT NULL, marque_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_100285584827B9B2 (marque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, modele_id INT DEFAULT NULL, energie_id INT DEFAULT NULL, employe_id INT DEFAULT NULL, garage_id INT DEFAULT NULL, mise_en_circulation DATE NOT NULL, kilometrage INT NOT NULL, prix INT NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_292FFF1DAC14B70A (modele_id), INDEX IDX_292FFF1DB732A364 (energie_id), INDEX IDX_292FFF1D1B65292 (employe_id), INDEX IDX_292FFF1DC4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC1B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B97EE5403C FOREIGN KEY (administrateur_id) REFERENCES administrateur (id)');
        $this->addSql('ALTER TABLE employe_message ADD CONSTRAINT FK_72B25CDC1B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employe_message ADD CONSTRAINT FK_72B25CDC537A1329 FOREIGN KEY (message_id) REFERENCES message (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE modele ADD CONSTRAINT FK_100285584827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DAC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DB732A364 FOREIGN KEY (energie_id) REFERENCES energie (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D1B65292 FOREIGN KEY (employe_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1DC4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC1B65292');
        $this->addSql('ALTER TABLE employe DROP FOREIGN KEY FK_F804D3B97EE5403C');
        $this->addSql('ALTER TABLE employe_message DROP FOREIGN KEY FK_72B25CDC1B65292');
        $this->addSql('ALTER TABLE employe_message DROP FOREIGN KEY FK_72B25CDC537A1329');
        $this->addSql('ALTER TABLE modele DROP FOREIGN KEY FK_100285584827B9B2');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DAC14B70A');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DB732A364');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D1B65292');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1DC4FFF555');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP TABLE employe');
        $this->addSql('DROP TABLE employe_message');
        $this->addSql('DROP TABLE garage');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE modele');
        $this->addSql('DROP TABLE vehicule');
    }
}
