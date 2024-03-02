<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240302075254 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nucleo_familiare (id INT AUTO_INCREMENT NOT NULL, famiglia_id INT NOT NULL, cittadino_id INT NOT NULL, ruolo VARCHAR(20) NOT NULL COMMENT \'(DC2Type:ruolo_enum)\', INDEX IDX_1A1E1FE730D47B88 (famiglia_id), INDEX IDX_1A1E1FE7CD69C30B (cittadino_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE nucleo_familiare ADD CONSTRAINT FK_1A1E1FE730D47B88 FOREIGN KEY (famiglia_id) REFERENCES famiglia (id)');
        $this->addSql('ALTER TABLE nucleo_familiare ADD CONSTRAINT FK_1A1E1FE7CD69C30B FOREIGN KEY (cittadino_id) REFERENCES cittadino (id)');
        $this->addSql('ALTER TABLE famiglia_cittadino DROP FOREIGN KEY FK_3CF2779730D47B88');
        $this->addSql('ALTER TABLE famiglia_cittadino DROP FOREIGN KEY FK_3CF27797CD69C30B');
        $this->addSql('DROP TABLE famiglia_cittadino');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE famiglia_cittadino (id INT AUTO_INCREMENT NOT NULL, famiglia_id INT NOT NULL, cittadino_id INT NOT NULL, ruolo VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:ruolo_enum)\', INDEX IDX_3CF2779730D47B88 (famiglia_id), INDEX IDX_3CF27797CD69C30B (cittadino_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE famiglia_cittadino ADD CONSTRAINT FK_3CF2779730D47B88 FOREIGN KEY (famiglia_id) REFERENCES famiglia (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE famiglia_cittadino ADD CONSTRAINT FK_3CF27797CD69C30B FOREIGN KEY (cittadino_id) REFERENCES cittadino (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE nucleo_familiare DROP FOREIGN KEY FK_1A1E1FE730D47B88');
        $this->addSql('ALTER TABLE nucleo_familiare DROP FOREIGN KEY FK_1A1E1FE7CD69C30B');
        $this->addSql('DROP TABLE nucleo_familiare');
    }
}
