"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.Withdraw = void 0;
class Withdraw {
    constructor(bookWithdraw, customerWithdraw, date) {
        this.bookWithdraw = bookWithdraw;
        this.customerWithdraw = customerWithdraw;
        this.date = date;
    }
    addBookToWithdraw(book) {
        this.bookWithdraw = book;
    }
    getBookFromWithdraw() {
        return this.bookWithdraw;
    }
}
exports.Withdraw = Withdraw;
