USE sample_codeigniter;

CREATE TABLE comments (
    id int(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_name varchar(20) NOT NULL,
    comment VARCHAR(20) NOT NULL,
    post_date VARCHAR(40) NOT NULL
);