<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240229144157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cittadino (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, cognome VARCHAR(255) NOT NULL, codice_fiscale VARCHAR(16) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famiglia (id INT AUTO_INCREMENT NOT NULL, responsabile_id INT DEFAULT NULL, nome VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_1799446271869329 (responsabile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famiglia_cittadino (id INT AUTO_INCREMENT NOT NULL, famiglia_id INT NOT NULL, cittadino_id INT NOT NULL, ruolo VARCHAR(20) NOT NULL COMMENT \'(DC2Type:ruolo_enum)\', INDEX IDX_3CF2779730D47B88 (famiglia_id), INDEX IDX_3CF27797CD69C30B (cittadino_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE famiglia ADD CONSTRAINT FK_1799446271869329 FOREIGN KEY (responsabile_id) REFERENCES cittadino (id)');
        $this->addSql('ALTER TABLE famiglia_cittadino ADD CONSTRAINT FK_3CF2779730D47B88 FOREIGN KEY (famiglia_id) REFERENCES famiglia (id)');
        $this->addSql('ALTER TABLE famiglia_cittadino ADD CONSTRAINT FK_3CF27797CD69C30B FOREIGN KEY (cittadino_id) REFERENCES cittadino (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE famiglia DROP FOREIGN KEY FK_1799446271869329');
        $this->addSql('ALTER TABLE famiglia_cittadino DROP FOREIGN KEY FK_3CF2779730D47B88');
        $this->addSql('ALTER TABLE famiglia_cittadino DROP FOREIGN KEY FK_3CF27797CD69C30B');
        $this->addSql('DROP TABLE cittadino');
        $this->addSql('DROP TABLE famiglia');
        $this->addSql('DROP TABLE famiglia_cittadino');
    }
}
