<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241106110930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lieu_type_lieu (lieu_id INT NOT NULL, type_lieu_id INT NOT NULL, INDEX IDX_973F23E66AB213CC (lieu_id), INDEX IDX_973F23E642937C39 (type_lieu_id), PRIMARY KEY(lieu_id, type_lieu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lieu_type_lieu ADD CONSTRAINT FK_973F23E66AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lieu_type_lieu ADD CONSTRAINT FK_973F23E642937C39 FOREIGN KEY (type_lieu_id) REFERENCES type_lieu (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lieu_type_lieu DROP FOREIGN KEY FK_973F23E66AB213CC');
        $this->addSql('ALTER TABLE lieu_type_lieu DROP FOREIGN KEY FK_973F23E642937C39');
        $this->addSql('DROP TABLE lieu_type_lieu');
    }
}
