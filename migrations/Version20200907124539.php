<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200907124539 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE IF NOT EXISTS meuble_groupe (id INT AUTO_INCREMENT NOT NULL, nom_meuble VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS meuble_unique (id INT AUTO_INCREMENT NOT NULL, meuble_groupe_id INT NOT NULL, facture VARCHAR(255) DEFAULT NULL, date_achat DATE DEFAULT NULL, prix_achat DOUBLE PRECISION DEFAULT NULL, INDEX IDX_5A9C7FA375E22ACA (meuble_groupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS ambiance (id INT AUTO_INCREMENT NOT NULL, prix_ambiance INT NOT NULL, nom_ambiance VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE meuble_unique ADD CONSTRAINT FK_5A9C7FA375E22ACA FOREIGN KEY (meuble_groupe_id) REFERENCES meuble_groupe (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meuble_unique DROP FOREIGN KEY FK_5A9C7FA375E22ACA');
        $this->addSql('DROP TABLE ambiance');
        $this->addSql('DROP TABLE meuble_groupe');
        $this->addSql('DROP TABLE meuble_unique');
    }
}
