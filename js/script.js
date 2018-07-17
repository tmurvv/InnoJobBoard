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
    var item;
    var itemOrder;
    var itemEdit;
    var itemOrderEdit;
    var cancelButton;
    
    if(clickedItem.innerHTML=="Edit") {
        
        item=clickedItem.parentElement.previousElementSibling.children[0];
        itemOrder=item.parentElement.previousElementSibling.children[0];
        itemEdit=clickedItem.parentElement.previousElementSibling.children[1];
        itemOrderEdit=item.parentElement.previousElementSibling.children[1];
        cancelButton=clickedItem.parentElement.nextElementSibling.children[0];
        if(!confirm("Editing a " + item.name + " will cause all job listings with that " + item.name + " to be unsearchable by that " + item.name + ". You may wish to add a new " + item.name + " instead.")){
            return;
        }

        itemEdit.value=item.value;
        itemOrderEdit.value=itemOrder.value;

        item.hidden=true;
        itemOrder.hidden=true;
        itemEdit.hidden=false;
        itemOrderEdit.hidden=false;

        clickedItem.innerHTML="Save";
        cancelButton.innerHTML="Cancel";
        cancelButton.style="background-color:yellow;color:#333";
        
        return;
    }

    if(clickedItem.innerHTML=="Cancel"){
        item=clickedItem.parentElement.previousElementSibling.previousElementSibling.children[0];
        itemOrder=clickedItem.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.children[0];
        itemEdit=clickedItem.parentElement.previousElementSibling.previousElementSibling.children[1];
        itemOrderEdit=clickedItem.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.children[1];
        cancelButton=clickedItem;

        itemEdit.value=item.value;
        itemOrderEdit.value=itemOrder.value;
        itemOrder.hidden=false;
        itemOrderEdit.hidden=true;
        item.hidden=false;
        itemEdit.hidden=true;
        clickedItem.parentElement.previousElementSibling.children[0].innerHTML="Edit";
        cancelButton.innerHTML="Delete";
        cancelButton.style="background-color:red;color:#fff";
        return;       
    }
    if(clickedItem.innerHTML=="Delete"){
        if(!confirm("Delete Item?")) {
            return;
        }
        clickedItem.type="submit";
    }
    

    if(clickedItem.innerHTML=="Save"){
        item=clickedItem.parentElement.previousElementSibling.children[0];
        itemOrder=item.parentElement.previousElementSibling.children[0];
        itemEdit=clickedItem.parentElement.previousElementSibling.children[1];
        itemOrderEdit=item.parentElement.previousElementSibling.children[1];
        cancelButton=clickedItem.parentElement.nextElementSibling.children[0];

        item.value=itemEdit.value;
        itemOrder.value=itemOrderEdit.value;
        item.hidden=false;
        itemOrder.hidden=false;
        itemEdit.hidden=true;
        itemOrderEdit.hidden=true;
        cancelButton.innerHTML="Delete";
        cancelButton.style="background-color:red;color:#fff";
        clickedItem.innerHTML="Edit";
        clickedItem.type="submit";      
    }     
}

$(document).ready(function() {
    /* Mobile navigation */
    $('.js--mainNav-icon').click(function() {
        var nav = $('.js--mainNav');
        var icon = $('.js--mainNav-icon i');
        
        nav.slideToggle(200, function() {
            if (nav.is(":hidden")) {
                nav.removeAttr("style");               
            }
        });

        if (icon.hasClass('fa-bars')) {
            icon.addClass('fa-window-close');
            
        } else {
            icon.addClass('fa-bars');
            icon.removeClass('fa-window-close');           
        }             
    });
});