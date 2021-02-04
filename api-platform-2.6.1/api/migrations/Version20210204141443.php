<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210204141443 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX uniq_d4e6f81be405793');
        $this->addSql('DROP INDEX uniq_d4e6f8185e16f6b');
        $this->addSql('DROP INDEX uniq_d4e6f812d5b0234');
        $this->addSql('DROP INDEX uniq_d4e6f814118d123');
        $this->addSql('DROP INDEX uniq_d4e6f815e9e89cb');
        $this->addSql('DROP INDEX uniq_d4e6f81f0eed3d8');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE UNIQUE INDEX uniq_d4e6f81be405793 ON "address" (post_code)');
        $this->addSql('CREATE UNIQUE INDEX uniq_d4e6f8185e16f6b ON "address" (longitude)');
        $this->addSql('CREATE UNIQUE INDEX uniq_d4e6f812d5b0234 ON "address" (city)');
        $this->addSql('CREATE UNIQUE INDEX uniq_d4e6f814118d123 ON "address" (latitude)');
        $this->addSql('CREATE UNIQUE INDEX uniq_d4e6f815e9e89cb ON "address" (location)');
        $this->addSql('CREATE UNIQUE INDEX uniq_d4e6f81f0eed3d8 ON "address" (street)');
    }
}
