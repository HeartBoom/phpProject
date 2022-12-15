<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="PokeStyle.css">
        <title>Pokelex</title>
    </head>
    <body onload="hideElements()">
        <script src="PokeScripts.js">
        </script>
        <div>
            <h1>Welcome to the Pokedex!</h1>
            <h3>Select some attributes to find a Pokemon for you</h3>
        </div>

        <div class='parent'>
            <div style="font-size: 16px;"><strong>Preferences</strong></div>
            <div class='child'><strong>Type: </strong></div>
            <div class='child' id='ptype'></div><br />
            <div class='child'><strong>Color: </strong></div>
            <div class='child' id='pcolor'></div><br />
            <div class='child'><strong>Species: </strong></div>
            <div class='child' id='pspecies'></div><br /><br />
        </div>

        <form action="PokeReport.php" method="POST">
            <div>
                <div>
                    <input type="checkbox" id ="hideType" onchange="toggleType('Type')">Pokemon Type
                </div>
                <div id="selectType" class="indent">
                    <div>What are your favorite types?</div>
                    <input id="fire" type="checkbox" name="type[]" value="fire" onchange="buildQuery(this.value, 'ptype')">Fire<br />
                    <input id="water"  type="checkbox" name="type[]" value="water" onchange="buildQuery(this.value, 'ptype')">Water<br />
                    <input id="grass"  type="checkbox" name="type[]" value="grass" onchange="buildQuery(this.value, 'ptype')">Grass<br />
                    <input id="normal"  type="checkbox" name="type[]" value="normal" onchange="buildQuery(this.value, 'ptype')">Normal<br />
                    <input id="flying"  type="checkbox" name="type[]" value="flying" onchange="buildQuery(this.value, 'ptype')">Flying<br />
                    <input id="bug"  type="checkbox" name="type[]" value="bug" onchange="buildQuery(this.value, 'ptype')">Bug<br />
                    <input id="poison"  type="checkbox" name="type[]" value="poison" onchange="buildQuery(this.value, 'ptype')">Poison<br />
                    <input id="ice"  type="checkbox" name="type[]" value="ice" onchange="buildQuery(this.value, 'ptype')">Ice<br />
                    <input id="electric"  type="checkbox" name="type[]" value="electric" onchange="buildQuery(this.value, 'ptype')">Electric<br />
                    <input id="ground"  type="checkbox" name="type[]" value="ground" onchange="buildQuery(this.value, 'ptype')">Ground<br />
                    <input id="rock"  type="checkbox" name="type[]" value="rock" onchange="buildQuery(this.value, 'ptype')">Rock<br />
                    <input id="fighting"  type="checkbox" name="type[]" value="fighting" onchange="buildQuery(this.value, 'ptype')">Fighting<br />
                    <input id="psychic"  type="checkbox" name="type[]" value="psychic" onchange="buildQuery(this.value, 'ptype')">Psychic<br />
                    <input id="ghost"  type="checkbox" name="type[]" value="ghost" onchange="buildQuery(this.value, 'ptype')">Ghost<br />
                    <input id="dragon"  type="checkbox" name="type[]" value="dragon" onchange="buildQuery(this.value, 'ptype')">Dragon<br />
                    <input id="dark"  type="checkbox" name="type[]" value="dark" onchange="buildQuery(this.value, 'ptype')">Dark<br />
                    <input id="fairy"  type="checkbox" name="type[]" value="fairy" onchange="buildQuery(this.value, 'ptype')">Fairy<br />
                    <input id="steel"  type="checkbox" name="type[]" value="steel" onchange="buildQuery(this.value, 'ptype')">Steel<br />
                </div>

                <div>
                    <input type="checkbox" id ="hideColor" onchange="toggleType('Color')">Pokemon Color
                </div>
                <div id="selectColor" class="indent">
                    <div>What are your favorite colors?</div>
                    <input id="red" type="checkbox" name="color[]" value="red" onchange="buildQuery(this.value, 'pcolor')">Red<br />
                    <input id="orange" type="checkbox" name="color[]" value="orange" onchange="buildQuery(this.value, 'pcolor')">Orange<br />
                    <input id="blue" type="checkbox" name="color[]" value="blue" onchange="buildQuery(this.value, 'pcolor')">Blue<br />
                    <input id="purple" type="checkbox" name="color[]" value="purple" onchange="buildQuery(this.value, 'pcolor')">Purple<br />
                    <input id="green" type="checkbox" name="color[]" value="green" onchange="buildQuery(this.value, 'pcolor')">Green<br />
                    <input id="yellow" type="checkbox" name="color[]" value="yellow" onchange="buildQuery(this.value, 'pcolor')">Yellow<br />
                    <input id="brown" type="checkbox" name="color[]" value="brown" onchange="buildQuery(this.value, 'pcolor')">Brown<br />
                </div>

                <div>
                    <input type="checkbox" id ="hideSpecies" onchange="toggleType('Species')">Pokemon Species
                </div>
                <div id="selectSpecies" class="indent">
                    <div>What are your favorite species?</div>
                    <input id="lizard" type="checkbox" name="species[]" value="lizard" onchange="buildQuery(this.value, 'pspecies')">Lizard<br />
                    <input id="snake" type="checkbox" name="species[]" value="snake" onchange="buildQuery(this.value, 'pspecies')">Snake<br />
                    <input id="fairy"  type="checkbox" name="species[]" value="fairy" onchange="buildQuery(this.value, 'pspecies')">Fairy<br />
                    <input id="insect"  type="checkbox" name="species[]" value="insect" onchange="buildQuery(this.value, 'pspecies')">Insect<br />
                    <input id="bird"  type="checkbox" name="species[]" value="bird" onchange="buildQuery(this.value, 'pspecies')">Bird<br />
                    <input id="frog"  type="checkbox" name="species[]" value="frog" onchange="buildQuery(this.value, 'pspecies')">Frog<br />
                    <input id="rodent"  type="checkbox" name="species[]" value="rodent" onchange="buildQuery(this.value, 'pspecies')">Rodent<br />
                    <input id="mammalian"  type="checkbox" name="species[]" value="mammalian" onchange="buildQuery(this.value, 'pspecies')">Mammalian<br />
                    <input id="plant"  type="checkbox" name="species[]" value="plant" onchange="buildQuery(this.value, 'pspecies')">Rodent<br />
                    <input id="fox"  type="checkbox" name="species[]" value="fox" onchange="buildQuery(this.value, 'pspecies')">Fox<br />
                    <input id="bat"  type="checkbox" name="species[]" value="bat" onchange="buildQuery(this.value, 'pspecies')">Bat<br />
                    <input id="turtle"  type="checkbox" name="species[]" value="turtle" onchange="buildQuery(this.value, 'pspecies')">Turtle<br />
                    <input id="cat"  type="checkbox" name="species[]" value="cat" onchange="buildQuery(this.value, 'pspecies')">Cat<br />
                    <input id="duck"  type="checkbox" name="species[]" value="duck" onchange="buildQuery(this.value, 'pspecies')">Duck<br />
                    <input id="mole"  type="checkbox" name="species[]" value="mole" onchange="buildQuery(this.value, 'pspecies')">Mole<br />
                    <input id="fossil"  type="checkbox" name="species[]" value="fossil" onchange="buildQuery(this.value, 'pspecies')">Fossil<br />
                    <input id="dragon"  type="checkbox" name="species[]" value="dragon" onchange="buildQuery(this.value, 'pspecies')">Dragon<br />
                    <input id="horse"  type="checkbox" name="species[]" value="horse" onchange="buildQuery(this.value, 'pspecies')">Horse<br />
                    <input id="seahorse"  type="checkbox" name="species[]" value="seahorse" onchange="buildQuery(this.value, 'pspecies')">Seahorse<br />
                    <input id="fish"  type="checkbox" name="species[]" value="fish" onchange="buildQuery(this.value, 'pspecies')">Fish<br />
                    <input id="shellfish"  type="checkbox" name="species[]" value="shellfish" onchange="buildQuery(this.value, 'pspecies')">Shellfish<br />
                    <input id="seal"  type="checkbox" name="species[]" value="seal" onchange="buildQuery(this.value, 'pspecies')">Seal<br />
                    <input id="ghost"  type="checkbox" name="species[]" value="ghost" onchange="buildQuery(this.value, 'pspecies')">Ghost<br />
                    <input id="inanimate"  type="checkbox" name="species[]" value="inanimate" onchange="buildQuery(this.value, 'pspecies')">Inanimate<br />
                </div>   

                <div>
                    <input type="checkbox" id ="hideWeight" onchange="toggleType('Weight')">Weight
                </div>
                <div id="selectWeight" class="indent" onchange="buildQuery(this.value, 'pweight')">
                    <div>Choose size preference</div>
                    <select name="weight" id="weight">
                        <option selected value=0>--- Choose Preference ---</option>
                        <option value=5>Under 5kg</option>
                        <option value="10">Under 10kg</option>
                        <option value=25>Under 25kg</option>
                        <option value=50>Under 50kg</option>
                        <option value=100>Under 100kg</option>
                        <option value=1000>Under 1000kg</option>
                    </select>
                </div>


            </div>
            <div id="test-string">
            </div>
            <div>
                <input type="submit" value="submit">
            </div>
        </form>
        <form action="login.php" method="POST">
            <input type="submit" value="Log Out" name="logout">
            <input type="hidden" name="loggingOut">
        </form>


    </body>
</html>