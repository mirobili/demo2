#--- ALTER USER mvc_demo@'%' IDENTIFIED WITH 'caching_sha2_password' BY 'mvc_demo2004';
alter user mvc_demo
    identified with 'caching_sha2_password' by 'mvc_demo2024';

FLUSH PRIVILEGES;