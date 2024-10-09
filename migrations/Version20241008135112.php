<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241008135112 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE history (id INT AUTO_INCREMENT NOT NULL, medication_id_id INT NOT NULL, take_date DATE NOT NULL, take_time TIME NOT NULL, status VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_27BA704BE6161CBD (medication_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE medication (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, dose NUMERIC(10, 4) NOT NULL, unit VARCHAR(100) NOT NULL, frequency VARCHAR(150) NOT NULL, duration VARCHAR(150) NOT NULL, notes LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, reminder_id_id INT NOT NULL, message VARCHAR(255) NOT NULL, sent_time TIME NOT NULL, response VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_BF5476CA3DE1FAE7 (reminder_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reminder (id INT AUTO_INCREMENT NOT NULL, medication_id_id INT NOT NULL, taking_time TIME NOT NULL, recurrence_pattern VARCHAR(100) NOT NULL, status VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_40374F40E6161CBD (medication_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, birth_date DATETIME NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE history ADD CONSTRAINT FK_27BA704BE6161CBD FOREIGN KEY (medication_id_id) REFERENCES medication (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA3DE1FAE7 FOREIGN KEY (reminder_id_id) REFERENCES reminder (id)');
        $this->addSql('ALTER TABLE reminder ADD CONSTRAINT FK_40374F40E6161CBD FOREIGN KEY (medication_id_id) REFERENCES medication (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE history DROP FOREIGN KEY FK_27BA704BE6161CBD');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CA3DE1FAE7');
        $this->addSql('ALTER TABLE reminder DROP FOREIGN KEY FK_40374F40E6161CBD');
        $this->addSql('DROP TABLE history');
        $this->addSql('DROP TABLE medication');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE reminder');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
