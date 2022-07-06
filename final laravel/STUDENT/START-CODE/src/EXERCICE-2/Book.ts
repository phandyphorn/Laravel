import { Category } from "./Category";

export class Book {
    protected category: Category[]
    constructor(
        protected title: string,
        protected author: string,
        protected price: number,
    ){}

    addCategoryToBook(catego: Category) {
        this.category.push(catego);
    }

    getCategory(){
        for (let cate of this.category){
            return cate;
        }
    }

    isEqual(otherBook: Book): boolean {
        return this.title == otherBook.title && this.author == otherBook.author;
    }
}
