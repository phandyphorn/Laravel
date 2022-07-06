import { Address } from "./Address";
import { Book } from "./Book";
import { Category } from "./Category";
import { Customer } from "./Customer";
import { Withdraw } from "./Withdraw";



export class Library {
    customers: Customer[] = [];
    books: Book[] = [];
    withDraws: Withdraw[] = [];
    constructor(
        private name: string,
        private address: Address
    ){}

    addCustomerToLibrary(customer: Customer) {
        this.customers.push(customer);
    }

    addBookToLibrary(book: Book) {
        if (!book.isEqual(book)){
            this.books.push(book);
        }else {
            return 'There are the same books, please add different book!'
        }
    }

    withDrawBook (book: Book, customer: Customer, date:Date):boolean {
       let withdraw = new Withdraw(book, customer, date);
        this.withDraws.push( withdraw );
        return true;
    }

    returnBook(book: Book) {
        for (let withdraw of this.withDraws) {
            if (withdraw.getBookFromWithdraw() === book) {
                
            }
        }
        return this.withDraws;
    }

    getBooksFor(category: Category):Book[] {
        let booksWhichHaveTheSameCategory: Book[] = [];
        let allBooks = this.books;
        for (let book of allBooks) {
            if (book.getCategory() == category) {
                booksWhichHaveTheSameCategory.push(book);
            }
        }
        return booksWhichHaveTheSameCategory;
    }



    isAvailable (book: Book): boolean {
        return true;
    }

    
    getAvailableBook(): Book[] {
        let availableBooks : Book[] = [];
        return availableBooks;
    }
    
}
