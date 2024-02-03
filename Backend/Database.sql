DROP TABLE IF EXISTS HISTORY;
DROP TABLE IF EXISTS TENANT;
DROP TABLE IF EXISTS PROPERTY;
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

/*----------------Updates ------------------------
    1. New attribute: For Landlord verification id(eg. Aadhar/PAN).
*/



CREATE TABLE property (
    p_id INT PRIMARY KEY,
    p_city VARCHAR(20),
    p_area VARCHAR(30), 
    p_description VARCHAR(30),
    p_type VARCHAR(10), /*flat,room,hostel,pg*/
    p_rating INT, /* ?/5 */
    p_gender VARCHAR(5), /*girl,boy or trans */
    p_food VARCHAR(3), /* yes or no */
    p_parking VARCHAR(3) , /* yes or no */
    p_wifi VARCHAR(3) , /* yes or no */
    p_availability INT , /*in Days */
    p_owner INT REFERENCES LANDLORD(lord_id) ON DELETE CASCADE,
    p_image VARCHAR(100) /* he path to './Assets/images/{f_{id} for flat , p_{id} for pg , h_{id} for hostel and r_{id} for room}': */

);
INSERT INTO PROPERTY VALUES (101, 'Bangalore', 'Koramangala', 'Spacious 2 BHK apartment', 'flat', 4, 'girl', 'yes', 'yes', 'yes', 30, 1, './Assets/images/f_1.jpg');
INSERT INTO PROPERTY VALUES (102, 'Mumbai', 'Colaba', 'Luxurious Studio Apartment', 'room', 5, 'boy', 'yes', 'no', 'yes', 15, 2, './Assets/images/r_2.jpg');
INSERT INTO PROPERTY VALUES (103, 'Delhi', 'Connaught Place', 'Modern 3 BHK Flat', 'flat', 3, 'trans', 'yes', 'yes', 'no', 45, 3, './Assets/images/f_3.jpg');
INSERT INTO PROPERTY VALUES (104, 'Pune', 'Kothrud', 'Cozy 1 BHK House', 'hostel', 4, 'boy', 'yes', 'no', 'yes', 20, 4, './Assets/images/h_4.jpg');
INSERT INTO PROPERTY VALUES (105, 'Chennai', 'Adyar', 'Spacious Villa with Garden', 'hostel', 4, 'girl', 'no', 'yes', 'yes', 60, 5, './Assets/images/h_5.jpg');
INSERT INTO PROPERTY VALUES (106, 'Hyderabad', 'Banjara Hills', 'Furnished Penthouse', 'flat', 2, 'trans', 'yes', 'yes', 'yes', 30, 6, './Assets/images/f_6.jpg');
INSERT INTO PROPERTY VALUES (107, 'Kolkata', 'Salt Lake', 'Beautiful 2 BHK Apartment', 'flat', 3, 'boy', 'no', 'yes', 'no', 15, 7, './Assets/images/f_7.jpg');
INSERT INTO PROPERTY VALUES (108, 'Ahmedabad', 'Vastrapur', 'Duplex House with Terrace', 'hostel', 5, 'girl', 'no', 'no', 'yes', 30, 8, './Assets/images/h_8.jpg');
INSERT INTO PROPERTY VALUES (109, 'Jaipur', 'Malviya Nagar', 'Elegant 4 BHK Villa', 'hostel', 4, 'trans', 'yes', 'yes', 'yes', 45, 9, './Assets/images/h_9.jpg');




/*-----------------Updates -------------
    1.p_availability will be a foreign key from another table where the landlord will decide its availability
    2.Thinking: Property paper will be available which the landlord will upload and have full authority over who can access it.
    3.Property images will be stored in another folder and this table will contain the path.
*/

/* Tenant Details */
CREATE TABLE TENANT (
    t_id VARCHAR(10) PRIMARY KEY,
    t_name VARCHAR(20),
    t_pass VARCHAR(10),
    t_history INT REFERENCES PROPERTY(p_id) ON DELETE CASCADE,
    t_verified VARCHAR(3)
);
INSERT INTO TENANT VALUES ('user01', 'Rahul Sharma', 'PASS01', 101, 'yes');
INSERT INTO TENANT VALUES ('user02', 'Neha Kapoor', 'PASS02', 103, 'no');
INSERT INTO TENANT VALUES ('user03', 'Sandeep Verma', 'PASS03', 101, 'yes');
INSERT INTO TENANT VALUES ('user04', 'Aisha Singh', 'PASS04', 105, 'yes');
INSERT INTO TENANT VALUES ('user05', 'Raj Malhotra', 'PASS05', 101, 'no');
INSERT INTO TENANT VALUES ('user06', 'Kavya Patel', 'PASS06', 101, 'yes');
INSERT INTO TENANT VALUES ('user07', 'Ankit Gupta', 'PASS07', 101, 'yes');

/* History Details */
/*
    -Duration is in months.
    -Ratings range(1-5). 0: for no ratings
*/
CREATE TABLE HISTORY (
    h_id INT PRIMARY KEY,
    t_id VARCHAR(10) REFERENCES TENANT(t_id) ON DELETE CASCADE,
    p_id INT REFERENCES PROPERTY(p_id) ON DELETE CASCADE,
    review VARCHAR(100),
    duration INT,
    rating INT
);
INSERT INTO HISTORY VALUES (301, 'user01', 101, 'Good owner behavior', 10, 4);
INSERT INTO HISTORY VALUES (302, 'user02', 102, 'No water supply', 6, 3);
INSERT INTO HISTORY VALUES (303, 'user03', 103, 'It is better than my previous room.', 12, 5);
INSERT INTO HISTORY VALUES (304, 'user04', 104, 'Bad', 3, 2);
INSERT INTO HISTORY VALUES (305, 'user05', 105, 'Worst', 2, 1);


SELECT * FROM admin;
SELECT * FROM tenant;
SELECT * FROM landlord;
SELECT * FROM property;
SELECT * FROM history;