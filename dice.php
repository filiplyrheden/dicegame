<?php

$firstDice = mt_rand(1, 6);
$secondDice = mt_rand(1, 6);
$thirdDice = mt_rand(1, 6);
$score = $firstDice + $secondDice + $thirdDice;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice</title>
    <style>
        b {
            font-size: 20px;
        }

        #score {
            font-size: 40px;
            font-weight: bold;
        }

        .alert {
            color: red;
        }

        button {
            background-color: red;
            border: 2px solid #1A1A1A;
            border-radius: 15px;
            color: #FFFFFF;
            font-size: 16px;
            font-weight: 600;
            min-height: 60px;
        }
    </style>
</head>

<body>
    <p>Dice one: <b><?= $firstDice ?></b></p>
    <p>Dice two: <b><?= $secondDice ?></b></p>
    <p>Dice three: <b><?= $thirdDice ?></b></p>
    <br>
    <form method="POST">
        <button type="submit" name="roll">Roll dice</button>
    </form>
    <br>
    <p id="score">Score:<?= $score ?></p>

    <br>

    <p class="alert">
        <?php

        if ($score > 13)
            echo "Wow! Score of 14 points or more!"
        ?>

    </p>

    <p class="alert">
        <?php

        if ($firstDice == $secondDice && $secondDice == $thirdDice)
            echo "Three pairs!";

        ?>

    </p>

</body>

</html>