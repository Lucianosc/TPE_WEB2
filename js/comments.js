
const app = new Vue({
    el: '#app-comments',
    data: {
        comments: [],
        commentsLength: 0
    },
    methods: {
        deleteComment: function (event) {
            commentId = event.currentTarget.id;
            deleteComment(commentId);
        }
    }
})


document.addEventListener("DOMContentLoaded", () => {
    "use strict"
    getFlatComments();

    let div = document.querySelector("#comment-form");
    if(div != null){
        document.getElementById("comment-form").addEventListener("submit", e => {
            e.preventDefault();
            addComment();
        })
    }
});

const flatId = document.getElementById("vue-div").getAttribute("flat-id");
const userId = document.getElementById("vue-div").getAttribute("user-id");
const nameUser = document.getElementById("vue-div").getAttribute("user-name");

function getFlatComments(){
    fetch("api/flatComments/" + flatId)
    .then(response => response.json())
    .then(response => {
        app.comments = response;
        app.commentsLength = response.length;
    })
    .catch(error => console.log(error));
}

function deleteComment(id){
    fetch("api/comments/" + id, {method: "DELETE"})
    .then(response => {
        if(!response.ok)
            console.log(response);

        return response.json();
    })
    .then(response => {
        deleteCommentById(id);
        app.commentsLength = app.comments.length;
    })
    .catch(error => console.log(error));
}

function deleteCommentById(id){
    for (let i = 0; i < app.commentsLength; i++){
        if(app.comments[i].id_comentario == id){
            app.comments.splice(i, 1);
            return;
        }
    }
}

function addComment(){

    let inputs = document.querySelectorAll("div.rating input[name='rating']");
    let number;
    inputs.forEach(element => {
        if(element.checked){
            number = element.value;
        }
    });

    let comment = {
        nombre_usuario: nameUser,
        id_depto_fk: flatId,
        id_usuario_fk: userId,
        puntaje: number,
        texto: document.querySelector('#input-text').value
    }

    fetch("api/comments", {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(comment)
    })
    .then(response => {
        if(!response.ok)
            console.log(response);

        return response.json();
    })
    .then(comment => {
        app.comments.push(comment);
        app.commentsLength = app.comments.length;
    })
    .catch(error => console.log(error));
}