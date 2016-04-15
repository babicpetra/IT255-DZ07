<?php
$type = $_POST['type'];
$a = $_POST['a'];
$b = $_POST['b'];
if($type == "json"){
header("Content-type: application/json");
    if($a>$b){
        $test_array = array (
        'rezultat' => ($a/$b),
        );   
    }
    else{
        $test_array = array (
        'rezultat' => ($b/$a),
        );   
    }
echo json_encode($test_array);
}
else {
    header("Content-type: text/xml");
    
    if($a>$b){
        $test_array = array (
        'rezultat' => ($a/$b),
        );   
    }
    else{
        $test_array = array (
        'rezultat' => ($b/$a),
        );   
    }
    $xml = new SimpleXMLElement('<root/>');
    array_walk_recursive($test_array, array ($xml, 'addChild'));
    print $xml->asXML();
}
?>