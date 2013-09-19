<?php
/**
 * Created by JetBrains PhpStorm.
 * User: svatoslavzilicev
 * Date: 05.09.13
 * Time: 0:22
 * To change this template use File | Settings | File Templates.
 */ 
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

$installer->run("
DROP TABLE IF EXISTS {$this->getTable('sc_icepop')};
CREATE TABLE {$this->getTable('sc_icepop')} (
  entity_id int(10) unsigned NOT NULL auto_increment,
  website_id int(11) NOT NULL default 0,
  title_text varchar(255),
  title_text_size varchar(5),
  title_text_bold varchar(5),
  title_text_color varchar(255),
  action_text varchar(255),
  action_text_bold varchar(5),
  action_text_color varchar(255),
  sign_up_box varchar(255),
  action_button varchar(255),
  action_button_text_color varchar(255),
  action_button_color varchar(255),
  transparency varchar(255),
  logo varchar(255),
  banner varchar(255),
  body_color varchar(255),
  timeout varchar(255),
  ttl_cookies varchar(255),
  action_text_size varchar(255),
  round_corner varchar (255),
  PRIMARY KEY (`entity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

$installer->endSetup();