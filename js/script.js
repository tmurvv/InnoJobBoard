//JavaScript file

"use strict";

function startEditSelector(clickedItem) {
    alert('imin: ' + clickedItem);
    var item=clickedItem.parentElement.previousElementSibling.children[0];
    var itemOrder=item.parentElement.previousElementSibling.children[0];
    var saveButt=clickedItem.nextElementSibling;

    item.disabled=false;
    itemOrder.disabled=false;
    saveButt.style.visibility="visible";
    saveButt.style.opacity=1;
    clickedItem.style.visibility="hidden";
    clickedItem.style.opacity=0;
    
}