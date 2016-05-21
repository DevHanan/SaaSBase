<?php
header("Access-Controll-Allow-Origin: *");   // To Accept Ajax Request
// chek if the request paramaters is valid
if(null !== filter_input(INPUT_POST, 'hash') && null !== filter_input(INPUT_POST, 'data'))
{
    // get data from Request
    $hashed = filter_input(INPUT_POST, 'hash' ) ;
    // get hashed data from reaquest
    $data   = filter_input(INPUT_POST, 'data', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    // api key that generated  to saasAplication Developper
    $key = 'e10adc3949ba59abbe56e057f20f883e';
    // add api key to data array
    $data['key'] = $key;

    // chek if data and hash is equevilent
    if(md5(implode("",$data)) == $hashed)
    {
        // include controller base on equest
        include 'controller/' . $data['action'] . '.php';
    }
    else
    {
        header("Bad Request", true, 400 );
        $response = array();
        $response['message'] = 'Invalid Request';
        echo json_encode($response);
	}
}
else
{
        header("Bad Request", true, 400 );
        $response = array();
        $response['message'] = 'Invalid Request';
        echo json_encode($response);
}
?>