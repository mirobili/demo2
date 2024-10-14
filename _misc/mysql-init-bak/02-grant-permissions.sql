CREATE USER IF NOT EXISTS 'mvc_demo'@'%' IDENTIFIED  WITH 'caching_sha2_password' BY 'mvc_demo2004';
GRANT ALL PRIVILEGES ON mvc_demo.* TO 'mvc_demo'@'%';
FLUSH PRIVILEGES;


ALTER USER 'mvc_demo'@'%' IDENTIFIED WITH 'caching_sha2_password' BY 'mvc_demo2004';
FLUSH PRIVILEGES;
