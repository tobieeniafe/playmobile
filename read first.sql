COMMAND TO CREATE TABLE 
~~ DATABASE NAME = playmobile



CREATE TABLE IF NOT EXISTS `tbl_uploads` (
  
  
`category` varchar(100) NOT NULL,
  
`description` varchar(100) NOT NULL,
  
`title` varchar(100) NOT NULL,
  
`url` varchar(100) NOT NULL,
  
PRIMARY KEY (`title`)

) ;