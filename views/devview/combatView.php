<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface de Combat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .combat-container {
            background-color: #fff;
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .combat-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .enemy-stats {
            margin-bottom: 20px;
        }

        .enemy-stats div {
            margin: 5px 0;
        }

        .combat-buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .combat-log {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="combat-container">
        <div class="combat-title">Combat en cours</div>
        <div class="enemy-stats">
            <div><strong></strong> </div>
            <div><strong>PV:</strong> <?php echo $monstre->getPV(); ?> </div>
            <div><strong>Attaque:</strong> <?php echo $monstre->getStrength(); ?></div>
        </div>
        <div class="combat-buttons">
            
            <form method="post">
                <input type="submit" name="Attaquer" value="Attaquer"></>
            </form>
            <button>Potion</button>
            
        </div>
        <div class="combat-log" id="combat-log">
            C'est votre tour.
        </div>
    </div>
</body>
</html>
