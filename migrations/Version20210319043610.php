<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20210319043610 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('CREATE TABLE albums (
id INT AUTO_INCREMENT NOT NULL, 
singer_id INT DEFAULT NULL, 
title VARCHAR(255) NOT NULL, 
published DATE NOT NULL, 
created_at DATETIME NOT NULL, 
updated_at DATETIME NOT NULL, 
created_by VARCHAR(40) DEFAULT NULL, 
updated_by VARCHAR(40) DEFAULT NULL, 
INDEX IDX_SINGER_ID (singer_id), 
PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB');

        $this->addSql('CREATE TABLE songs (
id INT AUTO_INCREMENT NOT NULL, 
album_id INT DEFAULT NULL, 
title VARCHAR(255) NOT NULL, 
play_time VARCHAR(10) NOT NULL, 
created_at DATETIME NOT NULL, 
updated_at DATETIME NOT NULL, 
created_by VARCHAR(40) DEFAULT NULL, 
updated_by VARCHAR(40) DEFAULT NULL, 
INDEX IDX_ALBUM_ID (album_id), 
PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        $this->addSql('DROP TABLE albums');
        $this->addSql('DROP TABLE songs');
    }
}
