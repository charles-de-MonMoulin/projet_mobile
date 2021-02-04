<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210204140938 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE user_id_seq1 CASCADE');
        $this->addSql('CREATE SEQUENCE "address_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "address" (id INT NOT NULL, city VARCHAR(180) NOT NULL, street VARCHAR(180) NOT NULL, post_code VARCHAR(180) NOT NULL, location VARCHAR(180) NOT NULL, longitude VARCHAR(180) NOT NULL, latitude VARCHAR(180) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D4E6F812D5B0234 ON "address" (city)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D4E6F81F0EED3D8 ON "address" (street)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D4E6F81BE405793 ON "address" (post_code)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D4E6F815E9E89CB ON "address" (location)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D4E6F8185E16F6B ON "address" (longitude)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D4E6F814118D123 ON "address" (latitude)');
        $this->addSql('ALTER TABLE "user" ADD address_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D649F5B7AF75 FOREIGN KEY (address_id) REFERENCES "address" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_8D93D649F5B7AF75 ON "user" (address_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D649F5B7AF75');
        $this->addSql('DROP SEQUENCE "address_id_seq" CASCADE');
        $this->addSql('CREATE SEQUENCE user_id_seq1 INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP TABLE "address"');
        $this->addSql('DROP INDEX IDX_8D93D649F5B7AF75');
        $this->addSql('ALTER TABLE "user" DROP address_id');
        $this->addSql('CREATE SEQUENCE user_id_seq');
        $this->addSql('SELECT setval(\'user_id_seq\', (SELECT MAX(id) FROM "user"))');
        $this->addSql('ALTER TABLE "user" ALTER id SET DEFAULT nextval(\'user_id_seq\')');
    }
}
