<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181102090659 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE facturation (id INT AUTO_INCREMENT NOT NULL, souscription_id INT DEFAULT NULL, montant INT DEFAULT NULL, solde_initial INT DEFAULT NULL, solde_restant INT DEFAULT NULL, description VARCHAR(255) NOT NULL, date DATETIME DEFAULT NULL, statut INT DEFAULT NULL, tel VARCHAR(255) DEFAULT NULL, smsc VARCHAR(255) DEFAULT NULL, service_code VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE souscription (id INT AUTO_INCREMENT NOT NULL, abonne_id INT NOT NULL, service_id INT NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, date_reception DATETIME DEFAULT NULL, date_facturation DATETIME DEFAULT NULL, date_reabonnement DATETIME DEFAULT NULL, date_desabonnement DATETIME DEFAULT NULL, nbre INT NOT NULL, statut INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, gestionnaire_id INT NOT NULL, date_creation DATETIME NOT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) DEFAULT NULL, reponse_abonne VARCHAR(255) NOT NULL, reponse_desabonne VARCHAR(255) NOT NULL, statut INT DEFAULT NULL, service_parent_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, entreprise_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, username VARCHAR(20) NOT NULL, password VARCHAR(255) DEFAULT NULL, plain_password VARCHAR(30) DEFAULT NULL, salt VARCHAR(255) DEFAULT NULL, tel VARCHAR(20) DEFAULT NULL, smsc VARCHAR(10) DEFAULT NULL, date_creation DATETIME DEFAULT NULL, titre VARCHAR(100) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, statut INT DEFAULT NULL, etat INT DEFAULT NULL, securite INT DEFAULT NULL, partenaire_principal_id INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE actualite (id INT AUTO_INCREMENT NOT NULL, editeur_id INT NOT NULL, service_id INT NOT NULL, titre VARCHAR(20) DEFAULT NULL, information VARCHAR(255) NOT NULL, date_publication DATETIME NOT NULL, date_diffusion DATETIME DEFAULT NULL, statut INT DEFAULT NULL, valide INT DEFAULT NULL, focus INT DEFAULT NULL, differe INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_role (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, role_id INT DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, statut INT DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE facturation');
        $this->addSql('DROP TABLE souscription');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE actualite');
        $this->addSql('DROP TABLE user_role');
        $this->addSql('DROP TABLE role');
    }
}
