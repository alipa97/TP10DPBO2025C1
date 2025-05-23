CREATE DATABASE lovers;
USE lovers;

CREATE TABLE crush_target (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE love_status (
    id INT AUTO_INCREMENT PRIMARY KEY,
    status_name VARCHAR(50) NOT NULL
);

CREATE TABLE love_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lover_name VARCHAR(100) NOT NULL,
    crush_id INT NOT NULL,
    start_date DATE NOT NULL,
    status_id INT NOT NULL,
    FOREIGN KEY (crush_id) REFERENCES crush_target(id),
    FOREIGN KEY (status_id) REFERENCES love_status(id)
);

-- Contoh data
INSERT INTO crush_target (name) VALUES 
('Keisya'), 
('Bob'), 
('Alifa'),
('Rapael');

INSERT INTO love_status (status_name) VALUES 
('Bertepuk Sebelah Tangan'), 
('Jadian'), 
('Move On'), 
('Menikah'),
('Masih PDKT');

INSERT INTO love_history (lover_name, crush_id, start_date, status_id) VALUES
('Naren', 1, '2025-05-20', 4),
('Rizki', 2, '2023-09-10', 5),
('Fauzan', 3, '2025-05-04', 5),
('Klara', 4, '2022-09-09', 2);