
DROP TABLE IF EXISTS LANDLORD;
DROP TABLE IF EXISTS ADMIN;


/* Verified will be a foreign key from admin_verification table */

/* Admin Details */
CREATE TABLE ADMIN (
    admin_id INT PRIMARY KEY,
    admin_pass VARCHAR(10)
);

INSERT INTO ADMIN VALUES (1, 'adPass01');
INSERT INTO ADMIN VALUES (2, 'adPass02');
INSERT INTO ADMIN VALUES (3, 'adPass03');
INSERT INTO ADMIN VALUES (4, 'adPass04');

/* Landlord Details */
CREATE TABLE LANDLORD (
    lord_id INT PRIMARY KEY,
    lord_name VARCHAR(30),
    lord_pass VARCHAR(10),
    verified VARCHAR(3)
);
INSERT INTO LANDLORD VALUES (1, 'John Doe', 'PASS-01', 'yes');
INSERT INTO LANDLORD VALUES (2, 'Alice Smith', 'PASS-02', 'yes');
INSERT INTO LANDLORD VALUES (3, 'Bob Patel', 'PASS-03', 'no');
INSERT INTO LANDLORD VALUES (4, 'Ritu Singh', 'PASS-04', 'yes');
INSERT INTO LANDLORD VALUES (5, 'Amit Verma', 'PASS-05', 'no');
INSERT INTO LANDLORD VALUES (6, 'Priya Kapoor', 'PASS-06', 'yes');
INSERT INTO LANDLORD VALUES (7, 'Kumar Sharma', 'PASS-07', 'no');
INSERT INTO LANDLORD VALUES (8, 'Sneha Gupta', 'PASS-08', 'no');
INSERT INTO LANDLORD VALUES (9, 'Vikram Singh', 'PASS-09', 'yes');
