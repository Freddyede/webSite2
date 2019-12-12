<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191212170926 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE singers DROP profil');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6ADD51D0F7');
        $this->addSql('DROP INDEX UNIQ_E01FBE6ADD51D0F7 ON images');
        $this->addSql('ALTER TABLE images CHANGE sources_id singer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A271FD47C FOREIGN KEY (singer_id) REFERENCES singers (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E01FBE6A271FD47C ON images (singer_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A271FD47C');
        $this->addSql('DROP INDEX UNIQ_E01FBE6A271FD47C ON images');
        $this->addSql('ALTER TABLE images CHANGE singer_id sources_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6ADD51D0F7 FOREIGN KEY (sources_id) REFERENCES singers (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E01FBE6ADD51D0F7 ON images (sources_id)');
        $this->addSql('ALTER TABLE singers ADD profil LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
