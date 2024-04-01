CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL
);

CREATE TABLE payment_invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    payment_system_id INT,
    details TEXT,
    amount DECIMAL(10, 2),
    status ENUM('creating', 'approved', 'cancelled') NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (payment_system_id) REFERENCES payment_systems(id)
);

CREATE TABLE payment_systems (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    is_active BOOLEAN NOT NULL
);
