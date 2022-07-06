
let wholdContain = document.querySelector('.container');
wholdContain.className = 'contain';


function showData() {
    axios.get('http://127.0.0.1:8000/api/users').then((result) => {
    let users = result.data;
    console.log(users);
    
    localStorage.setItem('users', JSON.stringify(users));


    for (let i = 0; i < users.length; i++) {
        let nameUser = document.createElement('h3');
        nameUser.setAttribute("data-id",users[i].id); //set it's id = data-id


        let userContainer = document.createElement('div');
        let line1 = document.createElement('hr');
        userContainer.className = 'name';

        nameUser.textContent = users[i].name;
        nameUser.style.color = 'Red'
        nameUser.style.cursor = 'pointer';
        userContainer.appendChild(nameUser);
        userContainer.appendChild(line1)

        wholdContain.appendChild(userContainer);
        for (let p = 0; p < users[i].posts.length; p++) {
            let title = document.createElement('h4');
            let description = document.createElement('h4');
            let line2 = document.createElement('hr');

            
            title.textContent = users[i].posts[p].title;
            description.textContent =  users[i].posts[p].description;
            userContainer.appendChild(title);
            userContainer.appendChild(description);
            userContainer.appendChild(line2);
        }
        
        for (let c = 0; c < users[i].comments.length; c++) {
            let text = document.createElement('h5');
            
            text.textContent = users[i].name + ": " + users[i].comments[c].text;
            userContainer.appendChild(text);
        }
    }
}).catch((err) => {
    console.log(err);
});
}

showData();


wholdContain.addEventListener('click', (e) => {
    localStorage.setItem('user_id', e.target.dataset.id);
    window.location.href = "/user.html";
})