
--CREATE DATABASE ROOMER;
/*
DROP TABLE history;
DROP TABLE property;
DROP TABLE admin_;
DROP TABLE landlord;
DROP TABLE tennent;

*/
/*Verified will be a foreign key from Admin__verification table */

/*Admin_ Details */
CREATE TABLE admin_(Admin_id VARCHAR(10) PRIMARY KEY NOT NULL,Admin_pass VARCHAR(10));
INSERT INTO admin_ VALUES('Admin-no1','adPass01');
INSERT INTO admin_ VALUES('Admin-no2','adPass02');
INSERT INTO admin_ VALUES('Admin-no3','adPass03');
INSERT INTO admin_ VALUES('Admin-no4','adPass04');

/* landlord Details */
--
CREATE TABLE landlord(lord_id INT PRIMARY KEY, lord_name VARCHAR(30), lord_pass VARCHAR(10),verified VARCHAR(3) REFERENCES validity_lord(status));
INSERT INTO landlord VALUES(01,'LORD-1','PASS-01','yes');
INSERT INTO landlord VALUES(02,'LORD-2','PASS-02','yes');
INSERT INTO landlord VALUES(03,'LORD-3','PASS-03','no');
INSERT INTO landlord VALUES(04,'LORD-4','PASS-04','yes');
INSERT INTO landlord VALUES(05,'LORD-5','PASS-05','no');
INSERT INTO landlord VALUES(06,'LORD-6','PASS-06','yes');
INSERT INTO landlord VALUES(07,'LORD-7','PASS-07','no');
INSERT INTO landlord VALUES(08,'LORD-8','PASS-08','no');
INSERT INTO landlord VALUES(09,'LORD-9','PASS-09','yes');

/*----------------Updates ------------------------
	1. New attribute : For landlord verification id(eg.addhar/pan).
*/

/* Property Details */
--
CREATE TABLE property(p_id INT PRIMARY KEY, p_address VARCHAR(50), p_description VARCHAR(50),p_prize INT,p_availability VARCHAR(3),p_owner INT references landlord(lord_id),p_image VARCHAR(100));
INSERT INTO property VALUES(101,'Address-1','Description-01',4000,'yes',02,'Path');
INSERT INTO property VALUES(102,'Address-2','Description-02',10000,'yes',02,'Path');
INSERT INTO property VALUES(103,'Address-3','Description-03',12188,'no',01,'Path');
INSERT INTO property VALUES(104,'Address-4','Description-04',4561,'yes',07,'Path');
INSERT INTO property VALUES(105,'Address-5','Description-05',54613,'no',05,'Path');
INSERT INTO property VALUES(106,'Address-6','Description-06',30000,'yes',01,'Path');
INSERT INTO property VALUES(107,'Address-7','Description-07',10333,'no',03,'Path');
INSERT INTO property VALUES(108,'Address-8','Description-08',46521,'no',06,'Path');
INSERT INTO property VALUES(109,'Address-9','Description-09',46635,'yes',04,'Path');

/*-----------------Updates -------------
	1.p_availability will be a foreign key from another table where landlord will decide it's availability
	2.Thinking :: Property paper will be available which landlord will upload and have full authority over who can access it.
	3.Property images will be stored in other folder and this table will contain the path. 

*/

/*Tennent Details */
--
CREATE TABLE tennent(t_id VARCHAR(10) PRIMARY KEY,t_name VARCHAR(20),t_pass VARCHAR(10),t_history INT references property(p_id),t_verified VARCHAR(3));
INSERT INTO tennent values('user01','01 USER','PASS01',101,'yes');
INSERT INTO tennent values('user02','02 USER','PASS02',103,'no');
INSERT INTO tennent values('user03','03 USER','PASS03',101,'yes');
INSERT INTO tennent values('user04','04 USER','PASS04',105,'yes');
INSERT INTO tennent values('user05','05 USER','PASS05',101,'no');
INSERT INTO tennent values('user06','06 USER','PASS06',101,'yes');
INSERT INTO tennent values('user07','07 USER','PASS07',101,'yes');


/* History Details */
/*
	-Duration is in months.
	-Ratings range(1-5). 0: for no ratings
*/
--
CREATE TABLE history(h_id INT PRIMARY KEY,t_id VARCHAR(10) references tennent(t_id),p_id INT references property(p_id),review VARCHAR(100),duration INT,rating INT);
INSERT INTO history VALUES (301,'user01',101,'good owner behavior',10,4);
INSERT INTO history VALUES (302,'user02',102,'no water supply',6,3);
INSERT INTO history VALUES (303,'user03',103,'It is better than my previous room.',12,5);
INSERT INTO history VALUES (304,'user04',104,'bad',3,2);
INSERT INTO history VALUES (305,'user05',105,'worst',2,1);


SELECT * FROM admin_;
SELECT * FROM landlord;
SELECT * FROM property;
SELECT * FROM tennent;
SELECT * FROM history;


-- Validation tabel for landlord and tennent.

DROP TABLE validity_lord;
CREATE  TABLE validity_lord(
	v_id INT NOT NULL,
	lord_id INT REFERENCES landlord(lord_id) NOT NULL,
	status VARCHAR(3)
);

INSERT INTO validity_lord VALUES(2201,1,'yes');
INSERT INTO validity_lord VALUES(2202,2,'no');
INSERT INTO validity_lord VALUES(2203,3,'no');
INSERT INTO validity_lord VALUES(2204,4,'yes');
INSERT INTO validity_lord VALUES(2205,5,'yes');
INSERT INTO validity_lord VALUES(2206,6,'no');
INSERT INTO validity_lord VALUES(2207,7,'yes');
INSERT INTO validity_lord VALUES(2201,8,'no');
INSERT INTO validity_lord VALUES(2201,9,'yes');



DROP TABLE validity_tennent;
CREATE  TABLE validity_tennent(
	v_id INT NOT NULL,
	t_id VARCHAR(10) REFERENCES tennent(t_id) NOT NULL,
	status VARCHAR(3)
);


INSERT INTO validity_tennent VALUES(2211,'user01','yes');
INSERT INTO validity_tennent VALUES(2212,'user02','no');
INSERT INTO validity_tennent VALUES(2213,'user03','no');
INSERT INTO validity_tennent VALUES(2214,'user04','yes');
INSERT INTO validity_tennent VALUES(2215,'user05','yes');
INSERT INTO validity_tennent VALUES(2216,'user06','no');
INSERT INTO validity_tennent VALUES(2217,'user07','yes');

