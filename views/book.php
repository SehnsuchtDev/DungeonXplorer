<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="../public/script/script.js"></script>
</head>
<body>
        <div id="book" class="pointer-events-none z-0">
            
            <div class="my-page bg-blue-900" data-density="soft">
                Page Cover
                <button class="btn-next z-10 pointer-events-auto">page après</button>
            </div>

            <div class="my-page bg-orange-600">
                <h1>page de fou malade 1</h1>
                <button class="btn-prev z-10 pointer-events-auto">retour en arriere</button>
            </div>
            <div class="my-page bg-orange-600">
                <h1>page de fou malade 2</h1>
                <button class="btn-attack z-10 pointer-events-auto">attaquer</button>
                <button class="btn-next z-10 pointer-events-auto">next</button>
            </div>

            <div class="my-page bg-pink-300" id="next-page1"></div>
            <div class="my-page bg-pink-300" id="next-page2"></div>

            <div class="my-page bg-blue-900" data-density="soft">
                fin
                <button class="btn-prev z-10 pointer-events-auto">page avant</button>
            </div>
            
        </div>
</body>
</html>