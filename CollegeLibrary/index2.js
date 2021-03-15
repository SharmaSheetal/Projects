showBooks();
function showBooks() {
    let localBooks = localStorage.getItem("localBooks");
        
        if (localBooks == null) {
            localBooksObj = [];  
                 
        }
        else {
            localBooksObj = JSON.parse(localBooks);
         
        }
        // tableBody.innerHTML = uiString;
        let uiString = "";
        localBooksObj.forEach(function (element,index) {
            uiString += `
                        <tr>
                            <td>${element.name}</td>
                            <td>${element.author}</td> 
                            <td>${element.type}</td>
                            <td><button type="button" onClick="delete_Row(this.id)" id="${index}" class="btn-close" aria-label="Close"></button></td>
                        </tr>
            `;
        });
        let tableBody = document.getElementById('tableBody');
        if (localBooksObj.length != 0) {
            tableBody.innerHTML = uiString;
        }
        else {
            tableBody.innerHTML = " Nothing to Show."
        }
}
function delete_Row(index){
    let localBooks = localStorage.getItem("localBooks");
        if (localBooks == null) {
            localBooksObj = [];  
                 
        }
        else {
            localBooksObj = JSON.parse(localBooks);
         
        }
        let delBook = localBooksObj[index].name;
        localBooksObj.splice(index, 1);

        localStorage.setItem("localBooks", JSON.stringify(localBooksObj));

        let message = document.getElementById('message');
        let boldText = 'Deleted';
        message.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>${boldText}: </strong> The book ${delBook} has been deleted from the library
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
        </div>`;
        setTimeout(() => {
            message.innerHTML = "";
        }, 2000);
        showBooks();
}
class Book
{ 
    constructor(name,author,type){
    this.name = name ,
    this.author = author ,
    this.type =type 
    }
} 
class Display{ 
    clear() {
        let libraryForm = document.getElementById('libraryForm');
        libraryForm.reset();}
    validate(book) {
            if (book.name.length < 2  || book.author.length < 2){
                return false
            }
            else{
                return true
            }
        }
    show(type,Message) {
            let message= document.getElementById('message');
            let boldText = type;
            message.innerHTML = `<div class="alert alert-${type} alert-dismissible fade show alert-primary" role="alert">
            <strong>${boldText}  </strong> ${Message}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>`
        setTimeout(() => {
            message.innerHTML=``;
        }, 2000);
        }
}
let libraryForm = document.getElementById('libraryForm');
libraryForm.addEventListener('submit',libraryFormSubmit);
function libraryFormSubmit(e) {
    e.preventDefault();
    // console.log("you have submitted your form");
    let display = new Display();
    let name = document.getElementById('bookName').value;
    let author =document.getElementById('author').value; 
    let type;
    let languages = document.getElementById('languages');
    let programming = document.getElementById('programming');
    let other = document.getElementById('other');
    if (languages.checked) {
        type=languages.value;
    } else if(programming.checked) {
        type=programming.value;
    }
    else if(other.checked){
        type=other.value;
    }
    let book = new Book(name,author,type);
    let localBooks = localStorage.getItem("localBooks");
    if (localBooks == null) {
        localBooksObj = [];              // phele notesobj array tha aab array of object hai
    }
    else {
        localBooksObj = JSON.parse(localBooks);
    }
    if (display.validate(book)){
            let obj = {
                name:name,
                author:author,
                type:type 
            }
            localBooksObj.push(obj);
                localStorage.setItem("localBooks", JSON.stringify(localBooksObj));
        }
   
    if (display.validate(book)){
        showBooks();
        display.clear();
        display.show("Success","Your book is Succesfully added");
    }
    else{
        display.show("Error!!","You Cannot Add this Book");
    }
}

let search = document.getElementById("searchTxt");// Grabing the input area.
search.addEventListener("input", function () { // add an event in the input area.
    let inputVal = search.value.toLowerCase();// grab the input value and convet it into lowercase.
    let tableBody = document.getElementById('tableBody');
    let tr = tableBody.getElementsByTagName('tr')
    Array.from(tr).forEach(function (element){
        // console.log(element);
        let td1 = element.getElementsByTagName("td")[0].textContent.toLowerCase();// gRabing the text 
        let td2 = element.getElementsByTagName("td")[1].textContent.toLowerCase();// gRabing the text 
        let td3 = element.getElementsByTagName("td")[2].textContent.toLowerCase();// gRabing the text 
        if (td1.includes(inputVal) || td2.includes(inputVal) || td3.includes(inputVal)) {// comparing
            element.style.display = "";// if matched, make display block of the particular element.

        }
        else {
            element.style.display = "none"; // else display none
        }
    }); 


});