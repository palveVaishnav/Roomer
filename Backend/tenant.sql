DROP TABLE IF EXISTS TENANT;


CREATE TABLE TENANT (
    t_id SERIAL PRIMARY KEY,
    t_email VARCHAR(50), -- I assumed email could be longer, adjust as needed
    t_name VARCHAR(20),
    t_pass VARCHAR(10),
    t_verified VARCHAR(3)
);

