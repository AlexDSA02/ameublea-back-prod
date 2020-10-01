<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200916080105 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE piece_ambiance_meuble_groupe ADD piece_id INT DEFAULT NULL, ADD ambiance_id INT DEFAULT NULL, ADD meuble_groupe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE piece_ambiance_meuble_groupe ADD CONSTRAINT FK_8D5270A5C40FCFA8 FOREIGN KEY (piece_id) REFERENCES piece (id)');
        $this->addSql('ALTER TABLE piece_ambiance_meuble_groupe ADD CONSTRAINT FK_8D5270A537A05A93 FOREIGN KEY (ambiance_id) REFERENCES ambiance (id)');
        $this->addSql('ALTER TABLE piece_ambiance_meuble_groupe ADD CONSTRAINT FK_8D5270A575E22ACA FOREIGN KEY (meuble_groupe_id) REFERENCES meuble_groupe (id)');
        $this->addSql('CREATE INDEX IDX_8D5270A5C40FCFA8 ON piece_ambiance_meuble_groupe (piece_id)');
        $this->addSql('CREATE INDEX IDX_8D5270A537A05A93 ON piece_ambiance_meuble_groupe (ambiance_id)');
        $this->addSql('CREATE INDEX IDX_8D5270A575E22ACA ON piece_ambiance_meuble_groupe (meuble_groupe_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE piece_ambiance_meuble_groupe DROP FOREIGN KEY FK_8D5270A5C40FCFA8');
        $this->addSql('ALTER TABLE piece_ambiance_meuble_groupe DROP FOREIGN KEY FK_8D5270A537A05A93');
        $this->addSql('ALTER TABLE piece_ambiance_meuble_groupe DROP FOREIGN KEY FK_8D5270A575E22ACA');
        $this->addSql('DROP INDEX IDX_8D5270A5C40FCFA8 ON piece_ambiance_meuble_groupe');
        $this->addSql('DROP INDEX IDX_8D5270A537A05A93 ON piece_ambiance_meuble_groupe');
        $this->addSql('DROP INDEX IDX_8D5270A575E22ACA ON piece_ambiance_meuble_groupe');
        $this->addSql('ALTER TABLE piece_ambiance_meuble_groupe DROP piece_id, DROP ambiance_id, DROP meuble_groupe_id');
    }
}
