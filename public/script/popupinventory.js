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

/**
 * hide the inventory popup
 */
function hiddenInventory() {
    popup.style.visibility = "hidden";
}

/**
 * display the inventory popup by setting its data attribute and making it visible
 */
function displayInventory() {
    popup.setAttribute("data", "./book/inventory");
    displayPopup();
}

/**
 * makes the popup visible
 */
function displayPopup() {
    popup.style.visibility = "visible";
}

/**
 * load and display details of a specific inventory item based on its ID
 */
function openInvDetails(id) {
    popup.setAttribute("data", FULLURLROOTPATH + "/book/inventory/details/" + id);
    popup.addEventListener("load", () => {
        const back = popup.contentDocument.getElementById("back");
        back.addEventListener("click", closeItemsDetails);
        back.style.visibility = "visible";
    });
}

/**
 * open specific item details from the general item view
 */
function openItemDetails(id) {
    popup.setAttribute("data", FULLURLROOTPATH +"/book/item/details/" + id);
    popup.addEventListener("load", () => {
        const back = popup.contentDocument.getElementById("back");
        back.addEventListener("click", hiddenInventory);
        back.style.visibility = "visible";
    });
}

/**
 * close the item details and revert back to the inventory view
 */
function closeItemsDetails() {
    window.book.updateStatusBar();
    popup.setAttribute("data", FULLURLROOTPATH +"/book/inventory");
}