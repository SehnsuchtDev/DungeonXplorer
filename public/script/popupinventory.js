const popup = document.getElementById("inventory-object");
const primary = document.getElementById("primary-weapon");
const secondary = document.getElementById("secondary-weapon");

// management of the inventory popup
popup.style.visibility = "hidden";

popup.addEventListener("load", () => {
    window.book.updateStatusBar();

    const close = popup.contentDocument.getElementById("close");
    close.addEventListener("click", () => {
        closeItemsDetails();
        hiddenInventory();
    });

    const items = popup.contentDocument.querySelectorAll("th");

    items.forEach(item => {
        item.addEventListener("click", () => {
            let value = item.getAttribute("value");
            if(value !== null) openInvDetails(value);
        });
    });


});

function hiddenInventory() {
    popup.style.visibility = "hidden";
}

function displayInventory() {
    popup.setAttribute("data", "./book/inventory");
    displayPopup();
}

function displayPopup() {
    popup.style.visibility = "visible";
}

function openInvDetails(id) {
    popup.setAttribute("data", "./book/inventory/details/" + id);
    popup.addEventListener("load", () => {
        const back = popup.contentDocument.getElementById("back");
        back.addEventListener("click", closeItemsDetails);
        back.style.visibility = "visible";
    });
}

function openItemDetails(id) {
    popup.setAttribute("data", "./book/item/details/" + id);
    popup.addEventListener("load", () => {
        const back = popup.contentDocument.getElementById("back");
        back.addEventListener("click", hiddenInventory);
        back.style.visibility = "visible";
    });
}

function closeItemsDetails() {
    window.book.updateStatusBar();
    popup.setAttribute("data", "./book/inventory");
}