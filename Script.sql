create database roommate;



-- Table des utilisateurs
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fullname VARCHAR(255) NOT NULL,
    gender ENUM('male', 'female') NOT NULL,
    study_year ENUM('1', '2') NOT NULL,
    city_origin VARCHAR(100) NOT NULL,
    current_city VARCHAR(100) NOT NULL,
    bio TEXT,
    profile_photo VARCHAR(255),
    smoking ENUM('yes', 'no') NOT NULL,
    pets ENUM('yes', 'no') NOT NULL,
    guests ENUM('yes', 'no') NOT NULL,
    status ENUM('pending', 'active', 'inactive') NOT NULL DEFAULT 'pending',
    role ENUM('admin', 'student') NOT NULL DEFAULT 'student',
    email_verified BOOLEAN DEFAULT FALSE,
    verification_code VARCHAR(6),
    previous_roommate_reference INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (previous_roommate_reference) REFERENCES users(id)
);

-- Table des préférences de matching
CREATE TABLE matching_preferences (
    user_id INT PRIMARY KEY,
    min_budget DECIMAL(10,2),
    max_budget DECIMAL(10,2),
    preferred_cities TEXT,
    preferred_move_date DATE,
    preferred_roommates_count INT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Table des annonces
CREATE TABLE announcements (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    city ENUM('Nador', 'Asfi', 'Youssefiya') NOT NULL,
    cohabitation_rules TEXT,
    preferred_roommate_criteria TEXT,
    search_type ENUM('join_existing', 'search_together'),
    type ENUM('offer', 'request') NOT NULL,
    status ENUM('pending', 'active', 'inactive') NOT NULL DEFAULT 'pending',
    user_id INT NOT NULL,
    views_count INT DEFAULT 0,
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Table des offres de colocation
CREATE TABLE offer_announcements (
    announcement_id INT PRIMARY KEY,
    price DECIMAL(10,2) NOT NULL,
    address VARCHAR(255) NOT NULL,
    equipment TEXT,
    capacity INT NOT NULL,
    is_available BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (announcement_id) REFERENCES announcements(id) ON DELETE CASCADE
);

-- Table des photos des offres
CREATE TABLE offer_photos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    offer_id INT NOT NULL,
    photo_url VARCHAR(255) NOT NULL,
    FOREIGN KEY (offer_id) REFERENCES offer_announcements(announcement_id) ON DELETE CASCADE
);

-- Table des demandes de colocation
CREATE TABLE request_announcements (
    announcement_id INT PRIMARY KEY,
    budget DECIMAL(10,2) NOT NULL,
    move_in_date DATE NOT NULL,
    FOREIGN KEY (announcement_id) REFERENCES announcements(id) ON DELETE CASCADE
);

-- Table des messages
CREATE TABLE messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    content TEXT NOT NULL,
    image_url VARCHAR(255),
    sender_id INT NOT NULL,
    receiver_id INT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    send_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sender_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (receiver_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Table des signalements
CREATE TABLE reports (
    id INT PRIMARY KEY AUTO_INCREMENT,
    description TEXT NOT NULL,
    reporter_id INT NOT NULL,
    announcement_id INT NOT NULL,
    status ENUM('pending', 'resolved', 'dismissed') DEFAULT 'pending',
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (reporter_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (announcement_id) REFERENCES announcements(id) ON DELETE CASCADE
);

-- Table de matching
CREATE TABLE matches (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user1_id INT NOT NULL,
    user2_id INT NOT NULL,
    announcement_id INT NOT NULL,
    compatibility_score DECIMAL(5,2),
    status ENUM('pending', 'accepted', 'rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user1_id) REFERENCES users(id),
    FOREIGN KEY (user2_id) REFERENCES users(id),
    FOREIGN KEY (announcement_id) REFERENCES announcements(id)
);
--@block
ALTER TABLE `reports` ADD `admin_note` TEXT NULL DEFAULT NULL AFTER `status`; 