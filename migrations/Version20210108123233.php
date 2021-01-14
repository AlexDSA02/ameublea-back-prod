<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210108123233 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meuble_groupe CHANGE longueur longueur DOUBLE PRECISION DEFAULT NULL, CHANGE largeur largeur DOUBLE PRECISION DEFAULT NULL, CHANGE hauteur hauteur DOUBLE PRECISION DEFAULT NULL, CHANGE diametre diametre DOUBLE PRECISION DEFAULT NULL, CHANGE poids poids DOUBLE PRECISION DEFAULT NULL, CHANGE eco_mob eco_mob DOUBLE PRECISION DEFAULT NULL, CHANGE niveau niveau DOUBLE PRECISION DEFAULT NULL, CHANGE emplacement emplacement DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meuble_groupe CHANGE longueur longueur INT DEFAULT NULL, CHANGE largeur largeur INT DEFAULT NULL, CHANGE hauteur hauteur INT DEFAULT NULL, CHANGE diametre diametre INT DEFAULT NULL, CHANGE poids poids INT DEFAULT NULL, CHANGE eco_mob eco_mob INT DEFAULT NULL, CHANGE niveau niveau INT DEFAULT NULL, CHANGE emplacement emplacement INT DEFAULT NULL');
    }
}
