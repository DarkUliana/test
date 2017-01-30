<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_tags extends CI_Migration 
{
	public function up()
	{
		$this->db->query('CREATE TABLE IF NOT EXISTS `tags` ( `tag_id` INT(11) NOT NULL AUTO_INCREMENT ,
		`tag_name` VARCHAR(255) NOT NULL ,
		PRIMARY KEY (`tag_id`)) 
		ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;');
		
		$this->db->query("INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES 
		('1', 'наука'),
		('2', 'китай'),
		('3', 'іт'),
		('4', 'медицина'),
		('5', 'коти');");
	}
	
	public function down()
	{
		$this->db->query("TRUNCATE TABLE `tags`");//очищення
        $this->db->query("DROP TABLE IF EXISTS `tags`");//видаленн¤ таблиці 
	}
}