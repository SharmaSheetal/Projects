console.log("Welcome to notes app. This is app.js");
showNotes();

// If user adds a note, add it to the localStorage
let addbtn = document.getElementById("addbtn");
addbtn.addEventListener("click", function (e) {
    let addtxt = document.getElementById("exampleFormControlTextarea1");
    let addTitle = document.getElementById("addTitle");
    // console.log(addtxt);
    let notes = localStorage.getItem("notes");
    if (notes == null) {
        notesobj = [];              // phele notesobj array tha aab array of object hai
    }
    else {
        notesobj = JSON.parse(notes);
    }
    let obj = {
        title : addTitle.value,
        text : addtxt.value
    }
    notesobj.push(obj);
    localStorage.setItem("notes", JSON.stringify(notesobj));
    addtxt.value = "";
    addTitle.value = "";
    // console.log(notesobj);
    showNotes();
});
//function to show elements
function showNotes() {
    let notes = localStorage.getItem("notes");
    if (notes == null) {
        notesobj = [];
    }
    else {
        notesobj = JSON.parse(notes);
    }
    let html = "";
    notesobj.forEach(function (element, index) {
        html += `
            <div class="card noteCard my-2 mx-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">${element.title}</h5>
                    <p class="card-text">${element.text}</p>
                    <button type="button" onClick="deleteNote(this.id)" class="btn btn-primary" id="${index}">Delete Note</button>
                </div>
            </div>
        `;
    });
    let notesElm = document.getElementById("notes");
    if (notesobj.length != 0) {
        notesElm.innerHTML = html;
    }
    else {
        notesElm.innerHTML = " Nothing to Show."
    }
}

// Function to delete note
function deleteNote(index) {
    console.log("Deleted note ", index);
    let notes = localStorage.getItem("notes");
    if (notes == null) {
        notesobj = [];
    }
    else {
        notesobj = JSON.parse(notes);
    }
    notesobj.splice(index, 1);
    localStorage.setItem("notes", JSON.stringify(notesobj))
    showNotes();
}
// Search Logic
let search = document.getElementById("searchTxt");// Grabing the input area.
search.addEventListener("input", function () { // add an event in the input area.
    let inputVal = search.value.toLowerCase();// grab the input value and convet it into lowercase.
    // console.log("Input Event fired" , inputVal);
    let noteCard = document.getElementsByClassName("noteCard");// grabbing  all cards by class name
    Array.from(noteCard).forEach(function (element) { //converting it into array and iterating
        let cardTxt = element.getElementsByTagName("p")[0].innerText;// gRabing the text
        if (cardTxt.includes(inputVal)) {// comparing
            element.style.display = "block";// if matched, make display block of the particular element.

        }
        else {
            element.style.display = "none"; // else display none
        }
    });
});

// add tittle
// mark a note as important 
// Seperate notes by user 
// sync with server and host to web server 


