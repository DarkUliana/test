<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_paper_tags extends CI_Migration 
{
	//ALTER TABLE `tags` ADD `number` INT(11) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (`number`);
    public function up()
    {
		$this->db->query("CREATE TABLE IF NOT EXISTS `paper_tags` ( 
		`paper_id` INT(11) NOT NULL , 
		`tag_id` INT(11) NOT NULL ,
		FOREIGN KEY (`tag_id`) REFERENCES `tags`(tag_id),
		FOREIGN KEY (`paper_id`) REFERENCES `papers`(paper_id)) 
		ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;");
		
		$this->db->query("INSERT INTO `paper_tags` (`paper_id`, `tag_id`) VALUES 
		('1', '1'),
		('1', '2'),
		('2', '1'),
		('2', '2'),
		('3', '1'),
		('3', '2'),
		('4', '3'),
		('5', '1'),
		('6', '1'),
		('6', '4'),
		('7', '1'),
		('7', '4'),
		('8', '1'),
		('9', '1'),
		('9', '5'),
		('10', '3'),
		('11', '1'),
		('11', '4'),
		('12', '1'),
		('12', '4');");
	}
	
	public function down()
    {
        $this->db->query("TRUNCATE TABLE `paper_tags`");//очищення
        $this->db->query("DROP TABLE IF EXISTS `paper_tags`");//видаленн¤ таблиці 
    }
}