<!-- 
    basic request to Authorize.net sandbox endpoint 
-->

<form id="frmPayment" action="cardInfo.php"
    method="post">
    <div class="field-row">
        <label>Card Number</label> <span
            id="card-number-info" class="info"></span><br> <input
            type="text" id="card-number" name="card-number"
            class="demoInputBox">
    </div>
    <div class="field-row">
        <div class="contact-row column-right">
            <label>Expiry Month / Year</label> <span
                id="userEmail-info" class="info"></span><br>
            <select name="month" id="month"
                class="demoSelectBox">
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select> <select name="year" id="year"
                class="demoSelectBox">
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
            </select>
        </div>
    </div>
    <div>
        <input type="submit" name="pay_now" value="Submit"
            name="submit-btn" class="btnAction">
    </div>
    <input type='hidden' name='amount' value='151.51'> 
</form>


<?php
    /*
    function setCardInformation() {

        $amount = "5.00";

        $merchantAuth = array(
            "name" => "96EN37Ggevh",
            "transactionKey" => "5zK7Z94T346GHkwp"
        );

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

        $json = json_encode($object);

        echo $json;

        //$xml = file_get_contents('credit-card-request.xml');

        //$url = 'https://apitest.authorize.net/xml/v1/request.api';

        //$curl = curl_init($url);

        //curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: text/json"));

        //curl_setopt($curl, CURLOPT_POST, true);

        //curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

        //curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        //$result = curl_exec($curl);

        //if(curl_errno($curl)){
        //    throw new Exception(curl_error($curl));
        //}

        //curl_close($curl);

        //$responseObj = json_encode($result);

        //echo $responseObj;

        // print the transaction request result
        //echo $result;
        //return $json; 
    }
    if (isset($_POST['submit-btn'])){
        setCardInformation();
    }
    */
?>



<?php

/* $info = setCardInformation();

//$xml = file_get_contents('credit-card-request.xml');

$url = 'https://apitest.authorize.net/xml/v1/request.api';

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: text/xml"));

curl_setopt($curl, CURLOPT_POST, true);

curl_setopt($curl, CURLOPT_POSTFIELDS, $info);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);

if(curl_errno($curl)){
    throw new Exception(curl_error($curl));
}

curl_close($curl);

$responseObj = json_encode($result);

echo $responseObj;

// print the transaction request result
echo $result;
 */
?>