DROP TABLE IF EXISTS contact;
CREATE TABLE contact(
	m_id SERIAL PRIMARY KEY,
	m_name VARCHAR(20),
	m_mail VARCHAR(20),
	m_msg VARCHAR(200),
	m_reply VARCHAR(200)

);
