<?php

$firstDice = mt_rand(1, 6);
$secondDice = mt_rand(1, 6);
$thirdDice = mt_rand(1, 6);
$score = $firstDice + $secondDice + $thirdDice;
$bonusScore = 0;

function checkStraight($diceRolls)
{

    sort($diceRolls);

    for ($i = 1; $i < count($diceRolls); $i++) {
        if ($diceRolls[$i] != $diceRolls[$i - 1] + 1) {
            return false;
        }
    }

    return true;
}

$diceRolls = [$firstDice, $secondDice, $thirdDice];

if ($score > 13)
    $bonusScore += 1;

if ($firstDice == $secondDice && $secondDice == $thirdDice)
    $bonusScore += 2;

if (checkStraight($diceRolls))
    $bonusScore += 3;

$totalScore = $score + $bonusScore;

if (isset($_POST['play_computer'])) {
    $computerFirstDice = mt_rand(1, 6);
    $computerSecondDice = mt_rand(1, 6);
    $computerThirdDice = mt_rand(1, 6);
    $computerScore = $computerFirstDice + $computerSecondDice + $computerThirdDice;
    $computerBonusScore = 0;
    $computerDiceRolls = [$computerFirstDice, $computerSecondDice, $computerThirdDice];

    if ($computerScore > 13)
        $computerBonusScore += 1;

    if ($computerFirstDice == $computerSecondDice && $computerSecondDice == $computerThirdDice)
        $computerBonusScore += 2;

    if (checkStraight($computerDiceRolls))
        $computerBonusScore += 3;

    $computerTotalScore = $computerScore + $computerBonusScore;

    if ($totalScore > $computerTotalScore) {
        $resultMessage = "You win!";
    } elseif ($totalScore < $computerTotalScore) {
        $resultMessage = "Computer wins!";
    } else {
        $resultMessage = "It's a tie!";
    }
}

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
    <form method="POST">
        <button type="submit" name="roll" class="button-1">Play yourself</button>
        <button type="submit" name="play_computer" class="button-2">Play against computer</button>
    </form>
    <p>Dice one: <b><?= $firstDice ?></b></p>
    <p>Dice two: <b><?= $secondDice ?></b></p>
    <p>Dice three: <b><?= $thirdDice ?></b></p>
    <br>
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

    <p class="alert">

        <?php

        if (checkStraight($diceRolls))
            echo "It's a straight!";

        ?>
    </p>

    <p id="bonusscore">Bonus: <?= $bonusScore ?></p>
    <p class="score">Your points: <?= $totalScore ?></p>

    <?php if (isset($resultMessage)) : ?>
        <p><b>Computer rolled:</b></p>
        <p>Dice one: <b><?= $computerFirstDice ?></b></p>
        <p>Dice two: <b><?= $computerSecondDice ?></b></p>
        <p>Dice three: <b><?= $computerThirdDice ?></b></p>
        <br>
        <p>Computer bonus: <?= $computerBonusScore ?></p>
        <p class="score">Computer points: <?= $computerTotalScore ?></p>
        <h2>Result: <?= $resultMessage ?></h2>
    <?php endif; ?>

    <!--
    <div class="dice first-dice">
        <span class="dot"> </span>
    </div>

    <div class="dice second-dice">
        <span class="dot" id="dot-2-1"> </span>
        <span class="dot" id="dot-2-2"> </span>
    </div>

    <div class="dice third-dice">
        <span class="dot" id="dot-3-1"> </span>
        <span class="dot" id="dot-3-2"> </span>
        <span class="dot" id="dot-3-3"> </span>
    </div>
    -->

</body>

</html>