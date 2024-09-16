<?php

$firstDice = mt_rand(1, 6);
$secondDice = mt_rand(1, 6);
$thirdDice = mt_rand(1, 6);
$score = $firstDice + $secondDice + $thirdDice;
$bonusScore = 0;

if ($score > 13)
    $bonusScore = +1;

if ($firstDice == $secondDice && $secondDice == $thirdDice)
    $bonusScore = +2;

$totalScore = $score + $bonusScore; 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice</title>
    <link rel="stylesheet" href="styles.css">
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
    <p id="bonusscore">Bonus:<?= $bonusScore ?></p>
    <p class="alert">
        <?php

        if ($score > 13)
            echo "You scored 14 points or more!"
        ?>

    </p>

      <p class="alert">
        <?php

        if ($firstDice == $secondDice && $secondDice == $thirdDice)
            echo "Three pairs!";

        ?>

<p id="score">Score:<?= $totalScore ?></p>

    <!-- <div class="dice first-dice">
        <span class="dot"> </span>
    </div> -->

</body>

</html>