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
        <label>Amount to Pay (in the form X.XX)</label> <span
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