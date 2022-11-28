<div class="allcontainer">
    <div class="blurred-div" id="loginModule">
        <div class="paybill-container">
            <div class="exit-button-container" style="width:100%; justify-content:start; display:block;">
                <button class="closeBtn my-1" onclick="closeModule()">
                    <i class="fa-solid fa-xmark" style="color:white;"></i>
                </button>
            </div>
            <div class="succ-alert" id="success">
                <span>
                    <p>Order is being processed</p>
                </span>
            </div>
            <div class="err-alert">
                <span>
                    <p>Error</p>
                </span>
            </div>
            <div class="text">
                <h2>
                    GREENSOKO MPESA PAYBILL
                </h2>
                <hr>
                <h1>
                    6969420
                </h1>
            </div>
            <div class="info-tab">
                <div class="context-message">
                    <div class="help-message">
                        <i class="fa-solid fa-circle-info px-1"></i>
                        <h2>How do I verify my order?</h2>
                    </div>
                    <div class="toggle-message">
                        <button class="button-toggle-msg" onclick="toggleTutorial()">
                            <i class="fa-solid fa-caret-down" id="caret"></i>
                        </button>
                    </div>
                </div>
                <div class="tutorial" id="tutorial">
                    <ul>
                        <li>
                            <p>To verify your payment, enter the unique <b>MPESA code</b> you recived
                                after payment. e.g. <b>QFY7D5JKU5</b> Confirmed. Ksh.xxx
                                paid to <b>GREENSOKO DELIVERIES</b> ..... </p>
                        </li>
                        <li>
                            <p>
                                In the above example, <b>QFY7D5JKU5</b> is the code to enter below.
                            </p>
                        </li>
                        <li>
                            <p>Enter the phone number you used to make the payment in the format <b>0712345678</b></p>
                        </li>
                        <li>
                            <p>Click on the <b>verify button</b> to complete your order verififcation</p>
                        </li>
                        <li>
                            <p>Sit back, relax and your order will arrive in no time</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="verification-panel">
                <form action="verif.php" method="POST">
                    <h3>
                        Verify Order
                    </h3>
                    <input type="number" name="phone-number" class="input-verif no-arrow" placeholder="Enter your phone number here. e.g.0714165105">
                    <input type="text" name="mpesa-code" class="input-verif" placeholder="Enter the MPESA code here. e.g.QFY7D5JKU5">
                    <button class=" button-verif" id="btn-verif" type="submit">
                        Request Verification
                    </button>
                </form>

            </div>


        </div>
    </div>
</div>