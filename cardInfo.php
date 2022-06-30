<?php

require 'vendor/autoload.php';
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

define("AUTHORIZENET_LOG_FILE", "phplog");

chargeCreditCard($_POST['payment-amount'], $_POST['card-number'], $_POST['year'], $_POST['month']);

// function takes the information form index.php form...
// 1. sets merchant authentication information
// 2. sets card information from the form and payment information
// 3. creates and send a transaction with the information
// 4. handles response codes from the transaction request and displays messages
function chargeCreditCard($amount, 
                            $cardNum, 
                            $cardYear, 
                            $cardMonth) {

    // Common setup for API credentials  
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();   
    $merchantAuthentication->setName("96EN37Ggevh");   
    $merchantAuthentication->setTransactionKey("5zK7Z94T346GHkwp");   
    $refId = 'ref' . time();

    //credit card information from form
    $cardNumber = $cardNum;
    $cardMonthYear = $cardYear . '-' . $cardMonth;

    // Create the payment data for a credit card
    $creditCard = new AnetAPI\CreditCardType();
    $creditCard->setCardNumber($cardNumber);  
    $creditCard->setExpirationDate($cardMonthYear);
    $paymentOne = new AnetAPI\PaymentType();
    $paymentOne->setCreditCard($creditCard);

    // Create a transaction
    $transactionRequestType = new AnetAPI\TransactionRequestType();
    $transactionRequestType->setTransactionType("authCaptureTransaction");   
    $transactionRequestType->setAmount($amount);
    $transactionRequestType->setPayment($paymentOne);
    $request = new AnetAPI\CreateTransactionRequest();
    $request->setMerchantAuthentication($merchantAuthentication);
    $request->setRefId( $refId);
    $request->setTransactionRequest($transactionRequestType);
    $controller = new AnetController\CreateTransactionController($request);
    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX); 

    if ($response != null){
        $tresponse = $response->getTransactionResponse();
        if (($tresponse != null) && ($tresponse->getResponseCode()=="1")){
            echo "Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() . "\n";
            echo "Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n";
        }
        else if (($tresponse != null) && ($tresponse->getResponseCode()=="2")){
            echo "Attemped charge credit card: declined \n";
            // return error message here
        }
        else if (($tresponse != null) && ($tresponse->getResponseCode()=="3")){
            echo "Attempted charge credit card: error\n";
        }
        else if (($tresponse != null) && ($tresponse->getResponseCode()=="4")){
            echo "Attempted charge credit card: held for review\n";
        }
        else {
            echo "other error";
        }
    }
    
}
?>