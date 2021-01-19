<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210107160239 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_history_product (order_history_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_3C24EB1BADDF7907 (order_history_id), INDEX IDX_3C24EB1B4584665A (product_id), PRIMARY KEY(order_history_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_history_product ADD CONSTRAINT FK_3C24EB1BADDF7907 FOREIGN KEY (order_history_id) REFERENCES order_history (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_history_product ADD CONSTRAINT FK_3C24EB1B4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F8158E0A285');
        $this->addSql('DROP INDEX IDX_D4E6F8158E0A285 ON address');
        $this->addSql('ALTER TABLE address CHANGE userid_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D4E6F81A76ED395 ON address (user_id)');
        $this->addSql('ALTER TABLE feed_back DROP FOREIGN KEY FK_ED592A6058E0A285');
        $this->addSql('ALTER TABLE feed_back DROP FOREIGN KEY FK_ED592A60AF89CCED');
        $this->addSql('DROP INDEX IDX_ED592A60AF89CCED ON feed_back');
        $this->addSql('DROP INDEX IDX_ED592A6058E0A285 ON feed_back');
        $this->addSql('ALTER TABLE feed_back ADD user_id INT NOT NULL, ADD product_id INT NOT NULL, DROP userid_id, DROP productid_id');
        $this->addSql('ALTER TABLE feed_back ADD CONSTRAINT FK_ED592A60A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE feed_back ADD CONSTRAINT FK_ED592A604584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_ED592A60A76ED395 ON feed_back (user_id)');
        $this->addSql('CREATE INDEX IDX_ED592A604584665A ON feed_back (product_id)');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045FAF89CCED');
        $this->addSql('DROP INDEX IDX_C53D045FAF89CCED ON image');
        $this->addSql('ALTER TABLE image CHANGE productid_id product_id INT NOT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F4584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_C53D045F4584665A ON image (product_id)');
        $this->addSql('ALTER TABLE order_history DROP FOREIGN KEY FK_D1C0D90058E0A285');
        $this->addSql('DROP INDEX IDX_D1C0D90058E0A285 ON order_history');
        $this->addSql('ALTER TABLE order_history CHANGE userid_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE order_history ADD CONSTRAINT FK_D1C0D900A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D1C0D900A76ED395 ON order_history (user_id)');
        $this->addSql('ALTER TABLE payment_info DROP FOREIGN KEY FK_EA0AA62358E0A285');
        $this->addSql('DROP INDEX IDX_EA0AA62358E0A285 ON payment_info');
        $this->addSql('ALTER TABLE payment_info ADD user_id INT NOT NULL, ADD securitynumber INT NOT NULL, DROP userid_id, DROP securitycode');
        $this->addSql('ALTER TABLE payment_info ADD CONSTRAINT FK_EA0AA623A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_EA0AA623A76ED395 ON payment_info (user_id)');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADA9FA940B');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADADDF7907');
        $this->addSql('DROP INDEX IDX_D34A04ADADDF7907 ON product');
        $this->addSql('DROP INDEX IDX_D34A04ADA9FA940B ON product');
        $this->addSql('ALTER TABLE product ADD category_id INT NOT NULL, DROP categoryid_id, DROP order_history_id');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_D34A04AD12469DE2 ON product (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE order_history_product');
        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81A76ED395');
        $this->addSql('DROP INDEX IDX_D4E6F81A76ED395 ON address');
        $this->addSql('ALTER TABLE address CHANGE user_id userid_id INT NOT NULL');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F8158E0A285 FOREIGN KEY (userid_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D4E6F8158E0A285 ON address (userid_id)');
        $this->addSql('ALTER TABLE feed_back DROP FOREIGN KEY FK_ED592A60A76ED395');
        $this->addSql('ALTER TABLE feed_back DROP FOREIGN KEY FK_ED592A604584665A');
        $this->addSql('DROP INDEX IDX_ED592A60A76ED395 ON feed_back');
        $this->addSql('DROP INDEX IDX_ED592A604584665A ON feed_back');
        $this->addSql('ALTER TABLE feed_back ADD userid_id INT NOT NULL, ADD productid_id INT NOT NULL, DROP user_id, DROP product_id');
        $this->addSql('ALTER TABLE feed_back ADD CONSTRAINT FK_ED592A6058E0A285 FOREIGN KEY (userid_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE feed_back ADD CONSTRAINT FK_ED592A60AF89CCED FOREIGN KEY (productid_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_ED592A60AF89CCED ON feed_back (productid_id)');
        $this->addSql('CREATE INDEX IDX_ED592A6058E0A285 ON feed_back (userid_id)');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F4584665A');
        $this->addSql('DROP INDEX IDX_C53D045F4584665A ON image');
        $this->addSql('ALTER TABLE image CHANGE product_id productid_id INT NOT NULL');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FAF89CCED FOREIGN KEY (productid_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_C53D045FAF89CCED ON image (productid_id)');
        $this->addSql('ALTER TABLE order_history DROP FOREIGN KEY FK_D1C0D900A76ED395');
        $this->addSql('DROP INDEX IDX_D1C0D900A76ED395 ON order_history');
        $this->addSql('ALTER TABLE order_history CHANGE user_id userid_id INT NOT NULL');
        $this->addSql('ALTER TABLE order_history ADD CONSTRAINT FK_D1C0D90058E0A285 FOREIGN KEY (userid_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D1C0D90058E0A285 ON order_history (userid_id)');
        $this->addSql('ALTER TABLE payment_info DROP FOREIGN KEY FK_EA0AA623A76ED395');
        $this->addSql('DROP INDEX IDX_EA0AA623A76ED395 ON payment_info');
        $this->addSql('ALTER TABLE payment_info ADD userid_id INT NOT NULL, ADD securitycode INT NOT NULL, DROP user_id, DROP securitynumber');
        $this->addSql('ALTER TABLE payment_info ADD CONSTRAINT FK_EA0AA62358E0A285 FOREIGN KEY (userid_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_EA0AA62358E0A285 ON payment_info (userid_id)');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('DROP INDEX IDX_D34A04AD12469DE2 ON product');
        $this->addSql('ALTER TABLE product ADD order_history_id INT NOT NULL, CHANGE category_id categoryid_id INT NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADA9FA940B FOREIGN KEY (categoryid_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADADDF7907 FOREIGN KEY (order_history_id) REFERENCES order_history (id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADADDF7907 ON product (order_history_id)');
        $this->addSql('CREATE INDEX IDX_D34A04ADA9FA940B ON product (categoryid_id)');
    }
}
