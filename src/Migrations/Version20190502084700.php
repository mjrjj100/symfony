<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190502084700 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE faction (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, level INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_race (personnage_id INT NOT NULL, race_id INT NOT NULL, INDEX IDX_832FDEC15E315342 (personnage_id), INDEX IDX_832FDEC16E59D40D (race_id), PRIMARY KEY(personnage_id, race_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_faction (personnage_id INT NOT NULL, faction_id INT NOT NULL, INDEX IDX_AF1BB3915E315342 (personnage_id), INDEX IDX_AF1BB3914448F8DA (faction_id), PRIMARY KEY(personnage_id, faction_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_job (personnage_id INT NOT NULL, job_id INT NOT NULL, INDEX IDX_88099845E315342 (personnage_id), INDEX IDX_8809984BE04EA9 (job_id), PRIMARY KEY(personnage_id, job_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personnage_race ADD CONSTRAINT FK_832FDEC15E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_race ADD CONSTRAINT FK_832FDEC16E59D40D FOREIGN KEY (race_id) REFERENCES race (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_faction ADD CONSTRAINT FK_AF1BB3915E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_faction ADD CONSTRAINT FK_AF1BB3914448F8DA FOREIGN KEY (faction_id) REFERENCES faction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_job ADD CONSTRAINT FK_88099845E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_job ADD CONSTRAINT FK_8809984BE04EA9 FOREIGN KEY (job_id) REFERENCES job (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE personnage_faction DROP FOREIGN KEY FK_AF1BB3914448F8DA');
        $this->addSql('ALTER TABLE personnage_job DROP FOREIGN KEY FK_8809984BE04EA9');
        $this->addSql('ALTER TABLE personnage_race DROP FOREIGN KEY FK_832FDEC15E315342');
        $this->addSql('ALTER TABLE personnage_faction DROP FOREIGN KEY FK_AF1BB3915E315342');
        $this->addSql('ALTER TABLE personnage_job DROP FOREIGN KEY FK_88099845E315342');
        $this->addSql('ALTER TABLE personnage_race DROP FOREIGN KEY FK_832FDEC16E59D40D');
        $this->addSql('DROP TABLE faction');
        $this->addSql('DROP TABLE job');
        $this->addSql('DROP TABLE personnage');
        $this->addSql('DROP TABLE personnage_race');
        $this->addSql('DROP TABLE personnage_faction');
        $this->addSql('DROP TABLE personnage_job');
        $this->addSql('DROP TABLE race');
    }
}
