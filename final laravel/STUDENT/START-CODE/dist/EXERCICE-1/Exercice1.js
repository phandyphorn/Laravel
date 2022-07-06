class Mailbox {
    constructor(name) {
        this.name = name;
        this.mails = [];
    }
}
class Mail {
    constructor(title, body) {
        this.title = title;
        this.body = body;
    }
}
class ReceivedMail extends Mail {
    constructor(title, body, receivedDate, from) {
        super(title, body);
        this.receivedDate = receivedDate;
        this.from = from;
    }
}
class SentMail extends Mail {
    constructor(title, body, sentDate, to) {
        super(title, body);
        this.sentDate = sentDate;
        this.to = to;
    }
}
class User {
    constructor(firstName, lastName) {
        this.firstName = firstName;
        this.lastName = lastName;
    }
}
// MAIN ----------------
let phandy = new User('Phandy', 'Phorn');
let receivedMail = new ReceivedMail('Student', 'Studnet In PNC', 'Jan, 2022', phandy);
let sentMail = new SentMail('Student', 'Student In PNC', 'Feb, 2022', phandy);
let wholeMails = new Mailbox('PNC Mail');
