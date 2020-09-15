<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200914130319 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ambiance ADD link_picture VARCHAR(255) DEFAULT NULL');
        $this->addSql('DROP INDEX test ON ambiance_meuble_groupe');
        $this->addSql('ALTER TABLE ambiance_meuble_groupe ADD PRIMARY KEY (ambiance_id, meuble_groupe_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ambiance DROP link_picture');
        $this->addSql('ALTER TABLE ambiance_meuble_groupe DROP INDEX primary, ADD INDEX test (ambiance_id, meuble_groupe_id)');
    }
}
