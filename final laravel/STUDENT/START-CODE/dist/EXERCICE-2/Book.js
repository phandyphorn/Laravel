"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.Book = void 0;
class Book {
    constructor(title, author, price) {
        this.title = title;
        this.author = author;
        this.price = price;
    }
    addCategoryToBook(catego) {
        this.category.push(catego);
    }
    getCategory() {
        for (let cate of this.category) {
            return cate;
        }
    }
    isEqual(otherBook) {
        return this.title == otherBook.title && this.author == otherBook.author;
    }
}
exports.Book = Book;
