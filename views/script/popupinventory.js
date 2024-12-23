const popup = document.getElementById("inventory");
popup.style.visibility = "hidden";

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

function displayInventory(){
    console.log("display");
    popup.style.visibility = "visible";
}

function hiddenInventory(){
    console.log("hidden");
    popup.style.visibility = "hidden";
}
