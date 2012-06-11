<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20120611085828 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // increment price in 3%
        $this->addSql('UPDATE `ds_product` SET `price` = price * 1.03;');

        // $this->throwIrreversibleMigrationException('This migration is irreversible');
        // $this->warnIf(true, 'warn me');
        // $this->skipIf(true, 'skip me');
        // $this->abortIf(true, 'abort me');


        // $schema->hasTable('table');
        // $schema->getTable('table')->getColumn('column');
        // $schema->getTable('table')->hasColumn('column');
        // $schema->getTable('table')->hasForeignKey('fk');
        // $schema->getTable('table')->hasIndex('index');
    }

    public function down(Schema $schema)
    {
        $this->addSql('UPDATE `ds_product` SET `price` = (price - (price * 0.03));');
    }
}
