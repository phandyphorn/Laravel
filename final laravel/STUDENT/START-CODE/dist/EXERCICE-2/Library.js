"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.Library = void 0;
const Withdraw_1 = require("./Withdraw");
class Library {
    constructor(name, address) {
        this.name = name;
        this.address = address;
        this.customers = [];
        this.books = [];
        this.withDraws = [];
    }
    addCustomerToLibrary(customer) {
        this.customers.push(customer);
    }
    addBookToLibrary(book) {
        if (!book.isEqual(book)) {
            this.books.push(book);
        }
        else {
            return 'There are the same books, please add different book!';
        }
    }
    withDrawBook(book, customer, date) {
        let withdraw = new Withdraw_1.Withdraw(book, customer, date);
        this.withDraws.push(withdraw);
        return true;
    }
    returnBook(book) {
        for (let withdraw of this.withDraws) {
            if (withdraw.getBookFromWithdraw() === book) {
            }
        }
        return this.withDraws;
    }
    getBooksFor(category) {
        let booksWhichHaveTheSameCategory = [];
        let allBooks = this.books;
        for (let book of allBooks) {
            if (book.getCategory() == category) {
                booksWhichHaveTheSameCategory.push(book);
            }
        }
        return booksWhichHaveTheSameCategory;
    }
    isAvailable(book) {
        return true;
    }
    getAvailableBook() {
        let availableBooks = [];
        return availableBooks;
    }
}
exports.Library = Library;
