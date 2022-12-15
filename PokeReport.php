<?php
session_start();

if (filter_input(INPUT_COOKIE, 'auth') != session_id()) {
    //redirect back to login form if not authorized
    header("Location: login.php");
    exit;
}

$address = "69.172.204.200";
$username = "bagelmancer";
$password = "Aanth_web_2022";
$dbname = "AJAXdb";

    $typeArr = $_POST['type'];
    $colorArr = $_POST['color'];
    $speciesArr = $_POST['species'];
    $weightArr = $_POST['weight'];

    $type1Q = "";
    $type2Q = "";
    $color1Q = "";
    $color2Q = "";
    $speciesQ = "";
    $weightQ = $weightArr;
    $queryCount = 0;
    $queryStr = "";

    $mysqli = mysqli_connect($address, $username, $password, $dbname);
    $select = "SELECT name, type1, type2, color1, color2, species, weight, url FROM pokedex, Links";
    $where = " WHERE ";

    if (isset($typeArr)) {
        $queryCount += 1;
        foreach ($typeArr as $value) {
            if ($type1Q === "") {
                $type1Q .= "(type1 = '" . $value . "'";
            } else {
                $type1Q .= " OR type1 = '" . $value . "'";
            }

            if ($type2Q === "") {
                $type2Q .= " OR (type2 = '" . $value . "'";
            } else {
                $type2Q .= " OR type2 = '" . $value . "'";
            }
        }
        $type1Q .= ")";
        $type2Q .= "))";

        if ($where === " WHERE ") {
            $where .= "(" . $type1Q . $type2Q;
        } else {
            $where .= " AND (" . $type1Q . $type2Q;
        }
    }

    if (isset($colorArr)) {
        $queryCount += 1;
        foreach ($colorArr as $value) {
            if ($color1Q === "") {
                $color1Q .= "(color1 = '" . $value . "'";
                $color2Q .= "(color2 = '" . $value . "'";
            } else {
                $color1Q .= " OR color1 = '" . $value . "'";
                $color2Q .= " OR color2 = '" . $value . "'";
            }
        }
        $color1Q .= ")";

        if ($where === " WHERE ") {
            $where .= $color1Q;
        } else {
            $where .= " AND " . $color1Q;
        }
    }

    if (isset($speciesArr)) {
        $queryCount += 1;
        foreach ($speciesArr as $value) {
            if ($speciesQ === "") {
                $speciesQ .= "(species = '" . $value . "'";
            } else {
                $speciesQ .= " OR species = '" . $value . "'";
            }
        }
        $speciesQ .= ")";

        if ($where === " WHERE ") {
            $where .= $speciesQ;
        } else {
            $where .= " AND " . $speciesQ;
        }
    }

    if (isset($weightArr) && $weightArr != "0") {
        $queryCount += 1;
        if ($where === " WHERE ") {
            $where .= "weight < " . intval($weightQ);
        } else {
            $where .= " AND weight < " . intval($weightQ);
        }
    }

    if (!isset($typeArr) && !isset($colorArr) && $weightArr === "0" && !isset($speciesArr)) {
        $pkmnSQL = $select . " WHERE name = pname;";
    } else {
        $pkmnSQL = $select . $where . " AND name = pname;";
    }

    $result = mysqli_query($mysqli, $pkmnSQL) OR die(mysqli_error($mysqli));
    if (mysqli_num_rows($result) >= 1) {
        ?>
        <html>
            <head>
                <link rel="stylesheet" href="PokeStyle.css">
                <title>
                    Pokelex
                </title>
            </head>
            <body>
                <h2>
                    <?php
                    echo 'Pokemon that match your choices';
                    ?>
                </h2>
                <table>
                    <tr>
                        <td>
                            <strong>Name
                        </td>
                        <td>
                            <strong>Type 1</strong>
                        </td>
                        <td>
                            <strong>Type 2</strong>
                        </td>
                        <td>
                            <strong>Color 1</strong>
                        </td>
                        <td>
                            <strong>Color 2</strong>
                        </td>
                        <td>
                            <strong>Species</strong>
                        </td>
                        <td>
                            <strong>Weight</strong>
                        </td>
                        <td>
                            <strong>URL</strong>
                        </td>
                    </tr>
                    <?php
                    runQuery($result);
                    ?>
                </table>
                <form action="PokeForm.php">
                    <input type="submit" value="Back to Form" />
                </form>
            </body>
        </html>

        <?php
    } else {
        ?>

        <html>
            <head>
                <style>
                    body {
                        background-color: bisque;
                    }
                </style>
            </head>
            <body>
                <?php
                echo "No results match your unique tastes! Try again with different parameters";
                ?>
                <form action="PokeForm.php">
                    <input type="submit" value="Go back">
                </form>
            </body>
        </html>

        <?php
    }

function runQuery($result) {
    while ($info = mysqli_fetch_array($result)) {
        echo "<tr><td>" . $info['name'] . "</td><td>" . $info['type1'] . "</td> " . " <td>" . $info['type2'] . "</td> " . " <td>" . $info['color1'] . "</td>" . " <td>" . $info['color2'] . "</td>" . " <td>" . $info['species'] . "</td>" . " <td>" . $info['weight'] . "</td>" . " <td><a target ='_blank' href=" . $info['url'] . ">Visit Page</a></td>";
    }
}
?>