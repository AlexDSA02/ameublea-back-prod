<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200907125841 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE IF NOT EXISTS ambiance_meuble_groupe (ambiance_id INT NOT NULL, meuble_groupe_id INT NOT NULL, INDEX IDX_AD298C0637A05A93 (ambiance_id), INDEX IDX_AD298C0675E22ACA (meuble_groupe_id), PRIMARY KEY(ambiance_id, meuble_groupe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ambiance_meuble_groupe ADD CONSTRAINT FK_AD298C0637A05A93 FOREIGN KEY (ambiance_id) REFERENCES ambiance (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ambiance_meuble_groupe ADD CONSTRAINT FK_AD298C0675E22ACA FOREIGN KEY (meuble_groupe_id) REFERENCES meuble_groupe (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ambiance_meuble_groupe');
    }
}
