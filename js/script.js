//JavaScript file

"use strict";

function adminProtect() {
    var chances = 1;
    var pass1 = prompt('Please Enter Your Password',' ');
    while (chances < 7) {
        if (!pass1) {
            history.go(-1);
        }
        if (pass1.toLowerCase() == "admin4014") {
            //alert('Loading Admin Page');
            window.open("https://take2tech.ca/InnoTech/JobBoard/admin.php");
            break;
        } 
        chances+=1;
        var pass1 = 
        prompt('Password Incorrect, Please Try Again.','Password');
    }
    if (pass1.toLowerCase()!="password" && chances ==7) {
        history.go(-1);
    }
    return " ";
}  

function startEditSelector(clickedItem) {
    if(clickedItem.innerHTML=="Edit"){
        if(!confirm("Editing a category, job type, or location will change all of the job listings using that category, job type, or location.")){
            return;
        }
    }
    var item=clickedItem.parentElement.previousElementSibling.children[0];
    var itemOrder=item.parentElement.previousElementSibling.children[0];
    var itemContent=item.value;
    var itemOrderContent=itemOrder.value;
        
    if(clickedItem.innerHTML=="Edit") { 
        item.disabled=false;
        itemOrder.disabled=false;  
        clickedItem.innerHTML="Save";
        return;
    } 

    if(clickedItem.innerHTML=="Save"){
        clickedItem.type="submit";      
    }     
}