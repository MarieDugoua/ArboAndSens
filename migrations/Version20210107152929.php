<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210107152929 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE feed_back (id INT AUTO_INCREMENT NOT NULL, userid_id INT NOT NULL, productid_id INT NOT NULL, comment LONGTEXT NOT NULL, feedback DOUBLE PRECISION NOT NULL, INDEX IDX_ED592A6058E0A285 (userid_id), INDEX IDX_ED592A60AF89CCED (productid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, productid_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_C53D045FAF89CCED (productid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_history (id INT AUTO_INCREMENT NOT NULL, userid_id INT NOT NULL, title VARCHAR(255) NOT NULL, orderdate DATETIME NOT NULL, INDEX IDX_D1C0D90058E0A285 (userid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payment_info (id INT AUTO_INCREMENT NOT NULL, userid_id INT NOT NULL, title VARCHAR(255) NOT NULL, cardnumber INT NOT NULL, expiredate DATETIME NOT NULL, securitycode INT NOT NULL, INDEX IDX_EA0AA62358E0A285 (userid_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, categoryid_id INT NOT NULL, order_history_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_D34A04ADA9FA940B (categoryid_id), INDEX IDX_D34A04ADADDF7907 (order_history_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE feed_back ADD CONSTRAINT FK_ED592A6058E0A285 FOREIGN KEY (userid_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE feed_back ADD CONSTRAINT FK_ED592A60AF89CCED FOREIGN KEY (productid_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FAF89CCED FOREIGN KEY (productid_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE order_history ADD CONSTRAINT FK_D1C0D90058E0A285 FOREIGN KEY (userid_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE payment_info ADD CONSTRAINT FK_EA0AA62358E0A285 FOREIGN KEY (userid_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADA9FA940B FOREIGN KEY (categoryid_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADADDF7907 FOREIGN KEY (order_history_id) REFERENCES order_history (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADA9FA940B');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADADDF7907');
        $this->addSql('ALTER TABLE feed_back DROP FOREIGN KEY FK_ED592A60AF89CCED');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FAF89CCED');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE feed_back');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE order_history');
        $this->addSql('DROP TABLE payment_info');
        $this->addSql('DROP TABLE product');
    }
}
