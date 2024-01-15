USE m6prog_db;

CREATE TABLE IF NOT EXISTS imagetable (
    image_id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    file_type VARCHAR(50) NOT NULL,
    description TEXT,
    tags VARCHAR(255),
    upload_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    file_size INT,
    camera_id INT,
    user_id INT
);
