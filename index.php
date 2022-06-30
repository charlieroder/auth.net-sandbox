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
    <div class="field-row">
        <label>Amount to Pay</label> <span
            id="amount" class="info"></span><br> <input
            type="text" id="payment-amount" name="payment-amount"
            class="demoInputBox">
    </div>
    <div>
        <input type="submit" name="pay_now" value="Submit"
            name="submit-btn" class="btnAction">
    </div>
    <input type='hidden' name='amount' value='151.51'> 
</form>


<?php
/* 
    // this is the testing object created to test parsing an existing json response object
    // the issue with the black diamond happens in cardInfo.php when similar parsing commands are used

    $jsonObj = '
    {
        "transactionResponse": {
            "responseCode": "1",
            "authCode": "HW617E",
            "avsResultCode": "Y",
            "cvvResultCode": "",
            "cavvResultCode": "",
            "transId": "2157047189",
            "refTransID": "",
            "transHash": "E7CEB0A9F1BECA32A02493E1B31D5955",
            "testRequest": "0",
            "accountNumber": "XXXX1111",
            "accountType": "Visa",
            "messages": [
                {
                    "code": "1",
                    "description": "This transaction has been approved."
                }
            ],
            "transHashSha2": "D0C4FFF5648511A5862B917CFD9BB78ABF8A6E1D90C119CBBC4C0B454F4FF40DED15B204E042F36ECA5FB15D02588E4E4A7B85B94E7279599CE6020462CB7DEE",
            "SupplementalDataQualificationIndicator": 0,
        "networkTransId": "123456789NNNH"
        },
        "messages": {
            "resultCode": "Ok",
            "message": [
                {
                    "code": "I00001",
                    "text": "Successful."
                }
            ]
        }
    }
    ';

    //echo '<br><br>';
    //echo $jsonObj;
    echo '<br><br>';

    $json_array = json_decode($jsonObj, true);

    print_r($json_array);
    echo '<br><br>';
    print_r($json_array['messages']);
    echo '<br><br>';
    $res = $json_array['transactionResponse']['responseCode'];
    echo '<br><br>';
    echo $res;
    echo '<br><br>';

    //echo $transactionRes['responseCode']; */

?> 