DROP TABLE IF EXISTS bookings;
DROP TABLE IF EXISTS PROPERTY CASCADE;


CREATE TABLE bookings (
    t_id INT,
    p_id INT,
    status VARCHAR(20)
);

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
	p_ac VARCHAR(10), /* ac or non-ac */
	p_furnished VARCHAR(20), /* furnished or not-furinshed */
    p_availability INT, /*in Days */
    p_owner INT REFERENCES LANDLORD(lord_id) ON DELETE CASCADE,
    p_image TEXT[], /* he path to './Assets/images/{f_{id} for flat , p_{id} for pg , h_{id} for hostel and r_{id} for room}': */
	p_prize INT,
    p_details VARCHAR(300),
    p_booked VARCHAR(10) /*yes or no*/

);

INSERT INTO property VALUES 
(101, 'Bangalore', 'Koramangala', 'Spacious 2 BHK apartment', 'flat', 4, 'girl', 'yes', 'yes', 'yes', 'ac', 'furnished', 30, 1, ARRAY['./Assets/images/f_1.jpg', './Assets/images/f_2.jpg', './Assets/images/f_3.jpg', './Assets/images/f_4.jpg'], 30000, 'A modern 2 BHK apartment located in the heart of Koramangala, offering spacious rooms, contemporary furnishings, and amenities such as parking and Wi-Fi, ideal for urban living.','no'),
(102, 'Mumbai', 'Colaba', 'Luxurious Studio Apartment', 'room', 5, 'boy', 'yes', 'no', 'yes', 'non-ac', 'furnished', 15, 5, ARRAY['./Assets/images/r_1.jpg', './Assets/images/r_2.jpg', './Assets/images/r_3.jpg', './Assets/images/r_4.jpg'], 4000, 'Indulge in luxury with this stylish studio apartment in the upscale neighborhood of Colaba, Mumbai. Featuring modern amenities and proximity to major attractions, its perfect for those seeking a comfortable city lifestyle.','no'),
(103, 'Delhi', 'Connaught Place', 'Modern 3 BHK Flat', 'flat', 3, 'trans', 'yes', 'yes', 'no', 'ac', 'not-furnished', 45, 9, ARRAY['./Assets/images/f_5.jpg', './Assets/images/f_6.jpg', './Assets/images/f_7.jpg', './Assets/images/f_8.jpg'], 30000, 'Discover modern living in this spacious 3 BHK flat located in the bustling Connaught Place area of Delhi. With its convenient location and contemporary design, it offers a perfect blend of comfort and accessibility.','no'),
(104, 'Pune', 'Kothrud', 'Cozy 1 BHK hostel', 'hostel', 4, 'boy', 'yes', 'no', 'yes', 'ac', 'not-furnished', 20, 3, ARRAY['./Assets/images/h_1.jpg', './Assets/images/h_2.jpg', './Assets/images/h_3.jpg', './Assets/images/h_4.jpg'], 20000, 'Experience cozy living in this well-appointed 1 BHK hostel situated in the peaceful locality of Kothrud, Pune. With its comfortable accommodations and amenities, it provides an ideal environment for students or young professionals.','no'),
(105, 'Chennai', 'Adyar', 'Spacious Villa with Garden', 'hostel', 4, 'girl', 'no', 'yes', 'yes', 'ac', 'furnished', 60, 7, ARRAY['./Assets/images/h_5.jpg', './Assets/images/h_6.jpg', './Assets/images/h_7.jpg', './Assets/images/h_8.jpg'], 100000, 'Escape the hustle and bustle with this spacious villa boasting a lush garden oasis in the serene neighborhood of Adyar, Chennai. Perfect for relaxation and outdoor gatherings, it offers a tranquil retreat from city life.','no'),
(106, 'Hyderabad', 'Banjara Hills', 'Furnished Penthouse', 'flat', 2, 'trans', 'yes', 'yes', 'yes', 'ac', 'furnished', 30, 2, ARRAY['./Assets/images/f_9.jpg', './Assets/images/f_10.jpg', './Assets/images/f_11.jpg', './Assets/images/f_12.jpg'], 38000, 'Elevate your lifestyle with this luxurious furnished penthouse located in the prestigious area of Banjara Hills, Hyderabad. Offering stunning city views and modern amenities, its an epitome of urban sophistication and comfort.','no'),
(107, 'Kolkata', 'Salt Lake', 'Beautiful 2 BHK Apartment', 'flat', 3, 'boy', 'no', 'yes', 'no', 'ac', 'furnished', 15, 5, ARRAY['./Assets/images/f_13.jpg', './Assets/images/f_14.jpg', './Assets/images/f_15.jpg', './Assets/images/f_16.jpg'], 49000, 'Experience elegance and convenience in this beautiful 2 BHK apartment nestled in the vibrant neighborhood of Salt Lake, Kolkata. With its tasteful interiors and proximity to amenities, its an ideal choice for modern urban living.','no'),
(108, 'Ahmedabad', 'Vastrapur', 'Duplex hostel with Terrace', 'hostel', 5, 'girl', 'no', 'no', 'yes', 'ac', 'not-furnished', 30, 9, ARRAY['./Assets/images/h_9.jpg', './Assets/images/h_10.jpg', './Assets/images/h_11.jpg', './Assets/images/h_12.jpg'], 12890, 'Enjoy the perks of communal living in this spacious duplex hostel with a charming terrace, located in the lively area of Vastrapur, Ahmedabad. Perfect for socializing and relaxation, it offers a comfortable and vibrant living environment.','no'),
(109, 'Jaipur', 'Malviya Nagar', 'Elegant 4 BHK Villa', 'hostel', 4, 'trans', 'yes', 'yes', 'yes', 'ac', 'furnished', 45, 3, ARRAY['./Assets/images/h_13.jpg', './Assets/images/h_14.jpg', './Assets/images/h_15.jpg', './Assets/images/h_16.jpg'], 14999, 'Indulge in luxury and sophistication with this elegant 4 BHK villa nestled in the prestigious neighborhood of Malviya Nagar, Jaipur. Featuring spacious interiors, modern amenities, and serene surroundings, it offers a perfect blend of comfort and style.','no'),
(110, 'Bangalore', 'HSR Layout', 'Cozy 1 BHK Apartment', 'flat', 4, 'girl', 'yes', 'no', 'yes', 'ac', 'not-furnished', 30, 7, ARRAY['./Assets/images/f_17.jpg', './Assets/images/f_18.jpg', './Assets/images/f_19.jpg', './Assets/images/f_20.jpg'], 25000, 'A cozy 1 BHK apartment located in the vibrant HSR Layout of Bangalore, ideal for young professionals or couples.','no'),
(111, 'Mumbai', 'Bandra', 'Spacious 3 BHK Flat', 'flat', 5, 'boy', 'yes', 'yes', 'yes', 'ac', 'furnished', 45, 4, ARRAY['./Assets/images/f_21.jpg', './Assets/images/f_22.jpg', './Assets/images/f_23.jpg', './Assets/images/f_24.jpg'], 75000, 'Experience luxury living in this spacious 3 BHK flat located in the upscale neighborhood of Bandra, Mumbai. With its modern amenities and convenient location, it offers a perfect blend of comfort and sophistication.','no'),
(112, 'Delhi', 'Vasant Kunj', 'Furnished Studio Apartment', 'room', 3, 'trans', 'no', 'yes', 'no', 'non-ac', 'furnished', 15, 4, ARRAY['./Assets/images/r_17.jpg', './Assets/images/r_18.jpg', './Assets/images/r_19.jpg', './Assets/images/r_20.jpg'], 8000, 'Enjoy the convenience of furnished living with this studio apartment in the prestigious Vasant Kunj area of Delhi. Perfect for students or young professionals seeking a comfortable living space.','no'),
(113, 'Pune', 'Wakad', 'Modern Hostel with Gym', 'hostel', 4, 'girl', 'yes', 'yes', 'yes', 'ac', 'furnished', 30, 9, ARRAY['./Assets/images/h_17.jpg', './Assets/images/h_18.jpg', './Assets/images/h_19.jpg', './Assets/images/h_20.jpg'], 18000, 'Stay fit and socialize in this modern hostel with a gym facility, located in the bustling area of Wakad, Pune. Offering comfortable accommodations and recreational amenities, it provides an ideal living environment for students and young professionals.','no'),
(114, 'Chennai', 'Velachery', 'Elegant 2 BHK Apartment', 'flat', 4, 'boy', 'yes', 'yes', 'no', 'ac', 'not-furnished', 45, 5, ARRAY['./Assets/images/f_25.jpg', './Assets/images/f_26.jpg', './Assets/images/f_27.jpg', './Assets/images/f_28.jpg'], 35000, 'Discover elegance and comfort in this spacious 2 BHK apartment situated in the serene neighborhood of Velachery, Chennai. With its tasteful interiors and modern amenities, it offers a perfect retreat from city life.','no'),
(115, 'Hyderabad', 'Gachibowli', 'Luxurious PG Accommodation', 'pg', 5, 'girl', 'yes', 'yes', 'yes', 'ac', 'furnished', 60, 7, ARRAY['./Assets/images/p_1.jpg', './Assets/images/p_2.jpg', './Assets/images/p_3.jpg', './Assets/images/p_4.jpg'], 20000, 'Experience luxury living with this luxurious PG accommodation in the prime location of Gachibowli, Hyderabad. Featuring modern amenities and a vibrant community, it offers a comfortable and social living experience.','no'),
(116, 'Kolkata', 'Park Street', 'Heritage Hostel', 'hostel', 4, 'boy', 'no', 'no', 'yes', 'ac', 'not-furnished', 30, 6, ARRAY['./Assets/images/h_21.jpg', './Assets/images/h_22.jpg', './Assets/images/h_23.jpg', './Assets/images/h_24.jpg'], 12000, 'Immerse yourself in the rich heritage of Kolkata with this hostel located in the iconic Park Street area. Offering budget-friendly accommodations and a central location, its perfect for travelers and backpackers exploring the city.','no'),
(117, 'Ahmedabad', 'Navrangpura', 'Modern 1 BHK Flat', 'flat', 3, 'trans', 'yes', 'no', 'yes', 'ac', 'furnished', 30, 6, ARRAY['./Assets/images/f_29.jpg', './Assets/images/f_30.jpg', './Assets/images/f_31.jpg', './Assets/images/f_32.jpg'], 20000, 'Enjoy modern living in this well-designed 1 BHK flat located in the bustling Navrangpura area of Ahmedabad. With its contemporary amenities and convenient location, it offers a comfortable urban lifestyle.','no'),
(118, 'Jaipur', 'Civil Lines', 'Spacious Room with Balcony', 'room', 4, 'girl', 'no', 'yes', 'yes', 'non-ac', 'furnished', 15, 8, ARRAY['./Assets/images/r_29.jpg', './Assets/images/r_30.jpg', './Assets/images/r_31.jpg', './Assets/images/r_32.jpg'], 6000, 'Relax and unwind in this spacious room with a balcony, situated in the serene Civil Lines area of Jaipur. Offering scenic views and modern amenities, it provides a peaceful retreat in the heart of the city.','no'),
(119, 'Bangalore', 'Indiranagar', 'Cosy PG Accommodation', 'pg', 4, 'boy', 'yes', 'no', 'yes', 'ac', 'not-furnished', 30, 7, ARRAY['./Assets/images/p_5.jpg', './Assets/images/p_6.jpg', './Assets/images/p_7.jpg', './Assets/images/p_8.jpg'], 15000, 'Experience comfort and convenience with this cozy PG accommodation in the bustling Indiranagar area of Bangalore. With its modern amenities and vibrant atmosphere, it offers a comfortable living experience for students and young professionals.','no'),
(120, 'Mumbai', 'Lower Parel', 'Luxurious Studio Apartment', 'room', 5, 'trans', 'yes', 'yes', 'yes', 'ac', 'furnished', 15, 1, ARRAY['./Assets/images/r_33.jpg', './Assets/images/r_34.jpg', './Assets/images/r_35.jpg', './Assets/images/r_36.jpg'], 10000, 'Indulge in luxury with this stylish studio apartment located in the upscale Lower Parel area of Mumbai. Featuring modern amenities and sleek design, it offers a perfect blend of comfort and sophistication.','no');


/*-----------------Updates -------------
    1.p_availability will be a foreign key from another table where the landlord will decide its availability
    2.Thinking: Property paper will be available which the landlord will upload and have full authority over who can access it.
    3.Property images will be stored in another folder and this table will contain the path.
*/

