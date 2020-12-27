<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200916075854 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meuble_groupe DROP FOREIGN KEY FK_EE87A5F513A81318');
        $this->addSql('DROP INDEX IDX_EE87A5F513A81318 ON meuble_groupe');
        $this->addSql('ALTER TABLE meuble_groupe DROP piece_ambiance_meuble_groupe_id');
        $this->addSql('ALTER TABLE piece DROP FOREIGN KEY FK_44CA0B2313A81318');
        $this->addSql('DROP INDEX IDX_44CA0B2313A81318 ON piece');
        $this->addSql('ALTER TABLE piece DROP piece_ambiance_meuble_groupe_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meuble_groupe ADD piece_ambiance_meuble_groupe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE meuble_groupe ADD CONSTRAINT FK_EE87A5F513A81318 FOREIGN KEY (piece_ambiance_meuble_groupe_id) REFERENCES piece_ambiance_meuble_groupe (id)');
        $this->addSql('CREATE INDEX IDX_EE87A5F513A81318 ON meuble_groupe (piece_ambiance_meuble_groupe_id)');
        $this->addSql('ALTER TABLE piece ADD piece_ambiance_meuble_groupe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE piece ADD CONSTRAINT FK_44CA0B2313A81318 FOREIGN KEY (piece_ambiance_meuble_groupe_id) REFERENCES piece_ambiance_meuble_groupe (id)');
        $this->addSql('CREATE INDEX IDX_44CA0B2313A81318 ON piece (piece_ambiance_meuble_groupe_id)');
    }
}
