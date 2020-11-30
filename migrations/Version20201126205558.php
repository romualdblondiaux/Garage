<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201126205558 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE IF NOT EXISTS `info_sup` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `marque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `modele` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `km` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `proprio` int(11) NOT NULL,
            `cylindree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `puissance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `carburant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `annee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `transmission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
            `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            `opt` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, info_sup_id_id INT NOT NULL, url VARCHAR(255) NOT NULL, caption VARCHAR(255) NOT NULL, INDEX IDX_C53D045FCE31CA34 (info_sup_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FCE31CA34 FOREIGN KEY (info_sup_id_id) REFERENCES info_sup (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE image');
    }
}
