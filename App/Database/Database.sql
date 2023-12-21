CREATE DATABASE biblio;

USE biblio;

CREATE TABLE book(
    id int PRIMARY KEY AUTO_INCREMENT,
    titre varchar (20) NOT NULL,
    author varchar (50),
    genre varchar (50),
    description varchar (2000),
    publication_year DATE,
    total_copies int ,
    variable_copies int
    );

CREATE TABLE users(
    id int PRIMARY KEY AUTO_INCREMENT,
    first_name varchar (30) NOT NULL,
    last_name varchar (30) NOT NULL,
    email varchar (100) NOT NULL UNIQUE, 
    password varchar (10) NOT NULL,
    phone varchar (20) UNIQUE
    );

CREATE TABLE roles(
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar (30) NOT NULL
    );

CREATE TABLE user_role(
    users_id int ,
    FOREIGN KEY (users_id) REFERENCES users(id),
    roles_id int ,
    FOREIGN KEY (roles_id) REFERENCES roles(id),
    PRIMARY KEY(users_id,roles_id)
    );

CREATE TABLE reservation(
    id int PRIMARY KEY AUTO_INCREMENT,
    description VARCHAR(1000),
    reservation_date DATE ,
    return_date DATE ,
    is_returned int ,
    users_id int ,
    FOREIGN KEY (users_id) REFERENCES users(id),
    book_id int ,
    FOREIGN KEY (book_id) REFERENCES book(id)
);