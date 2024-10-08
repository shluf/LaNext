CREATE TABLE User (
    User_ID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Role ENUM('Admin', 'Editor', 'Author', 'Reader') NOT NULL,
    Date_Created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Last_Login TIMESTAMP NULL
);

CREATE TABLE Category (
    Category_ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Description TEXT
);

CREATE TABLE Article (
    Article_ID INT AUTO_INCREMENT PRIMARY KEY,
    Title VARCHAR(255) NOT NULL,
    Content TEXT NOT NULL,
    Summary TEXT,
    Publish_Date TIMESTAMP NULL,
    Status ENUM('Draft', 'Published', 'Archived') NOT NULL,
    Category_ID INT,
    Author_ID INT,
    Editor_ID INT,
    View_Count INT DEFAULT 0,
    FOREIGN KEY (Category_ID) REFERENCES Category(Category_ID) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (Author_ID) REFERENCES User(User_ID) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (Editor_ID) REFERENCES User(User_ID) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE Tag (
    Tag_ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL
);

CREATE TABLE Article_Tag (
    Article_ID INT,
    Tag_ID INT,
    PRIMARY KEY (Article_ID, Tag_ID),
    FOREIGN KEY (Article_ID) REFERENCES Article(Article_ID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (Tag_ID) REFERENCES Tag(Tag_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Comment (
    Comment_ID INT AUTO_INCREMENT PRIMARY KEY,
    User_ID INT,
    Article_ID INT,
    Content TEXT NOT NULL,
    Date_Posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (User_ID) REFERENCES User(User_ID) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (Article_ID) REFERENCES Article(Article_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Media (
    Media_ID INT AUTO_INCREMENT PRIMARY KEY,
    File_Name VARCHAR(255) NOT NULL,
    File_Path VARCHAR(255) NOT NULL,
    Media_Type ENUM('Image', 'Video', 'Audio') NOT NULL,
    Date_Uploaded TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Article_ID INT,
    FOREIGN KEY (Article_ID) REFERENCES Article(Article_ID) ON DELETE SET NULL ON UPDATE CASCADE
);