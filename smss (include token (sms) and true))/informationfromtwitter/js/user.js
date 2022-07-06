
let wholdContainEachUser = document.querySelector('.containerForEachUser')
axios.get('http://127.0.0.1:8000/api/users/' + JSON.parse(localStorage.getItem('user_id'))).then((result) => {
    console.log(result.data);
    let datasOfUser = result.data;
    


    let allPosts = datasOfUser.posts;
    console.log(allPosts);
    eachContainer = document.createElement('div');
    
    
    for (let i = 0; i < allPosts.length; i++) {
        let eachName = document.createElement('p');
        let post_title = document.createElement('p');
        let post_description = document.createElement('p');
        eachName.textContent =datasOfUser.name;      
        post_title.textContent =allPosts[i].title;
        post_description.textContent =allPosts[i].description;
        eachContainer = document.createElement('div');
        eachContainer.className = 'name';
        eachContainer.appendChild(eachName);
        eachContainer.appendChild(document.createElement('hr'))
        eachContainer.appendChild(post_title);
        eachContainer.appendChild(post_description);
        eachContainer.appendChild(document.createElement('hr'))

        let allComments = allPosts[i].comments;
        for (let j = 0; j < allComments.length; j++){
            let comment = document.createElement('p');
            comment.textContent = allComments[j].text;
            eachContainer.appendChild(comment);
        }
        
        wholdContainEachUser.appendChild(eachContainer);
    }

    

}).catch((err) => {
    console.log(err);
});


let btn = document.querySelector('#back');


document.body.appendChild(wholdContainEachUser);