class Mailbox {
    private mails: Mail[] = [];
    constructor(private name: string){}    
}


abstract class Mail {
    constructor( 
        protected title: string,
        protected body: string,
    ){}
}

class ReceivedMail extends Mail{
    constructor (
        title: string,
        body: string,
        private receivedDate: string,
        private from:User
    ){super(title, body)}
}

class SentMail extends Mail{
    constructor (
        title: string,
        body: string,
        private sentDate: string,
        private to:User
    ){super(title, body);}
}

class User {
    constructor (
        public firstName: string,
        public lastName: string
    ){}
}

// MAIN ----------------
let phandy = new User('Phandy', 'Phorn');

let receivedMail = new ReceivedMail('Student', 'Studnet In PNC', 'Jan, 2022', phandy);
let sentMail = new SentMail('Student', 'Student In PNC', 'Feb, 2022', phandy);

let wholeMails = new Mailbox('PNC Mail');
