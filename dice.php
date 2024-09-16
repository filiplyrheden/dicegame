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
    </style>
</head>

<body>
    <p>Dice one: <b><?= $firstDice ?></b></p>
    <p>Dice two: <b><?= $secondDice ?></b></p>
    <p>Dice three: <b><?= $thirdDice ?></b></p>
    <br>
    <p id="score">Score:<?= $score ?></p>

    <br>

    <p>
        <?php

        if ($score > 13)
            echo "Wow! Score of 14 points or more!"
        ?>

    </p>

    <p>
        <?php

        if ($firstDice == $secondDice && $secondDice == $thirdDice)
            echo "Three pairs!";

        ?>

    </p>

</body>

</html>