
DROP TABLE IF EXISTS `blog_entry`;
CREATE TABLE blog_entry (
    id int(5) PRIMARY KEY AUTO_INCREMENT,
    title varchar(50) NOT NULL,
    entry varchar(1500) NULL,
    entry_date date NOT NULL
);

