<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241114111245 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis ADD commentaire LONGTEXT NOT NULL, DROP com_avis, CHANGE niv_avis note INT NOT NULL');
        $this->addSql('ALTER TABLE type_lieu CHANGE type nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user DROP nom, DROP prenom, DROP date_naissance, DROP nb_avis, DROP is_verfified');
        $this->addSql('ALTER TABLE user RENAME INDEX uniq_identifier_email TO UNIQ_8D93D649E7927C74');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis ADD com_avis VARCHAR(255) NOT NULL, DROP commentaire, CHANGE note niv_avis INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD date_naissance DATE NOT NULL, ADD nb_avis INT NOT NULL, ADD is_verfified TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE user RENAME INDEX uniq_8d93d649e7927c74 TO UNIQ_IDENTIFIER_EMAIL');
        $this->addSql('ALTER TABLE type_lieu CHANGE nom type VARCHAR(255) NOT NULL');
    }
}
