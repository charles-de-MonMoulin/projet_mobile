<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210205150014 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE "format_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "game_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "format" (id INT NOT NULL, game_id INT DEFAULT NULL, name VARCHAR(180) NOT NULL, description VARCHAR(180) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DEBA72DF5E237E06 ON "format" (name)');
        $this->addSql('CREATE INDEX IDX_DEBA72DFE48FD905 ON "format" (game_id)');
        $this->addSql('CREATE TABLE "game" (id INT NOT NULL, name VARCHAR(180) NOT NULL, description VARCHAR(180) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_232B318C5E237E06 ON "game" (name)');
        $this->addSql('CREATE TABLE users_formats (user_id INT NOT NULL, format_id INT NOT NULL, PRIMARY KEY(user_id, format_id))');
        $this->addSql('CREATE INDEX IDX_FDBCCEF6A76ED395 ON users_formats (user_id)');
        $this->addSql('CREATE INDEX IDX_FDBCCEF6D629F605 ON users_formats (format_id)');
        $this->addSql('ALTER TABLE "format" ADD CONSTRAINT FK_DEBA72DFE48FD905 FOREIGN KEY (game_id) REFERENCES "game" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_formats ADD CONSTRAINT FK_FDBCCEF6A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_formats ADD CONSTRAINT FK_FDBCCEF6D629F605 FOREIGN KEY (format_id) REFERENCES "format" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE users_formats DROP CONSTRAINT FK_FDBCCEF6D629F605');
        $this->addSql('ALTER TABLE "format" DROP CONSTRAINT FK_DEBA72DFE48FD905');
        $this->addSql('DROP SEQUENCE "format_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "game_id_seq" CASCADE');
        $this->addSql('DROP TABLE "format"');
        $this->addSql('DROP TABLE "game"');
        $this->addSql('DROP TABLE users_formats');
    }
}
