<?php
session_start();
require_once("phpMethods.php");

if (isset($_POST["deleteItem"])) {
    if (isset($_SESSION["cart"])) {
        $removableElement = $_POST['currentItem'];
        $itemTotal = $_POST['currentItemTotal'];
        $itemQuantity = $_POST['currentItemQuantity'];
        array_splice($_SESSION['cart'], $removableElement, 1);

        if ($_SESSION["totals"]["totalPrice"] < 0) {
            $_SESSION["totals"]["totalQuantity"] = 0;
        } else {
            $_SESSION["totals"]["totalQuantity"] -= $itemQuantity;
        }

        if ($_SESSION["totals"]["totalPrice"] < 0) {
            $_SESSION["totals"]["totalPrice"] = 0;
        } else {
            $_SESSION["totals"]["totalPrice"] -= $itemTotal;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- fontawesome icons -->
    <script src="https://kit.fontawesome.com/db540a34d6.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="CSS/navbarNelson.css">
    <style>
        .bg-greensoko {
            background-color: #8AC800;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>

    <title>Cart</title>
</head>

<body>
    <!-- Navbar -->
    <?php include "templates/navbarNelson.php"; ?>

    <?php include("mpesa.php"); ?>

    <!-- Cart container -->
    <div class="main-container w-11/12 py-2 mx-auto flex flex-col md:flex-row mt-24">
        <div class="cart-container h-[28rem] bg-gray-100 py-1 px-2 rounded-t-lg md:rounded-t-none md:rounded-l-lg flex flex-col overflow-y-scroll overflow-x-hidden md:h-screen md:w-2/3">
            <?php if (isset($_SESSION['cart'])) : ?>
                <?php $currentItem = 0; ?>
                <?php if (!empty($_SESSION['cart'])) : ?>
                    <?php foreach ($_SESSION['cart'] as $cartItem) : ?>
                        <div class="cart-item-card bg-white px-3 py-2 my-2 rounded w-full flex flex-row">
                            <div class="card-img w-5/12 flex md:flex-col items-center md:w-1/4">
                                <div>
                                    <img src="images/<?php echo $cartItem['img']; ?>" alt="" class="rounded w-full md:w-full">
                                </div>
                                <div>
                                    <span class="hidden md:flex text-xs md:text-left">
                                        <?php echo $_SESSION['restaurantId']; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="card-details w-7/12 ml-2 md:w-3/4">
                                <div class="flex flex-row justify-between">
                                    <div>
                                        <span class="text-base md:text-2xl">
                                            <?php echo $cartItem['productName']; ?>
                                        </span>
                                    </div>
                                    <div>
                                        <form action="cart.php" method="POST">
                                            <button type="submit" name="deleteItem">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 md:w-10 text-red-600 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                            <input type="hidden" name="currentItem" value="<?php echo $currentItem; ?>">
                                            <input type="hidden" name="currentItemQuantity" value="<?php echo $cartItem['qty']; ?>">
                                            <input type="hidden" name="currentItemTotal" value="<?php echo ($cartItem['price'] * $cartItem['qty']); ?>">
                                        </form>
                                    </div>
                                </div>
                                <div>
                                    <span class="md:hidden text-xs md:text-sm">
                                        <?php echo $_SESSION['restaurantId']; ?>
                                    </span>
                                </div>
                                <div>
                                    <span class="text-xs md:text-sm">
                                        <input type="hidden" class="unit-price" value="<?php echo $cartItem['price'] ?>">
                                        Ksh.<?php echo $cartItem['price']; ?>
                                    </span>
                                </div>
                                <div class="flex flex-row md:flex-col-reverse justify-between">
                                    <div>
                                        <span class="text-lg md:text-2xl item-total-price">
                                            <?php echo "Ksh. " . ($cartItem['price'] * $cartItem['qty']); ?>
                                        </span>
                                    </div>
                                    <div class="flex flex-row items-center md:my-2">
                                        <div class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 md:w-8 cursor-pointer quantity-remove" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div>
                                            <input type="number" disabled value="<?php echo $cartItem['qty']; ?>" min="1" class="bg-transparent w-8 quantity-number text-center">
                                        </div>
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 md:w-8 cursor-pointer quantity-add" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $currentItem++; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="flex items-center justify-center">
                        <?php echo "No products in cart"; ?>
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <div class="flex items-center justify-center">
                    <?php echo "No items in cart"; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="price-container bg-greensoko flex flex-col rounded-b-lg md:rounded-b-none md:rounded-r-lg md:w-1/3">
            <div class="flex flex-row justify-between p-1 md:p-4">
                <span class="text-lg md:text-xl">
                    Sub-Total
                </span>
                <span class="text-lg md:text-xl">
                    Ksh. <span class="sub-total"><?php echo $_SESSION["totals"]["totalPrice"]; ?></span>
                </span>
            </div>
            <div class="flex flex-row justify-between p-1 md:p-4">
                <span class="text-lg md:text-xl">
                    Delivery
                </span>
                <span class="text-lg md:text-xl">
                    <?php
                    if ($_SESSION["totals"]["totalPrice"] == 0) {
                        $deliveryFeeRandom = 0;
                        echo ("Ksh.0");
                    } else {
                        $deliveryFeeRandom = 200;
                        echo ("Ksh." . $deliveryFeeRandom);
                    }
                    ?>
                </span>
            </div>
            <div class="flex flex-row justify-between p-1 md:p-4">
                <span class="text-xl md:text-2xl">
                    Total
                </span>
                <span class="text-xl md:text-2xl">
                    Ksh. <span class="final-total"><?php echo ($_SESSION["totals"]["totalPrice"] + $deliveryFeeRandom); ?>
            </div>
            </span>
            <input type="hidden" value="<?php echo ($_SESSION["totals"]["totalPrice"] + $deliveryFeeRandom); ?>" class="order-total">
            <div class="m-2 md:m-4">
                <h1 class="text-xl text-center text-bold">
                    Pay now
                </h1>
                <hr style="width:100%; margin-block:1rem;">
                <div class="mpesa-button-container">
                    <button class="btn-mpesa" id="mpesa-btn" onclick="showModule()">
                        <img src="./images/mpesa1.png" alt="">
                    </button>
                </div>
                <div class="m-2 md:m-4" id="paypal-button-container">
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://www.paypal.com/sdk/js?client-id=AQ5nbfdM6A7AmySBZIzeYIOEESlWbVgVOHkFL4dOUZiPCZl_IlwIv7VBrJ9u8trzWhGRo75ITP1RGw9B&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
<script>
    //var total = ((document.querySelector(".order-total").value)*0.0086);
    var total = 8;

    function initPayPalButton() {
        paypal.Buttons({
            style: {
                shape: 'rect',
                color: 'gold',
                layout: 'vertical',
                label: 'paypal',

            },

            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        "amount": {
                            "currency_code": "USD",
                            "value": total,
                        }
                    }]
                });
            },

            onApprove: function(data, actions) {
                return actions.order.capture().then(function(orderData) {
                    $.ajax({
                        type: 'post',
                        url: 'placeOrder.php',
                        success: function(xhr) {
                            //const message = (JSON.parse(xhr.responseText))["message"];
                            /*if(confirm("Order has been completed, redirecting you to homepage...") == true){
                                location.assign("http://localhost/GreenSoko/PRODUCT_MODULE/locations.php");
                            }*/
                            location.assign("../PRODUCT_MODULE/locations.php");
                            alert('Order has been completed');
                            //location.assign("http://localhost/GreenSoko/PRODUCT_MODULE/locations.php")
                            //const message = (JSON.parse(xhr.responseText))["message"];
                            //alert(message);
                        },
                        error: function(xhr) {
                            const message = (JSON.parse(xhr.responseText))["message"];
                            console.log(message);
                        }
                    });
                    // Full available details
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                    /*$.ajax({
                        type: 'post',
                        url: 'placeOrder.php',
                        success: function (xhr) {
                            //const message = (JSON.parse(xhr.responseText))["message"];
                            if(confirm("Order has been completed, redirecting you to homepage...") == true){
                                location.assign("http://localhost/GreenSokoUpdate/locations.php")
                            }
                        },
                        error: function (xhr) {
                            const message = (JSON.parse(xhr.responseText))["message"];
                            console.log(message);
                        }
                    });*/
                    // Show a success message within this page, e.g.
                    // const element = document.getElementById('paypal-button-container');
                    // element.innerHTML = '';
                    // alert("Payment Successful");

                    // Or go to another URL:  actions.redirect('thank_you.html');

                });
            },

            onError: function(err) {
                console.log(err);
            }
        }).render('#paypal-button-container');
    }
    initPayPalButton();
</script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    const quantityNumber = document.querySelectorAll('.quantity-number');
    const quantityAdd = document.querySelectorAll(".quantity-add");
    const quantityRemove = document.querySelectorAll(".quantity-remove");
    const unitPrice = document.querySelectorAll(".unit-price");
    const totalItemPrice = document.querySelectorAll(".item-total-price");


    const subTotal = document.querySelector(".sub-total");
    const finalTotal = document.querySelector(".final-total");
    // const price =$('.price').text()
    const mpesabtn = document.getElementById("mpesa-btn");
    const paybillpopup = document.querySelectorAll("paybill_pop_up");
    const modulest = document.getElementById("loginModule");
    var tutorial_div = document.getElementById("tutorial");
    var caret = document.getElementById("caret");
    var verifBtn = document.getElementById("btn-verif");



    quantityAdd.forEach(function(item, index) {
        item.addEventListener("click", function() {
            var currentQuantity = parseInt(quantityNumber[index].value) + 1;
            quantityNumber[index].value = currentQuantity;
            var newValue = parseFloat(currentQuantity) * parseFloat(unitPrice[index].value);
            totalItemPrice[index].innerHTML = `Ksh. ${newValue}`;
            subTotal.innerHTML = parseFloat(subTotal.innerHTML) + parseFloat(unitPrice[index].value);
            finalTotal.innerHTML = parseFloat(finalTotal.innerHTML) + parseFloat(unitPrice[index].value);
        });
    });
    quantityRemove.forEach(function(item, index) {
        item.addEventListener("click", function() {
            var currentQuantity = parseInt(quantityNumber[index].value)
            if (currentQuantity > 1) {
                var currentQuantity = parseInt(quantityNumber[index].value) - 1;
                quantityNumber[index].value = currentQuantity;
                var newValue = parseFloat(currentQuantity) * parseFloat(unitPrice[index].value);
                totalItemPrice[index].innerHTML = `Ksh. ${newValue}`;
                if (currentQuantity != 1) {
                    subTotal.innerHTML = parseFloat(subTotal.innerHTML) - parseFloat(unitPrice[index].value);
                    finalTotal.innerHTML = parseFloat(finalTotal.innerHTML) - parseFloat(unitPrice[index].value);;
                }
            }
        });
    });

    mpesabtn.addEventListener('click', e => {
        paybillpopup.style.display = "block";
        // alert("Paybill no. is 132324")
    });

    function closeModule() {
        modulest.style.display = "none";
    }

    function toggleTutorial() {
        if (tutorial_div.style.display === "none") {
            tutorial_div.style.display = "block";
            caret.className = "fa-solid fa-caret-up";
        } else {
            tutorial_div.style.display = "none";
            caret.className = "fa-solid fa-caret-down";
        }
    }


    function showModule() {
        modulest.style.display = "flex";
    }
    modulest.addEventListener('click', e => {
        if (e.target == modulest) {
            modulest.style.display = "none";
        }
    }, {
        capture: true
    })

    verifBtn.addEventListener("click", e => {
        $.ajax({
            type: 'post',
            url: 'placeOrder.php',
            success: function(xhr) {
                //const message = (JSON.parse(xhr.responseText))["message"];
                /*if(confirm("Order has been completed, redirecting you to homepage...") == true){
                    location.assign("http://localhost/GreenSoko/PRODUCT_MODULE/locations.php");
                }*/
                location.assign("../PRODUCT_MODULE/verif.php");
                alert('Order has been completed, redirecting you to homepage...');
                //const message = (JSON.parse(xhr.responseText))["message"];
                //alert(message);
            },
            error: function(xhr) {
                const message = (JSON.parse(xhr.responseText))["message"];
                console.log(message);
            }
        });
    })
</script>
<script type="text/javascript" src="JS/navbar.js"></script>

</html>
