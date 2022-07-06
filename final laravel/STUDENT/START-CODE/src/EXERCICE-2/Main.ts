import { Address } from "./Address";
import { Book } from "./Book";
import { Category } from "./Category";
import { Customer } from "./Customer";
import { Library } from "./Library";
import { Withdraw } from "./Withdraw";

// Create address
let pncLibraryAddress = new Address('St.371', 'Phnom Penh');


// Create library
let pncLibrary = new Library('PNC', pncLibraryAddress);

// Creat Customer Kea
let cusKea = new Customer('KEA', 'The king of OOP');


// Create Book
let ppoyBook = new Book('Public Private, oh yeah', 'Ronan', 9999);
let iltcBook = new Book('I like the constractor', 'Him', 3);


// Each book has many categorie
ppoyBook.addCategoryToBook(Category.OOP);
ppoyBook.addCategoryToBook(Category.SONG);
ppoyBook.addCategoryToBook(Category.CRAZY);
iltcBook.addCategoryToBook(Category.OOP)
iltcBook.addCategoryToBook(Category.IT)
iltcBook.addCategoryToBook(Category.TYPESCRIPT)

let keaDate = new Date("JUNE, 2022");


// Customer withdraw book
let keaWithdraw = new Withdraw(ppoyBook,cusKea, keaDate);



pncLibrary.addBookToLibrary(ppoyBook);
pncLibrary.addBookToLibrary(iltcBook);

