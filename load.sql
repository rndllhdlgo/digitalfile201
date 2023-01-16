use hrms
LOAD DATA LOCAL INFILE '/var/www/html/master.csv'
IGNORE INTO TABLE personal_information_tables
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
(cellphone_number, empno)
WHERE personal_information_tables.empno = empno;
