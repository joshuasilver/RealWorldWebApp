CREATE table students (
    id              INT unsigned                AUTO_INCREMENT PRIMARY KEY,
    first_name      VARCHAR(50)     NOT NULL,
    last_name       VARCHAR(50)     NOT NULL,
    phone_number    CHAR(12)        NOT NULL,        
    time_created    TIMESTAMP       NOT NULL    DEFAULT CURRENT_TIMESTAMP
);
