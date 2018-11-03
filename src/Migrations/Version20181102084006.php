<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181102084006 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE facturation (id INT AUTO_INCREMENT NOT NULL, souscription_id INT DEFAULT NULL, montant INT DEFAULT NULL, solde_initial INT DEFAULT NULL, solde_restant INT DEFAULT NULL, description VARCHAR(255) NOT NULL, date DATETIME DEFAULT NULL, statut INT DEFAULT NULL, tel VARCHAR(255) DEFAULT NULL, smsc VARCHAR(255) DEFAULT NULL, service_code VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE actualite (id INT AUTO_INCREMENT NOT NULL, editeur_id INT NOT NULL, service_id INT NOT NULL, titre VARCHAR(20) DEFAULT NULL, information VARCHAR(255) NOT NULL, date_publication DATETIME NOT NULL, date_diffusion DATETIME DEFAULT NULL, statut INT DEFAULT NULL, valide INT DEFAULT NULL, focus INT DEFAULT NULL, differe INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE facturation');
        $this->addSql('DROP TABLE actualite');
    }
}
