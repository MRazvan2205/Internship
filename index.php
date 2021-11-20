<?php

require 'database/Database.php';
require 'models/Library.php';

// Cleans the database
Database::truncate();

//-- --- Books --------------------------------------------------------------------------------------------------------

Library::addBook(1, 10, 'First Book', 'First Author', 'First Type', Book::BOOK_AVAILABLE);
Library::addBook(2, 20, 'Second Book', 'Second Author', 'Second Type', Book::BOOK_AVAILABLE);
Library::addBook(3, 15, 'Last Book', 'Last Author', 'Last Type', Book::BOOK_UNAVAILABLE);

Library::getAllBooks();
Library::getAvailableBooks();
Library::findSpecificBook('title', 'First Book');
Library::findSpecificBook('title', 'Test');
Library::getSortedBooksByPages();
Library::removeSpecificBook(1);
Library::getAllBooks();

//-- --- Clients ------------------------------------------------------------------------------------------------------

Library::addStudent(1, 'First Student', 'First University', 1);
Library::addStudent(2, 'Second Student', 'Second University', 2);
Library::addStudent(3, 'Last Student', 'Last University', 3);

Library::addTeacher(1, 'First Teacher', 'First Course');
Library::addTeacher(2, 'Second Teacher', 'Second Course');
Library::addTeacher(3, 'Last Teacher', 'Last Course');

Library::getAllClients();
Library::getAllStudents();
Library::removeSpecificClient(1);
Library::getAllClients();

Library::rentBook(2, 2);
Library::rentBook(3, 3);

Library::returnBook(3, 3);

Library::getTheMostFaithfulReader();
