<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210108100910 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meuble_groupe ADD ref_ameublea VARCHAR(255) DEFAULT NULL, ADD fournisseur VARCHAR(255) DEFAULT NULL, ADD name_fournisseur VARCHAR(255) DEFAULT NULL, ADD longueur VARCHAR(255) DEFAULT NULL, ADD largeur INT DEFAULT NULL, ADD hauteur INT DEFAULT NULL, ADD diametre INT DEFAULT NULL, ADD poids INT DEFAULT NULL, ADD eco_mob INT DEFAULT NULL, ADD rack VARCHAR(255) DEFAULT NULL, ADD niveau INT DEFAULT NULL, ADD emplacement INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meuble_groupe DROP ref_ameublea, DROP fournisseur, DROP name_fournisseur, DROP longueur, DROP largeur, DROP hauteur, DROP diametre, DROP poids, DROP eco_mob, DROP rack, DROP niveau, DROP emplacement');
    }
}
