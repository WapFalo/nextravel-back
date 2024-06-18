<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240606043016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annee_user (id INT AUTO_INCREMENT NOT NULL, annee INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annee_user_utilisateur (annee_user_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_F9D42BD988EEA12F (annee_user_id), INDEX IDX_F9D42BD9FB88E14F (utilisateur_id), PRIMARY KEY(annee_user_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annee_user_destination (annee_user_id INT NOT NULL, destination_id INT NOT NULL, INDEX IDX_DA0E76C088EEA12F (annee_user_id), INDEX IDX_DA0E76C0816C6140 (destination_id), PRIMARY KEY(annee_user_id, destination_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, ecole_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_8F87BF96E97A7F4E (ecole_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe_user (id INT AUTO_INCREMENT NOT NULL, annee INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe_user_utilisateur (classe_user_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_34415197DCF7B3F4 (classe_user_id), INDEX IDX_34415197FB88E14F (utilisateur_id), PRIMARY KEY(classe_user_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe_user_classe (classe_user_id INT NOT NULL, classe_id INT NOT NULL, INDEX IDX_46CC660ADCF7B3F4 (classe_user_id), INDEX IDX_46CC660A8F5EA509 (classe_id), PRIMARY KEY(classe_user_id, classe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaires (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, destination_id_id INT NOT NULL, sujet_id_id INT NOT NULL, date DATE NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_D9BEC0C49D86650F (user_id_id), INDEX IDX_D9BEC0C42E393FE4 (destination_id_id), INDEX IDX_D9BEC0C411F84977 (sujet_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE destination (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, pays VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, quartiers INT NOT NULL, cout INT NOT NULL, transport INT NOT NULL, meteo INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, destination_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, date_creation DATE NOT NULL, INDEX IDX_4B98C212E393FE4 (destination_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_user (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_user_role_groupe (groupe_user_id INT NOT NULL, role_groupe_id INT NOT NULL, INDEX IDX_1061DF2A610934DB (groupe_user_id), INDEX IDX_1061DF2A2BB1E650 (role_groupe_id), PRIMARY KEY(groupe_user_id, role_groupe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_user_utilisateur (groupe_user_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_A2E2D109610934DB (groupe_user_id), INDEX IDX_A2E2D109FB88E14F (utilisateur_id), PRIMARY KEY(groupe_user_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_user_groupe (groupe_user_id INT NOT NULL, groupe_id INT NOT NULL, INDEX IDX_EE36E4D2610934DB (groupe_user_id), INDEX IDX_EE36E4D27A45358C (groupe_id), PRIMARY KEY(groupe_user_id, groupe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, groupe_id_id INT DEFAULT NULL, user_id_id INT NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_B6BD307F2AE95007 (groupe_id_id), INDEX IDX_B6BD307F9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_groupe (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sujet (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, role_id_id INT NOT NULL, groupe_id_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, INDEX IDX_1D1C63B388987678 (role_id_id), INDEX IDX_1D1C63B32AE95007 (groupe_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annee_user_utilisateur ADD CONSTRAINT FK_F9D42BD988EEA12F FOREIGN KEY (annee_user_id) REFERENCES annee_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annee_user_utilisateur ADD CONSTRAINT FK_F9D42BD9FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annee_user_destination ADD CONSTRAINT FK_DA0E76C088EEA12F FOREIGN KEY (annee_user_id) REFERENCES annee_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE annee_user_destination ADD CONSTRAINT FK_DA0E76C0816C6140 FOREIGN KEY (destination_id) REFERENCES destination (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe ADD CONSTRAINT FK_8F87BF96E97A7F4E FOREIGN KEY (ecole_id_id) REFERENCES ecole (id)');
        $this->addSql('ALTER TABLE classe_user_utilisateur ADD CONSTRAINT FK_34415197DCF7B3F4 FOREIGN KEY (classe_user_id) REFERENCES classe_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe_user_utilisateur ADD CONSTRAINT FK_34415197FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe_user_classe ADD CONSTRAINT FK_46CC660ADCF7B3F4 FOREIGN KEY (classe_user_id) REFERENCES classe_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe_user_classe ADD CONSTRAINT FK_46CC660A8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C49D86650F FOREIGN KEY (user_id_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C42E393FE4 FOREIGN KEY (destination_id_id) REFERENCES destination (id)');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C411F84977 FOREIGN KEY (sujet_id_id) REFERENCES sujet (id)');
        $this->addSql('ALTER TABLE groupe ADD CONSTRAINT FK_4B98C212E393FE4 FOREIGN KEY (destination_id_id) REFERENCES destination (id)');
        $this->addSql('ALTER TABLE groupe_user_role_groupe ADD CONSTRAINT FK_1061DF2A610934DB FOREIGN KEY (groupe_user_id) REFERENCES groupe_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_user_role_groupe ADD CONSTRAINT FK_1061DF2A2BB1E650 FOREIGN KEY (role_groupe_id) REFERENCES role_groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_user_utilisateur ADD CONSTRAINT FK_A2E2D109610934DB FOREIGN KEY (groupe_user_id) REFERENCES groupe_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_user_utilisateur ADD CONSTRAINT FK_A2E2D109FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_user_groupe ADD CONSTRAINT FK_EE36E4D2610934DB FOREIGN KEY (groupe_user_id) REFERENCES groupe_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_user_groupe ADD CONSTRAINT FK_EE36E4D27A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F2AE95007 FOREIGN KEY (groupe_id_id) REFERENCES groupe (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F9D86650F FOREIGN KEY (user_id_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B388987678 FOREIGN KEY (role_id_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B32AE95007 FOREIGN KEY (groupe_id_id) REFERENCES groupe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annee_user_utilisateur DROP FOREIGN KEY FK_F9D42BD988EEA12F');
        $this->addSql('ALTER TABLE annee_user_utilisateur DROP FOREIGN KEY FK_F9D42BD9FB88E14F');
        $this->addSql('ALTER TABLE annee_user_destination DROP FOREIGN KEY FK_DA0E76C088EEA12F');
        $this->addSql('ALTER TABLE annee_user_destination DROP FOREIGN KEY FK_DA0E76C0816C6140');
        $this->addSql('ALTER TABLE classe DROP FOREIGN KEY FK_8F87BF96E97A7F4E');
        $this->addSql('ALTER TABLE classe_user_utilisateur DROP FOREIGN KEY FK_34415197DCF7B3F4');
        $this->addSql('ALTER TABLE classe_user_utilisateur DROP FOREIGN KEY FK_34415197FB88E14F');
        $this->addSql('ALTER TABLE classe_user_classe DROP FOREIGN KEY FK_46CC660ADCF7B3F4');
        $this->addSql('ALTER TABLE classe_user_classe DROP FOREIGN KEY FK_46CC660A8F5EA509');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C49D86650F');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C42E393FE4');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C411F84977');
        $this->addSql('ALTER TABLE groupe DROP FOREIGN KEY FK_4B98C212E393FE4');
        $this->addSql('ALTER TABLE groupe_user_role_groupe DROP FOREIGN KEY FK_1061DF2A610934DB');
        $this->addSql('ALTER TABLE groupe_user_role_groupe DROP FOREIGN KEY FK_1061DF2A2BB1E650');
        $this->addSql('ALTER TABLE groupe_user_utilisateur DROP FOREIGN KEY FK_A2E2D109610934DB');
        $this->addSql('ALTER TABLE groupe_user_utilisateur DROP FOREIGN KEY FK_A2E2D109FB88E14F');
        $this->addSql('ALTER TABLE groupe_user_groupe DROP FOREIGN KEY FK_EE36E4D2610934DB');
        $this->addSql('ALTER TABLE groupe_user_groupe DROP FOREIGN KEY FK_EE36E4D27A45358C');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F2AE95007');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F9D86650F');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B388987678');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B32AE95007');
        $this->addSql('DROP TABLE annee_user');
        $this->addSql('DROP TABLE annee_user_utilisateur');
        $this->addSql('DROP TABLE annee_user_destination');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE classe_user');
        $this->addSql('DROP TABLE classe_user_utilisateur');
        $this->addSql('DROP TABLE classe_user_classe');
        $this->addSql('DROP TABLE commentaires');
        $this->addSql('DROP TABLE destination');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE groupe_user');
        $this->addSql('DROP TABLE groupe_user_role_groupe');
        $this->addSql('DROP TABLE groupe_user_utilisateur');
        $this->addSql('DROP TABLE groupe_user_groupe');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE role_groupe');
        $this->addSql('DROP TABLE sujet');
        $this->addSql('DROP TABLE utilisateur');
    }
}
