USE festival;
drop table if exists stagetimes;
drop table if exists bandmembers;
drop table if exists bands;
drop table if exists workers;
drop table if exists stages;


create table stages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name char(20),
    capacity INT
);

create table workers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name char(20),
    ssn char(20)
);

create table bands (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name char(20),
    genre char(20),
    country char(20),
    worker_id INT,
    FOREIGN KEY (worker_id) REFERENCES workers(id)
);

create table bandmembers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    band_id INT,
    name char(20),
    role char(20),
    FOREIGN KEY (band_id) REFERENCES bands(id)
);

create table stagetimes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    band_id INT,
    worker_id INT,
    stage_id INT,
    start_time DATETIME,
    end_time DATETIME,
    FOREIGN KEY (band_id) REFERENCES bands(id),
    FOREIGN KEY (worker_id) REFERENCES workers(id),
    FOREIGN KEY (stage_id) REFERENCES stages(id)
);

INSERT INTO stages (name, capacity) VALUES
    ('Mallorcascenen',50000),('Dieseltältet',150);

INSERT INTO workers (name, ssn) VALUES
    ('sven','196901129999'),('ola','196301129999');

INSERT INTO bands (name,genre,country) VALUES
    ('korn','metal','usa'),('slipknot','death metal','usa');

INSERT INTO bandmembers (band_id,name,role) VALUES
    (1,'lars','singer'),(2,'per','guitar');
    
INSERT INTO stagetimes (band_id,worker_id,stage_id, start_time, end_time) VALUES
    (1,1,1,'2015-09-01 19:30:00','2015-09-01 22:30:00'),(2,2,1,'2015-09-01 15:30:00','2015-09-01 18:30:00');

    
