<?php
$movies = array(array());
$movies[0] = array('title' => 'Anna Christie', 'year' => '1930', 'budget' => 1300000, 'genre' => 'romantic', 'leadactor' => 'Anne');
$movies[1] = array('title' => 'Ball of Fire', 'year' => '1942', 'budget' => 1000000, 'genre' => 'drama' , 'leadactor' => 'Matt Johnsans');
$movies[2] = array('title' => 'Before Night Falls', 'year' => '2000', 'budget' => 60000000, 'genre' => 'thriller' , 'leadactor' => 'Brus Taisn');
$movies[3] = array('title' => 'The Birds', 'year' => '1963', 'budget' => 6000000, 'genre' => 'action' , 'leadactor' => 'Bird Klinton');
$movies[4] = array('title' => 'The Breakfast Club', 'year' => '1985', 'budget' => 6400000, 'genre' => 'comedy' , 'leadactor' => 'Jaklin Monro');

$actors = array(array());
$actors[0] = array('name' => 'Anne', 'nationality' => 'Brazilian', 'age' => 54, 'oscars' => 2);
$actors[1] = array('name' => 'Matt Johnsans', 'nationality' => 'Australian', 'age' => 62, 'oscars' => 1);
$actors[2] = array('name' => 'Brus Taisn', 'nationality' => 'Chinesian', 'age' => 31, 'oscars' => 3);
$actors[3] = array('name' => 'Bird Klinton', 'nationality' => 'Russian', 'age' => 42, 'oscars' => 0);
$actors[4] = array('name' => 'Jaklin Monro', 'nationality' => 'Bulgarian', 'age' => 21, 'oscars' => 11);
for ($i=0; $i < count($movies); $i++) { 
    foreach ($movies[$i] as $key => $value) {
    	echo $key.': '.$value.'<br/>';
    }
    echo '<br/>';
}
echo '<br/>';
for ($i=0; $i < count($actors); $i++) { 
    foreach ($actors[$i] as $key => $value) {
    	echo $key.': '.$value.'<br/>';
    }
    echo '<br/>';
}
?>
