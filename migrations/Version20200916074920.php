<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200916074920 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE piece_ambiance_meuble_groupe (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE piece_ambiance DROP FOREIGN KEY piece_ambiance_ibfk_1');
        $this->addSql('DROP INDEX meuble_groupe_id ON piece_ambiance');
        $this->addSql('ALTER TABLE piece_ambiance DROP meuble_groupe_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE piece_ambiance_meuble_groupe');
        $this->addSql('ALTER TABLE piece_ambiance ADD meuble_groupe_id INT NOT NULL');
        $this->addSql('ALTER TABLE piece_ambiance ADD CONSTRAINT piece_ambiance_ibfk_1 FOREIGN KEY (meuble_groupe_id) REFERENCES meuble_groupe (id)');
        $this->addSql('CREATE INDEX meuble_groupe_id ON piece_ambiance (meuble_groupe_id)');
    }
}
