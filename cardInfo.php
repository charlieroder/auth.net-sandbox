<?php

// json response to attempting to charge the credit card
$json_response = setCardInformation();

// decoded json used to parse response information
$res = json_decode($json_response, true);

$transaction_res = $res['transactionResponse'];

echo $res;

$res_messages = $transaction_res['messages'];

//echo $res_messages;

$res_code = $res_messages['code'];
$res_message = $res_messages['description'];

//echo "response code: " . utf8_encode($res_code);
//echo "<br>";
//echo "description: " . utf8_encode($res_message);

//echo $res;


// function takes the information form index.php form...
// 1. creates a json object to send as a charge credit card request to the Authorize.net
// 2. returns a json object with response information (approved or declined) to be parsed
function setCardInformation() {

    // arbitrary amount for testing
    $amount = "5.00";

    // merchant authentication information to be added to 
    $merchantAuth = array(
        "name" => "96EN37Ggevh",
        "transactionKey" => "5zK7Z94T346GHkwp"
        );

    //echo $merchantAuth;

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
        return $responseObj;
    }

    else {
        // request sending process failed
        echo "failed";
    }
}
?>