<?php


// json response to attempting to charge the credit card
$res = chargeCreditCard();

// decoded json used to parse response information
$decode_res = json_decode($res, true);

echo '<br><br>';

$resCode = $decode_res['transactionResponse']['responseCode'];
echo $resCode;
echo '<br><br>';

if ($resCode == "1"){
    print_r("the transaction has been approved");
}



// other if statements for different response codes... to be completed

/*
else if ($resCode == "2"){
    echo '<br><br>';
    $error_array = $response_object['transactionResponse']['errors'];
    print_r($error_array);
    /* print_r("the transaction has been declined");
    echo '<br><br>';
    $error_array = $response_object['transactionResponse']['errors'];
    echo $error_array['errorText']; 
}
else if ($resCode == "3"){
    echo '<br><br>';
    $error_array = $response_object['transactionResponse']['errors'];
    print_r($error_array);
    /* print_r("there was an error in the transaction");
    echo '<br><br>';
    $error_array = $response_object['transactionResponse']['errors'];
    echo $error_array['errorText']; 
}
else if ($resCode == "4"){
    echo '<br><br>';
    $error_array = $response_object['transactionResponse']['errors'];
    print_r($error_array);
    /* print_r("the transaction has been put on hold for review");
    echo '<br><br>';
    $error_array = $response_object['transactionResponse']['errors'];
    echo $error_array['errorText']; 
}
*/


// function takes the information form index.php form...
// 1. creates a json object to send as a charge credit card request to the Authorize.net
// 2. returns a json object with response information (approved or declined) to be parsed
function chargeCreditCard() {

    // arbitrary amount for testing
    $amount = "5.00";

    // merchant authentication information to be added to 
    $merchantAuth = array(
        "name" => "96EN37Ggevh",
        "transactionKey" => "5zK7Z94T346GHkwp"
        );


    // check if necessary information as been entered then create the request object
    if (isset($_POST['card-number'], $_POST['month'], $_POST['year'])) {
        $cardNumber = $_POST['card-number'];
        $cardMonthYear = $_POST['year'] . '-' . $_POST['month'];

        $object = array(
            "createTransactionRequest" => array(
                "merchantAuthentication" => $merchantAuth,
                "transactionRequest" => array(
                    "transactionType" => "authCaptureTransaction",
                    "amount" => $amount,
                    "payment" => array(
                        "creditCard" => array(
                            "cardNumber" => $_POST['card-number'],
                            "expirationDate" => $_POST["month"] . "-" . $_POST["year"],
                            "cardCode" => "999"
                        )
                    )
                )
            )
        );

        // encode object from php object to a json object
        $json = json_encode($object);

        //echo $json;

        // endpoint url object is being sent to 
        $url = 'https://apitest.authorize.net/xml/v1/request.api';

        // send object via post
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: text/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);

        if(curl_errno($curl)){
           throw new Exception(curl_error($curl));
        }

        curl_close($curl);

        // encode response object then return it to be parsed
        $responseObj = json_encode($result);
        return $result;
    }

    else {
        // request sending process failed
        echo "failed";
    }
}
?>