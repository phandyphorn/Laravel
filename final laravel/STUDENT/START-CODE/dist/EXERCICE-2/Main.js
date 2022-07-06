"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
const Address_1 = require("./Address");
const Book_1 = require("./Book");
const Category_1 = require("./Category");
const Customer_1 = require("./Customer");
const Library_1 = require("./Library");
const Withdraw_1 = require("./Withdraw");
// Create address
let pncLibraryAddress = new Address_1.Address('St.371', 'Phnom Penh');
console.log(pncLibraryAddress);
// Create library
let pncLibrary = new Library_1.Library('PNC', pncLibraryAddress);
// Creat Customer Kea
let cusKea = new Customer_1.Customer('KEA', 'The king of OOP');
// Create Book
let ppoyBook = new Book_1.Book('Public Private, oh yeah', 'Ronan', 9999);
let iltcBook = new Book_1.Book('I like the constractor', 'Him', 3);
// Each book has many categorie
ppoyBook.addCategoryToBook(Category_1.Category.OOP);
ppoyBook.addCategoryToBook(Category_1.Category.SONG);
ppoyBook.addCategoryToBook(Category_1.Category.CRAZY);
iltcBook.addCategoryToBook(Category_1.Category.OOP);
iltcBook.addCategoryToBook(Category_1.Category.IT);
iltcBook.addCategoryToBook(Category_1.Category.TYPESCRIPT);
let keaDate = new Date("JUNE, 2022");
// Customer can withdraw many book
let keaWithdraw = new Withdraw_1.Withdraw(ppoyBook, cusKea, keaDate);
pncLibrary.addBookToLibrary(ppoyBook);
pncLibrary.addBookToLibrary(iltcBook);
