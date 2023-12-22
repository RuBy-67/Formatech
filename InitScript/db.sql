-- Table Speaker
CREATE TABLE Speaker (
    speakerId INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(255),
    lastName VARCHAR(255),
    mail VARCHAR(255),
    password VARCHAR(255)
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
    mail VARCHAR(255),
    password VARCHAR(255)
);

-- Table Student
CREATE TABLE Student (
    studentId INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(255),
    lastName VARCHAR(255),
    mail VARCHAR(255),
    birthDate DATE,
    password VARCHAR(255)
);


-- Table Formation 
CREATE TABLE Formation (
    formationId INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    durationFormationInMonth INT,
    abbreviation VARCHAR(255),
    rncpLvl INT,
    accessibility BOOL
);

-- Table Promotion 
CREATE TABLE Promotion (
    promotionId INT PRIMARY KEY AUTO_INCREMENT,
    promotionYears INT,
    startingDate DATE,
    endingDate DATE
);

-- Table Pivot Module/SpeakerId 
CREATE TABLE ModuleSpeaker (
    speakerId INT,
    moduleId INT,
    FOREIGN KEY (speakerId) REFERENCES Speaker (speakerId)ON DELETE CASCADE,
    FOREIGN KEY (moduleId) REFERENCES Module (moduleId)ON DELETE CASCADE
);
-- Table Pivot Module/Formation 
CREATE TABLE ModuleFormation (
    moduleId INT,
    formationId INT,
    FOREIGN KEY (formationId) REFERENCES Formation (formationId)ON DELETE CASCADE,
    FOREIGN KEY (moduleId) REFERENCES Module (moduleId) ON DELETE CASCADE
);

-- Table Pivot Student/Promotion 
CREATE TABLE StudentPromotion (
    studentId INT,
    promotionId INT,
    FOREIGN KEY (studentId) REFERENCES Student (studentId)ON DELETE CASCADE,
    FOREIGN KEY (promotionId) REFERENCES Promotion (promotionId)ON DELETE CASCADE
);

-- Table Session
CREATE TABLE Session (
    sessionId INT PRIMARY KEY AUTO_INCREMENT,
    date DATE,
    startTime TIME,
    endTime TIME,
    moduleId INT,
    promotionId INT,
    classRoomId INT,
    speakerId INT,
    FOREIGN KEY (moduleId) REFERENCES Module (moduleId),
    FOREIGN KEY (promotionId) REFERENCES Promotion (promotionId),
    FOREIGN KEY (classRoomId) REFERENCES ClassRoom (classRoomId),
    FOREIGN KEY (speakerId) REFERENCES Speaker (speakerId)
);