<?php
$lorem = "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea vel laboriosam ad illo voluptatem, tempora quam sint neque magni, explicabo repellendus labore eos delectus. Architecto eos, autem inventore delectus mollitia vel vitae. Consequatur cumque natus tempora corporis mollitia maiores illo nam rem minus pariatur laudantium nostrum labore aut, ipsum nulla.";


for($i=0;$i<=1000;$i++){
    $con1 = new PDO("mysql:host=localhost;dbname=latihan;",'root','');
    $query = "INSERT INTO post VALUES ('','post {$i}','{$lorem}')";

    $con = $con1->prepare($query);
    $con->execute();
}
$res = $con->fetchAll(PDO::FETCH_ASSOC);
var_dump($res);


?>

