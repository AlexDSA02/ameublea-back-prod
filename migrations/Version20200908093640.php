<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200908093640 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B37A05A93');
        //$this->addSql('DROP INDEX IDX_8B27C52B37A05A93 ON devis');
        //$this->addSql('ALTER TABLE devis DROP ambiance_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE devis ADD ambiance_id INT NOT NULL');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B37A05A93 FOREIGN KEY (ambiance_id) REFERENCES ambiance (id)');
        $this->addSql('CREATE INDEX IDX_8B27C52B37A05A93 ON devis (ambiance_id)');
    }
}
