<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pop-up</title>
   	<script src="https://cdn.tailwindcss.com"></script>
	<script src="public/script/tailwind.config.js"></script>
    <script defer src="./script/popupinventory.js"></script>
</head>
<body class="bg-[#2E2E2E]">
    <button onclick="displayInventory()">Cliquer ici</button>
    <div id="inventory">
        <table>
            <thead>
                <tr>
                    <th class="bg-[#1A1A1A]"> a </th>
                    <th class="bg-[#1A1A1A]"> b </th>
                    <th class="bg-[#1A1A1A]"> c </th>
                    <th class="bg-[#1A1A1A]"> d </th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th class="bg-[#1A1A1A]"> e </th>
                    <th class="bg-[#1A1A1A]"> f </th>
                    <th class="bg-[#1A1A1A]"> g </th>
                    <th class="bg-[#1A1A1A]"> h </th>
                </tr>
            </thead>
        </table>
        
    </div>
</body>

</html>