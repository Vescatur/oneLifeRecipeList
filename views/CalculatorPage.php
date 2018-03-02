<?php

/**
 * @param int $age
 */
function printAgeH2($age){
    echo("<h2 class='objectHeader'>Age: $age</h2>");

}

/**
 * @param Transition $Transition
 * @param $MaterialID
 */
function printRecipe($Transition, $MaterialID)
{
    $Requirement1 = $Transition->requirement1;
    $Requirement2 = $Transition->requirement2;
    $Result1 = $Transition->result1;
    $Result2 = $Transition->result2;
    $Time = $Transition->recipeTime;

    echo "<p>";
    if ($Requirement1 == -1 or $Requirement2 == -1 or $Result1 == -1 or $Result2 == -1) {
        echo "$Time Seconds + ";
    }
    if ($Requirement1 != 0 and $Requirement1 != -1) {
        if ($MaterialID == $Requirement1) {
            echo "<b>";
            echo(GetNameFromMaterialID($Requirement1));
            echo "</b>";
        } else {
            $name = GetNameFromMaterialID($Requirement1);
            echo("<a href='#$name'>$name</a>");
        }
    }

    if ($Requirement1 != 0 and $Requirement2 != 0 and $Requirement1 != -1 and $Requirement2 != -1) {
        echo " + ";
    } elseif ($Requirement1 == 0 and $Requirement2 == 0) {
        echo " Empty";
    }


    if ($Requirement2 != 0 and $Requirement2 != -1) {
        if ($MaterialID == $Requirement2) {
            echo "<b>";
            echo(GetNameFromMaterialID($Requirement2));
            echo "</b>";
        } else {
            $name = GetNameFromMaterialID($Requirement2);
            echo("<a href='#$name'>$name</a>");
        }
    }

    echo " = ";

    if ($Result1 != 0 and $Result1 != -1) {
        if ($MaterialID == $Result1) {
            echo "<b>";
            echo(GetNameFromMaterialID($Result1));
            echo "</b>";
        } else {
            $name = GetNameFromMaterialID($Result1);
            echo("<a href='#$name'>$name</a>");
        }
    }

    if ($Result1 != 0 and $Result2 != 0 and $Result1 != -1 and $Result2 != -1) {
        echo " + ";
    } elseif ($Result1 == 0 and $Result2 == 0) {
        echo " Empty";
    }


    if ($Result2 != 0 and $Result2 != -1) {
        if ($MaterialID == $Result2) {
            echo "<b>";
            echo(GetNameFromMaterialID($Result2));
            echo "</b>";
        } else {
            $name = GetNameFromMaterialID($Result2);
            echo("<a href='#$name'>$name</a>");
        }
    }
    echo "</p>";

}

function GetNameFromMaterialID($MaterialID)
{
    global $class;
    for ($i = 0; $i < count($class->objectList); $i++) {
        if ($class->objectList[$i]->object->id == $MaterialID) {
            return $class->objectList[$i]->object->name;
        }
    }
    return "Not_Found";
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            display: flex;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
            flex-direction: column;
            background: lightgray;
        }

        .objectList{
            -webkit-box-shadow: 10px 10px 40px -4px rgba(0,0,0,0.75);
            -moz-box-shadow: 10px 10px 40px -4px rgba(0,0,0,0.75);
            box-shadow: 10px 10px 40px -4px rgba(0,0,0,0.75);
            background:white;
        }

        .objectArticle{
            margin:5px;
            border-top: solid 1px black;
        }

        a{
            text-decoration: none;
            outline:none;
            color: black;
        }

        .inputSearchDiv{
            padding:10px 13px 10px 7px;
        }

        .inputSearch{
            width:100%;
            height:20px;
        }
        .objectHeader{
            display:flex;
        }
        .objectHeader{
            display:flex;
            justify-content: space-between;
        }
        .objectGoToRecipe{
            color:blue;
            padding-left: 10px;
        }
    </style>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-109327422-1', 'auto');
        ga('send', 'pageview');
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<h1>Recipe List</h1>
<section class="objectList">
    <?php
    var_dump($class->ageList);
    ?>
</section>

</body>
</html>