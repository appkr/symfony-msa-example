<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210316113638 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'create singers table';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('CREATE TABLE `singers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` TIMESTAMP NOT NULL, 
  `updated_at` TIMESTAMP NOT NULL, 
  `created_by` VARCHAR(40) NULL, 
  `updated_by` VARCHAR(40) NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP table singers;');
    }
}
