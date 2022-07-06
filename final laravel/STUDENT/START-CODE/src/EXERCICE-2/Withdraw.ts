import { Book } from "./Book";
import { Customer } from "./Customer";

export class Withdraw {
    constructor(
        protected bookWithdraw: Book,
        protected customerWithdraw : Customer,
        protected date : Date
    ){}

    addBookToWithdraw(book: Book) {
        this.bookWithdraw = book;
    }

    getBookFromWithdraw() {
        return this.bookWithdraw;
    }
}


