-- Table Speaker
CREATE TABLE Speaker (
    speakerId INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(255),
    lastName VARCHAR(255),
    mail VARCHAR(255)
);

-- Table Module
CREATE TABLE Module (
    moduleId INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    durationModuleInHours INT,
    speakerId INT,
    FOREIGN KEY (speakerId) REFERENCES Speaker (speakerId)
);

-- Table ClassRoom
CREATE TABLE ClassRoom (
    classRoomId INT PRIMARY KEY AUTO_INCREMENT,
    building VARCHAR(255),
    name VARCHAR(255),
    capacityMax INT
);
-- Table Employees
CREATE TABLE Employees (
    employeeId INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(255),
    lastName VARCHAR(255),
    job VARCHAR(255),
    mail VARCHAR(255)
);

-- Table Student
CREATE TABLE Student (
    studentId INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(255),
    lastName VARCHAR(255),
    mail VARCHAR(255),
    birthDate DATE
);
-- Table Pivot Student/Promotion ---
CREATE TABLE StudentPromotion (
    studentId INT,
    promotionId INT,
    FOREIGN KEY (studentId) REFERENCES Student (studentId),
    FOREIGN KEY (promotionId) REFERENCES Promotion (promotionId)
);

-- Table Formation
CREATE TABLE Formation (
    formationId INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    durationFormationInMonth INT,
    abbreviation VARCHAR(255),
    rncpLvl INT,
    moduleId INT,
    accessibility BOOL,
    FOREIGN KEY (moduleId) REFERENCES Module (moduleId)
);

-- Table Promotion
CREATE TABLE Promotion (
    promotionId INT PRIMARY KEY AUTO_INCREMENT,
    formationId INT,
    promotionYears INT,
    startingDate DATE,
    endingDate DATE,
    FOREIGN KEY (formationId) REFERENCES Formation (formationId)
);

-- Table Session
CREATE TABLE Session (
    sessionId INT PRIMARY KEY AUTO_INCREMENT,
    date DATE,
    startTime INT,
    endTime INT,
    moduleId INT,
    promotionId INT,
    classRoomId INT,
    speakerId INT,
    FOREIGN KEY (moduleId) REFERENCES Module (moduleId),
    FOREIGN KEY (promotionId) REFERENCES Promotion (promotionId),
    FOREIGN KEY (classRoomId) REFERENCES ClassRoom (classRoomId),
    FOREIGN KEY (speakerId) REFERENCES Speaker (speakerId)
);