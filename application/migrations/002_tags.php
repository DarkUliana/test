<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_tags extends CI_Migration 
{
    public function up()
    {
		$this->db->query("CREATE TABLE IF NOT EXISTS `tags` ( 
		`paper_id` INT(11) NOT NULL , 
		`tag` VARCHAR(255) NOT NULL ,
		FOREIGN KEY (paper_id) REFERENCES `papers`(paper_id)) 
		ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;");
		
		$this->db->query("INSERT INTO `tags` (`paper_id`, `tag`) VALUES 
		('1', 'наука'),
		('1', 'китай'),
		('2', 'наука'),
		('2', 'китай'),
		('3', 'наука'),
		('3', 'китай'),
		('4', 'іт'),
		('5', 'наука'),
		('6', 'наука'),
		('6', 'медицина'),
		('7', 'наука'),
		('7', 'медицина'),
		('8', 'наука'),
		('9', 'наука'),
		('9', 'коти'),
		('10', 'іт'),
		('11', 'наука'),
		('11', 'медицина'),
		('12', 'наука'),
		('12', 'медицина');");
	}
	
	public function down()
    {
        $this->db->query("TRUNCATE TABLE `tags`");//очищення
        $this->db->query("DROP TABLE IF EXISTS `tags`");//видаленн¤ таблиці 
    }
}