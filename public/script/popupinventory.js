const button = document.getElementById("inventory-button");
const popup = document.getElementById("inventory-object");
const primary = document.getElementById("primary-weapon");
const secondary = document.getElementById("secondary-weapon");

// management of the inventory popup
popup.style.visibility = "hidden";

popup.addEventListener("load", () => {
    console.log("loaded");

    const close = popup.contentDocument.getElementById("close");
    close.addEventListener("click", hiddenInventory);

    const items = popup.contentDocument.querySelectorAll("th");

    items.forEach(item => {
        item.addEventListener("click", () => {
            console.log(item);
            openItemDetails();
        });
    });


});

// inventory button in the hero bar
button.addEventListener("click", displayInventory);

// weapon buttons in the hero bar
primary.addEventListener("click", () => {
    openItemDetails();
    displayInventory();
});

secondary.addEventListener("click", () => {
    openItemDetails();
    displayInventory();
});

/*
const tableData = [
    ['a', 'b', 'c', 'd'], // Première ligne
    ['e', 'e', 'f', 'g'], // Deuxième ligne
];


const table = document.getElementById("table");

// Générer les lignes et les cellules
tableData.forEach(rowData => {

    const row = document.createElement("tr"); // Crée une ligne
    rowData.forEach(cellData => {
        const cell = document.createElement('th'); // Crée une cellule
        cell.textContent = cellData; // Ajoute le contenu
        cell.className = "bg-[#1A1A1A] border border-[#C4975E] p-5"; // Ajoute les classes
        row.appendChild(cell); // Ajoute la cellule à la ligne
    });
    table.appendChild(row); // Ajoute la ligne au tableau
});
*/


function hiddenInventory() {
    popup.style.visibility = "hidden";
}

function displayInventory() {
    popup.style.visibility = "visible";
}

function openItemDetails() {
    popup.setAttribute("data", "./popupitemsinventory.php");
}

function closeItemsDetails() {
    popup.setAttribute("data", "./popupinventory.php");
}