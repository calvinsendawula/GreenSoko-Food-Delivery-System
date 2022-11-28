<?php
  require_once("phpMethods.php");
?>
<nav id="navbar">
    <div class="logo">
        <a href="#" style="height:inherit;">
            <img src="logogreen.png" alt="logo" class="logo_image" />
        </a>

    </div>
    <div class="nav-list">
        <button class="nav-button" id="nav-button">
            <i class="fa-solid fa-bars" id="nav-btn-icon"></i>
        </button>

        <ul class="nav-options" id="nav-options">
            <li class="nav-item"><a href="../index.php">Home</a></li>
            <li class="nav-item"><a href="locations.php">Location</a></li>
            <li class="nav-item">
                <a href="cart.php" style="position:relative;">
                    Cart
                    <small style="position:absolute; top:-5px; right: -5px;">
                        <?php if(isset($_SESSION['totals'])): ?>
                            <?php echo $_SESSION['totals']['totalQuantity']; ?>
                        <?php endif ?>
                    </small>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php dashRedirectPage(); ?>"><?php dashRedirectDisplay(); ?></a>
                <!-- use sessions to implement user data for this section -->
                <!-- <img src="../images/man.png" class="user-profile" alt="" /> -->
            </li>
        </ul>
    </div>
    <div class="mobile-opts" id="mobile-opts">
        <ul class="nav-mobile" id="nav-mobile">
            <li class="nav-item-mobile"><button class="btn-nav">Home</button></li>
            <li class="nav-item-mobile"><button class="btn-nav">Services</button></li>
            <li class="nav-item-mobile"><button class="btn-nav">Cart</button></li>
            <li class="nav-item-mobile">
                <button class="btn-nav-sign-in">Sign In</button>
                <!-- use sessions to implement user data for this section -->
                <!-- <img src="../images/man.png" class="user-profile" alt="" /> -->
            </li>
        </ul>
    </div>
</nav>
