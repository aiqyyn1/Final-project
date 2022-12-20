<?php
session_start();


if (isset($_REQUEST['regSubmit'])) {
    include "db/conn.php";
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['regEmail']);
    $password = mysqli_real_escape_string($con, $_POST['regPassword']);
    $password2 = mysqli_real_escape_string($con, $_POST['regPassword2']);

    $checkAcc = "select * from users where email = '$email' and password = '$password' limit 1";
    $checkAccRes = mysqli_query($con, $checkAcc);

    if (mysqli_num_rows($checkAccRes) > 0) {
        echo "<script>alert('Data already exists. You will be headed to log in form.')</script>";
        echo "<script>window.location = 'login.php';</script>";
    } else {
        if (strlen($password) >= 6) {
            if ($password == $password2) {
                $insert = "insert into users (fname, lname, email, password) values ('$fname', '$lname', '$email', '$password')";
                if (mysqli_query($con, $insert)) {
                    echo "<script>alert('Success registration! You will be headed to log in form.')</script>";
                    echo "<script>window.location = 'login.php';</script>";
                } else {
                    echo "<script>alert('Registration error. Please, try again.')</script>";
                    echo "<script>window.location = 'reg.php';</script>";
                }
            } else {
                echo "<script>alert('Passwords do not match! Please, try again.')</script>";
                echo "<script>window.location = 'reg.php';</script>";
            }
        } else {
            echo "<script>alert('Password must contain 6 or more characters! Please, try again.')</script>";
            echo "<script>window.location = 'reg.php';</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>KETNIPZ</title>
    <link href="css/login.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<header>
    <div class="header-content">
        <div class="inner-header-content">
            <a href="../login/login.html"> <img class="header-img" height="20"
                                                src="https://img.icons8.com/ios-filled/50/737373/user.png" width="20"/>
            </a>
            <p>Official ketnipz online store</p>
            <img class="header-img" height="20"
                 src="https://img.icons8.com/external-kmg-design-detailed-outline-kmg-design/64/000000/external-log-out-user-interface-kmg-design-detailed-outline-kmg-design.png"
                 width="20"/></div>
    </div>
</header>
<nav>
    <div class="nav-content">
        <div class="dropdown-menu">
            <input id="toggle" name="toggle" type="checkbox">
            <label for="toggle">
                <img src="https://img.icons8.com/external-flat-papa-vector/78/000000/external-Menu-interface-flat-papa-vector-2.png"
                     width="40"/>
            </label>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="shopAll.php">Shop All</a></li>
                <li><a href="index.php">Apparel</a></li>
                <li><a href="index.php">Plushies</a></li>
                <li><a href="index.php">Accessories</a></li>
                <li><a href="index.php">Footwear</a></li>
                <li><a href="index.php">Mystery Items</a></li>
            </ul>
        </div>
        <div class="nav-img">
            <a href="index.php"><img
                        src="//cdn.shopify.com/s/files/1/2028/6907/files/Ketnipz_Header_550x_dd3e502e-9e2e-4ad6-8c4d-e7cadd42b578_130x.gif?v=1614929293 1x, //cdn.shopify.com/s/files/1/2028/6907/files/Ketnipz_Header_550x_dd3e502e-9e2e-4ad6-8c4d-e7cadd42b578_130x@2x.gif?v=1614929293 2x">
            </a>
        </div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="shopAll.php">Shop All</a>
            <a href="apparel.php">Apparel</a>
            <a href="plushies.php">Plushies</a>
            <a href="accessories.php">Accessories</a>
            <a href="footwear.php">Footwear</a>
            <a href="mysteryItems.php">Mystery Items</a>
            <a id="cart" onclick="cartClick()">Cart</a>
        </div>
        <div class="cart">
            <img onclick="cartClick()" src="https://img.icons8.com/ios-glyphs/30/000000/shopping-cart--v1.png"/></div>
    </div>
</nav>
<main>
    <div class="reg">
        <form action="reg.php" method="post">
            <p>Create account</p>
            <input autocomplete="false" name="fname" placeholder="First Name" required type="text">
            <input autocomplete="false" name="lname" placeholder="Last Name" required type="text">
            <input autocomplete="false" name="regEmail" placeholder="Email" required type="email">
            <input autocomplete="false" name="regPassword" placeholder="Password" required type="password">
            <input autocomplete="false" name="regPassword2" placeholder="Confirm password" required type="password">
            <input name="regSubmit" type="submit" value="Create">
            <div class="regHelp">
                <a href="login.php">Log In</a>
            </div>
        </form>
    </div>
</main>
<footer>
    <div class="footer-content">
        <div class="inner-footer-content-1">
            <div class="main-menu">
                <p><b>Main Menu</b></p>
                <hr>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shopAll.php">Shop All</a></li>
                    <li><a href="apparel.html">Apparel</a></li>
                    <li><a href="plushies.html">Plushies</a></li>
                    <li><a href="accessories.html">Accessories</a></li>
                    <li><a href="footwear.html">Footwear</a></li>
                    <li><a href="mysteryItems.html">Mystery Items</a></li>
                </ul>
            </div>
            <div class="more-info">
                <p><b>More Info</b></p>
                <hr>
                <ul>
                    <li><a href="sizingChart.php">Sizing charts</a></li>
                    <li><a href="faq.php">Faq</a></li>
                    <li><a href="REpolicy.html">Return & exchange policy</a>
                    <li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="search.html">Search</a></li>
                    <li><a href="privacyPolicy.html">Privacy policy</a></li>
                    <li><a href="termsOfService.html">Terms of service</a></li>
                </ul>
            </div>
            <div class="newsletter">
                <b>Newsletter</b>
                <hr>
                <br>
                <p>Join to get special offers, free giveaways, and once-in-a-lifetime deals.</p>
                <br>
                <p style="text-transform: none; font-size: 10px"><i>email - can't be blank</i></p>
                <div class="input">
                    <input placeholder="your-email@example.com" type="text"><input type="submit" value="Join">
                </div>
            </div>
        </div>
        <br>
        <div class="copyright">
            <div class="copyright-content">
                <ul>
                    <li><a href="index.php">© KETNIPZ 2022</a>
                    </li>
                    <li>POWERED BY <a href="index.php">KILLER MERCH</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="social">
            <div class="social-content">
                <ul>
                    <li><img src="https://img.icons8.com/ios-glyphs/30/000000/twitter--v1.png" width="25"/>
                    </li>
                    <li><img src="https://img.icons8.com/material-outlined/24/000000/facebook-f.png" width="25"/>
                    </li>
                    <li><img src="https://img.icons8.com/ios-glyphs/30/000000/instagram-new.png" width="25"/>
                    </li>
                    <li><img src="https://img.icons8.com/ios-glyphs/30/000000/youtube-play.png" width="25"/>
                    </li>
                </ul>
            </div>
        </div>
        <div class="payment">
            <ul>
                <li>
                    <svg aria-labelledby="pi-amazon" class="payment-icon" height="24" role="img" viewBox="0 0 38 24"
                         width="35" xmlns="http://www.w3.org/2000/svg"><title id="pi-amazon">Amazon</title>
                        <path d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"
                              fill="#000" fill-rule="nonzero" opacity=".07"></path>
                        <path d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"
                              fill="#FFF"
                              fill-rule="nonzero"></path>
                        <path d="M25.26 16.23c-1.697 1.48-4.157 2.27-6.275 2.27-2.97 0-5.644-1.3-7.666-3.463-.16-.17-.018-.402.173-.27 2.183 1.504 4.882 2.408 7.67 2.408 1.88 0 3.95-.46 5.85-1.416.288-.145.53.222.248.47v.001zm.706-.957c-.216-.328-1.434-.155-1.98-.078-.167.024-.193-.148-.043-.27.97-.81 2.562-.576 2.748-.305.187.272-.047 2.16-.96 3.063-.14.138-.272.064-.21-.12.205-.604.664-1.96.446-2.29h-.001z"
                              fill="#F90" fill-rule="nonzero"></path>
                        <path d="M21.814 15.291c-.574-.498-.676-.73-.993-1.205-.947 1.012-1.618 1.315-2.85 1.315-1.453 0-2.587-.938-2.587-2.818 0-1.467.762-2.467 1.844-2.955.94-.433 2.25-.51 3.25-.628v-.235c0-.43.033-.94-.208-1.31-.212-.333-.616-.47-.97-.47-.66 0-1.25.353-1.392 1.085-.03.163-.144.323-.3.33l-1.677-.187c-.14-.033-.296-.153-.257-.38.386-2.125 2.223-2.766 3.867-2.766.84 0 1.94.234 2.604.9.842.82.762 1.918.762 3.11v2.818c0 .847.335 1.22.65 1.676.113.164.138.36-.003.482-.353.308-.98.88-1.326 1.2a.367.367 0 0 1-.414.038zm-1.659-2.533c.34-.626.323-1.214.323-1.918v-.392c-1.25 0-2.57.28-2.57 1.82 0 .782.386 1.31 1.05 1.31.487 0 .922-.312 1.197-.82z"
                              fill="#221F1F"></path>
                    </svg>
                </li>

                <li>
                    <svg aria-labelledby="pi-american_express" class="payment-icon" height="24" role="img"
                         viewBox="0 0 38 24"
                         width="35" xmlns="http://www.w3.org/2000/svg"><title id="pi-american_express">American
                            Express</title>
                        <g fill="none">
                            <path d="M35,0 L3,0 C1.3,0 0,1.3 0,3 L0,21 C0,22.7 1.4,24 3,24 L35,24 C36.7,24 38,22.7 38,21 L38,3 C38,1.3 36.6,0 35,0 Z"
                                  fill="#000"
                                  opacity=".07"></path>
                            <path d="M35,1 C36.1,1 37,1.9 37,3 L37,21 C37,22.1 36.1,23 35,23 L3,23 C1.9,23 1,22.1 1,21 L1,3 C1,1.9 1.9,1 3,1 L35,1"
                                  fill="#006FCF"></path>
                            <path d="M8.971,10.268 L9.745,12.144 L8.203,12.144 L8.971,10.268 Z M25.046,10.346 L22.069,10.346 L22.069,11.173 L24.998,11.173 L24.998,12.412 L22.075,12.412 L22.075,13.334 L25.052,13.334 L25.052,14.073 L27.129,11.828 L25.052,9.488 L25.046,10.346 L25.046,10.346 Z M10.983,8.006 L14.978,8.006 L15.865,9.941 L16.687,8 L27.057,8 L28.135,9.19 L29.25,8 L34.013,8 L30.494,11.852 L33.977,15.68 L29.143,15.68 L28.065,14.49 L26.94,15.68 L10.03,15.68 L9.536,14.49 L8.406,14.49 L7.911,15.68 L4,15.68 L7.286,8 L10.716,8 L10.983,8.006 Z M19.646,9.084 L17.407,9.084 L15.907,12.62 L14.282,9.084 L12.06,9.084 L12.06,13.894 L10,9.084 L8.007,9.084 L5.625,14.596 L7.18,14.596 L7.674,13.406 L10.27,13.406 L10.764,14.596 L13.484,14.596 L13.484,10.661 L15.235,14.602 L16.425,14.602 L18.165,10.673 L18.165,14.603 L19.623,14.603 L19.647,9.083 L19.646,9.084 Z M28.986,11.852 L31.517,9.084 L29.695,9.084 L28.094,10.81 L26.546,9.084 L20.652,9.084 L20.652,14.602 L26.462,14.602 L28.076,12.864 L29.624,14.602 L31.499,14.602 L28.987,11.852 L28.986,11.852 Z"
                                  fill="#FFF"></path>
                        </g>
                    </svg>
                </li>

                <li>
                    <svg aria-labelledby="pi-apple_pay" class="payment-icon" height="24" role="img" version="1.1"
                         viewBox="0 0 165.521 105.965"
                         width="35" x="0" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                         y="0"><title id="pi-apple_pay">Apple Pay</title>
                        <path d="M150.698 0H14.823c-.566 0-1.133 0-1.698.003-.477.004-.953.009-1.43.022-1.039.028-2.087.09-3.113.274a10.51 10.51 0 0 0-2.958.975 9.932 9.932 0 0 0-4.35 4.35 10.463 10.463 0 0 0-.975 2.96C.113 9.611.052 10.658.024 11.696a70.22 70.22 0 0 0-.022 1.43C0 13.69 0 14.256 0 14.823v76.318c0 .567 0 1.132.002 1.699.003.476.009.953.022 1.43.028 1.036.09 2.084.275 3.11a10.46 10.46 0 0 0 .974 2.96 9.897 9.897 0 0 0 1.83 2.52 9.874 9.874 0 0 0 2.52 1.83c.947.483 1.917.79 2.96.977 1.025.183 2.073.245 3.112.273.477.011.953.017 1.43.02.565.004 1.132.004 1.698.004h135.875c.565 0 1.132 0 1.697-.004.476-.002.952-.009 1.431-.02 1.037-.028 2.085-.09 3.113-.273a10.478 10.478 0 0 0 2.958-.977 9.955 9.955 0 0 0 4.35-4.35c.483-.947.789-1.917.974-2.96.186-1.026.246-2.074.274-3.11.013-.477.02-.954.022-1.43.004-.567.004-1.132.004-1.699V14.824c0-.567 0-1.133-.004-1.699a63.067 63.067 0 0 0-.022-1.429c-.028-1.038-.088-2.085-.274-3.112a10.4 10.4 0 0 0-.974-2.96 9.94 9.94 0 0 0-4.35-4.35A10.52 10.52 0 0 0 156.939.3c-1.028-.185-2.076-.246-3.113-.274a71.417 71.417 0 0 0-1.431-.022C151.83 0 151.263 0 150.698 0z"
                              fill="#000"></path>
                        <path d="M150.698 3.532l1.672.003c.452.003.905.008 1.36.02.793.022 1.719.065 2.583.22.75.135 1.38.34 1.984.648a6.392 6.392 0 0 1 2.804 2.807c.306.6.51 1.226.645 1.983.154.854.197 1.783.218 2.58.013.45.019.9.02 1.36.005.557.005 1.113.005 1.671v76.318c0 .558 0 1.114-.004 1.682-.002.45-.008.9-.02 1.35-.022.796-.065 1.725-.221 2.589a6.855 6.855 0 0 1-.645 1.975 6.397 6.397 0 0 1-2.808 2.807c-.6.306-1.228.511-1.971.645-.881.157-1.847.2-2.574.22-.457.01-.912.017-1.379.019-.555.004-1.113.004-1.669.004H14.801c-.55 0-1.1 0-1.66-.004a74.993 74.993 0 0 1-1.35-.018c-.744-.02-1.71-.064-2.584-.22a6.938 6.938 0 0 1-1.986-.65 6.337 6.337 0 0 1-1.622-1.18 6.355 6.355 0 0 1-1.178-1.623 6.935 6.935 0 0 1-.646-1.985c-.156-.863-.2-1.788-.22-2.578a66.088 66.088 0 0 1-.02-1.355l-.003-1.327V14.474l.002-1.325a66.7 66.7 0 0 1 .02-1.357c.022-.792.065-1.717.222-2.587a6.924 6.924 0 0 1 .646-1.981c.304-.598.7-1.144 1.18-1.623a6.386 6.386 0 0 1 1.624-1.18 6.96 6.96 0 0 1 1.98-.646c.865-.155 1.792-.198 2.586-.22.452-.012.905-.017 1.354-.02l1.677-.003h135.875"
                              fill="#FFF"></path>
                        <g>
                            <g>
                                <path d="M43.508 35.77c1.404-1.755 2.356-4.112 2.105-6.52-2.054.102-4.56 1.355-6.012 3.112-1.303 1.504-2.456 3.959-2.156 6.266 2.306.2 4.61-1.152 6.063-2.858"
                                      fill="#000"></path>
                                <path
                                        d="M45.587 39.079c-3.35-.2-6.196 1.9-7.795 1.9-1.6 0-4.049-1.8-6.698-1.751-3.447.05-6.645 2-8.395 5.1-3.598 6.2-.95 15.4 2.55 20.45 1.699 2.5 3.747 5.25 6.445 5.151 2.55-.1 3.549-1.65 6.647-1.65 3.097 0 3.997 1.65 6.696 1.6 2.798-.05 4.548-2.5 6.247-5 1.95-2.85 2.747-5.6 2.797-5.75-.05-.05-5.396-2.101-5.446-8.251-.05-5.15 4.198-7.6 4.398-7.751-2.399-3.548-6.147-3.948-7.447-4.048"
                                        fill="#000"></path>
                            </g>
                            <g>
                                <path d="M78.973 32.11c7.278 0 12.347 5.017 12.347 12.321 0 7.33-5.173 12.373-12.529 12.373h-8.058V69.62h-5.822V32.11h14.062zm-8.24 19.807h6.68c5.07 0 7.954-2.729 7.954-7.46 0-4.73-2.885-7.434-7.928-7.434h-6.706v14.894z"
                                      fill="#000"></path>
                                <path d="M92.764 61.847c0-4.809 3.665-7.564 10.423-7.98l7.252-.442v-2.08c0-3.04-2.001-4.704-5.562-4.704-2.938 0-5.07 1.507-5.51 3.82h-5.252c.157-4.86 4.731-8.395 10.918-8.395 6.654 0 10.995 3.483 10.995 8.89v18.663h-5.38v-4.497h-.13c-1.534 2.937-4.914 4.782-8.579 4.782-5.406 0-9.175-3.222-9.175-8.057zm17.675-2.417v-2.106l-6.472.416c-3.64.234-5.536 1.585-5.536 3.95 0 2.288 1.975 3.77 5.068 3.77 3.95 0 6.94-2.522 6.94-6.03z"
                                      fill="#000"></path>
                                <path d="M120.975 79.652v-4.496c.364.051 1.247.103 1.715.103 2.573 0 4.029-1.09 4.913-3.899l.52-1.663-9.852-27.293h6.082l6.863 22.146h.13l6.862-22.146h5.927l-10.216 28.67c-2.34 6.577-5.017 8.735-10.683 8.735-.442 0-1.872-.052-2.261-.157z"
                                      fill="#000"></path>
                            </g>
                        </g></svg>

                </li>

                <li>
                    <svg aria-labelledby="pi-diners_club" class="payment-icon" height="24" role="img"
                         viewBox="0 0 38 24"
                         width="35" xmlns="http://www.w3.org/2000/svg"><title id="pi-diners_club">Diners Club</title>
                        <path d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"
                              opacity=".07"></path>
                        <path d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"
                              fill="#fff"></path>
                        <path d="M12 12v3.7c0 .3-.2.3-.5.2-1.9-.8-3-3.3-2.3-5.4.4-1.1 1.2-2 2.3-2.4.4-.2.5-.1.5.2V12zm2 0V8.3c0-.3 0-.3.3-.2 2.1.8 3.2 3.3 2.4 5.4-.4 1.1-1.2 2-2.3 2.4-.4.2-.4.1-.4-.2V12zm7.2-7H13c3.8 0 6.8 3.1 6.8 7s-3 7-6.8 7h8.2c3.8 0 6.8-3.1 6.8-7s-3-7-6.8-7z"
                              fill="#3086C8"></path>
                    </svg>
                </li>

                <li>
                    <svg aria-labelledby="pi-discover" class="payment-icon" fill="none" height="24" role="img"
                         viewBox="0 0 38 24" width="35" xmlns="http://www.w3.org/2000/svg"><title
                                id="pi-discover">Discover</title>
                        <path d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"
                              fill="#000"
                              opacity=".07"></path>
                        <path d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32z"
                              fill="#fff"></path>
                        <path d="M3.57 7.16H2v5.5h1.57c.83 0 1.43-.2 1.96-.63.63-.52 1-1.3 1-2.11-.01-1.63-1.22-2.76-2.96-2.76zm1.26 4.14c-.34.3-.77.44-1.47.44h-.29V8.1h.29c.69 0 1.11.12 1.47.44.37.33.59.84.59 1.37 0 .53-.22 1.06-.59 1.39zm2.19-4.14h1.07v5.5H7.02v-5.5zm3.69 2.11c-.64-.24-.83-.4-.83-.69 0-.35.34-.61.8-.61.32 0 .59.13.86.45l.56-.73c-.46-.4-1.01-.61-1.62-.61-.97 0-1.72.68-1.72 1.58 0 .76.35 1.15 1.35 1.51.42.15.63.25.74.31.21.14.32.34.32.57 0 .45-.35.78-.83.78-.51 0-.92-.26-1.17-.73l-.69.67c.49.73 1.09 1.05 1.9 1.05 1.11 0 1.9-.74 1.9-1.81.02-.89-.35-1.29-1.57-1.74zm1.92.65c0 1.62 1.27 2.87 2.9 2.87.46 0 .86-.09 1.34-.32v-1.26c-.43.43-.81.6-1.29.6-1.08 0-1.85-.78-1.85-1.9 0-1.06.79-1.89 1.8-1.89.51 0 .9.18 1.34.62V7.38c-.47-.24-.86-.34-1.32-.34-1.61 0-2.92 1.28-2.92 2.88zm12.76.94l-1.47-3.7h-1.17l2.33 5.64h.58l2.37-5.64h-1.16l-1.48 3.7zm3.13 1.8h3.04v-.93h-1.97v-1.48h1.9v-.93h-1.9V8.1h1.97v-.94h-3.04v5.5zm7.29-3.87c0-1.03-.71-1.62-1.95-1.62h-1.59v5.5h1.07v-2.21h.14l1.48 2.21h1.32l-1.73-2.32c.81-.17 1.26-.72 1.26-1.56zm-2.16.91h-.31V8.03h.33c.67 0 1.03.28 1.03.82 0 .55-.36.85-1.05.85z"
                              fill="#231F20"></path>
                        <path d="M20.16 12.86a2.931 2.931 0 100-5.862 2.931 2.931 0 000 5.862z"
                              fill="url(#pi-paint0_linear)"></path>
                        <path d="M20.16 12.86a2.931 2.931 0 100-5.862 2.931 2.931 0 000 5.862z"
                              fill="url(#pi-paint1_linear)"
                              opacity=".65"></path>
                        <path d="M36.57 7.506c0-.1-.07-.15-.18-.15h-.16v.48h.12v-.19l.14.19h.14l-.16-.2c.06-.01.1-.06.1-.13zm-.2.07h-.02v-.13h.02c.06 0 .09.02.09.06 0 .05-.03.07-.09.07z"
                              fill="#231F20"></path>
                        <path d="M36.41 7.176c-.23 0-.42.19-.42.42 0 .23.19.42.42.42.23 0 .42-.19.42-.42 0-.23-.19-.42-.42-.42zm0 .77c-.18 0-.34-.15-.34-.35 0-.19.15-.35.34-.35.18 0 .33.16.33.35 0 .19-.15.35-.33.35z"
                              fill="#231F20"></path>
                        <path d="M37 12.984S27.09 19.873 8.976 23h26.023a2 2 0 002-1.984l.024-3.02L37 12.985z"
                              fill="#F48120"></path>
                        <defs>
                            <linearGradient gradientUnits="userSpaceOnUse" id="pi-paint0_linear" x1="21.657" x2="19.632"
                                            y1="12.275"
                                            y2="9.104">
                                <stop stop-color="#F89F20"></stop>
                                <stop offset=".25" stop-color="#F79A20"></stop>
                                <stop offset=".533" stop-color="#F68D20"></stop>
                                <stop offset=".62" stop-color="#F58720"></stop>
                                <stop offset=".723" stop-color="#F48120"></stop>
                                <stop offset="1" stop-color="#F37521"></stop>
                            </linearGradient>
                            <linearGradient gradientUnits="userSpaceOnUse" id="pi-paint1_linear" x1="21.338" x2="18.378"
                                            y1="12.232"
                                            y2="6.446">
                                <stop stop-color="#F58720"></stop>
                                <stop offset=".359" stop-color="#E16F27"></stop>
                                <stop offset=".703" stop-color="#D4602C"></stop>
                                <stop offset=".982" stop-color="#D05B2E"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </li>

                <li>
                    <svg aria-labelledby="pi-google_pay" class="payment-icon" height="24" role="img" viewBox="0 0 38 24"
                         width="35" xmlns="http://www.w3.org/2000/svg"><title id="pi-google_pay">Google Pay</title>
                        <path d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"
                              fill="#000" opacity=".07"></path>
                        <path d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"
                              fill="#FFF"></path>
                        <path d="M18.093 11.976v3.2h-1.018v-7.9h2.691a2.447 2.447 0 0 1 1.747.692 2.28 2.28 0 0 1 .11 3.224l-.11.116c-.47.447-1.098.69-1.747.674l-1.673-.006zm0-3.732v2.788h1.698c.377.012.741-.135 1.005-.404a1.391 1.391 0 0 0-1.005-2.354l-1.698-.03zm6.484 1.348c.65-.03 1.286.188 1.778.613.445.43.682 1.03.65 1.649v3.334h-.969v-.766h-.049a1.93 1.93 0 0 1-1.673.931 2.17 2.17 0 0 1-1.496-.533 1.667 1.667 0 0 1-.613-1.324 1.606 1.606 0 0 1 .613-1.336 2.746 2.746 0 0 1 1.698-.515c.517-.02 1.03.093 1.49.331v-.208a1.134 1.134 0 0 0-.417-.901 1.416 1.416 0 0 0-.98-.368 1.545 1.545 0 0 0-1.319.717l-.895-.564a2.488 2.488 0 0 1 2.182-1.06zM23.29 13.52a.79.79 0 0 0 .337.662c.223.176.5.269.785.263.429-.001.84-.17 1.146-.472.305-.286.478-.685.478-1.103a2.047 2.047 0 0 0-1.324-.374 1.716 1.716 0 0 0-1.03.294.883.883 0 0 0-.392.73zm9.286-3.75l-3.39 7.79h-1.048l1.281-2.728-2.224-5.062h1.103l1.612 3.885 1.569-3.885h1.097z"
                              fill="#5F6368"></path>
                        <path d="M13.986 11.284c0-.308-.024-.616-.073-.92h-4.29v1.747h2.451a2.096 2.096 0 0 1-.9 1.373v1.134h1.464a4.433 4.433 0 0 0 1.348-3.334z"
                              fill="#4285F4"></path>
                        <path d="M9.629 15.721a4.352 4.352 0 0 0 3.01-1.097l-1.466-1.14a2.752 2.752 0 0 1-4.094-1.44H5.577v1.17a4.53 4.53 0 0 0 4.052 2.507z"
                              fill="#34A853"></path>
                        <path d="M7.079 12.05a2.709 2.709 0 0 1 0-1.735v-1.17H5.577a4.505 4.505 0 0 0 0 4.075l1.502-1.17z"
                              fill="#FBBC04"></path>
                        <path d="M9.629 8.44a2.452 2.452 0 0 1 1.74.68l1.3-1.293a4.37 4.37 0 0 0-3.065-1.183 4.53 4.53 0 0 0-4.027 2.5l1.502 1.171a2.715 2.715 0 0 1 2.55-1.875z"
                              fill="#EA4335"></path>
                    </svg>

                </li>

                <li>
                    <svg aria-labelledby="pi-master" class="payment-icon" height="24" role="img" viewBox="0 0 38 24"
                         width="35" xmlns="http://www.w3.org/2000/svg"><title id="pi-master">Mastercard</title>
                        <path d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"
                              opacity=".07"></path>
                        <path d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"
                              fill="#fff"></path>
                        <circle cx="15" cy="12" fill="#EB001B" r="7"></circle>
                        <circle cx="23" cy="12" fill="#F79E1B" r="7"></circle>
                        <path d="M22 12c0-2.4-1.2-4.5-3-5.7-1.8 1.3-3 3.4-3 5.7s1.2 4.5 3 5.7c1.8-1.2 3-3.3 3-5.7z"
                              fill="#FF5F00"></path>
                    </svg>
                </li>

                <li>
                    <svg aria-labelledby="pi-paypal" class="payment-icon" height="24" role="img" viewBox="0 0 38 24"
                         width="35" xmlns="http://www.w3.org/2000/svg"><title id="pi-paypal">PayPal</title>
                        <path d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"
                              opacity=".07"></path>
                        <path d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"
                              fill="#fff"></path>
                        <path d="M23.9 8.3c.2-1 0-1.7-.6-2.3-.6-.7-1.7-1-3.1-1h-4.1c-.3 0-.5.2-.6.5L14 15.6c0 .2.1.4.3.4H17l.4-3.4 1.8-2.2 4.7-2.1z"
                              fill="#003087"></path>
                        <path d="M23.9 8.3l-.2.2c-.5 2.8-2.2 3.8-4.6 3.8H18c-.3 0-.5.2-.6.5l-.6 3.9-.2 1c0 .2.1.4.3.4H19c.3 0 .5-.2.5-.4v-.1l.4-2.4v-.1c0-.2.3-.4.5-.4h.3c2.1 0 3.7-.8 4.1-3.2.2-1 .1-1.8-.4-2.4-.1-.5-.3-.7-.5-.8z"
                              fill="#3086C8"></path>
                        <path d="M23.3 8.1c-.1-.1-.2-.1-.3-.1-.1 0-.2 0-.3-.1-.3-.1-.7-.1-1.1-.1h-3c-.1 0-.2 0-.2.1-.2.1-.3.2-.3.4l-.7 4.4v.1c0-.3.3-.5.6-.5h1.3c2.5 0 4.1-1 4.6-3.8v-.2c-.1-.1-.3-.2-.5-.2h-.1z"
                              fill="#012169"></path>
                    </svg>
                </li>

                <li>
                    <svg aria-labelledby="pi-shopify_pay" class="payment-icon" height="24" role="img"
                         viewBox="0 0 38 24"
                         width="35" xmlns="http://www.w3.org/2000/svg"><title id="pi-shopify_pay">Shop Pay</title>
                        <path d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"
                              fill="#000"
                              opacity=".07"></path>
                        <path d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32z"
                              fill="#5A31F4"></path>
                        <path d="M21.382 9.713c0 1.668-1.177 2.858-2.821 2.858h-1.549a.133.133 0 00-.12.08.127.127 0 00-.01.049v2.192a.129.129 0 01-.13.129h-1.084a.13.13 0 01-.13-.13V6.986a.127.127 0 01.08-.12.129.129 0 01.05-.01h2.9c1.637 0 2.814 1.19 2.814 2.858v-.001zm-1.352 0c0-.958-.658-1.658-1.55-1.658h-1.468a.13.13 0 00-.13.13v3.05a.127.127 0 00.038.092.129.129 0 00.092.038h1.468c.892.005 1.55-.695 1.55-1.652zm1.674 3.791a1.527 1.527 0 01.647-1.317c.423-.316 1.084-.48 2.055-.514l1.033-.036v-.303c0-.607-.41-.863-1.068-.863-.658 0-1.075.231-1.17.61a.127.127 0 01-.125.09h-1.022a.13.13 0 01-.126-.092.125.125 0 01-.004-.055c.152-.898.904-1.58 2.494-1.58 1.692 0 2.303.783 2.303 2.276v3.172a.13.13 0 01-.132.129h-1.03a.13.13 0 01-.13-.13v-.236a.096.096 0 00-.061-.091.1.1 0 00-.107.022c-.31.334-.808.575-1.607.575-1.175 0-1.95-.607-1.95-1.657zm3.735-.687v-.246l-1.339.07c-.705.036-1.115.326-1.115.816 0 .444.376.69 1.034.69.893 0 1.42-.48 1.42-1.33zm2.316 4.6v-.919a.13.13 0 01.049-.1.132.132 0 01.108-.027c.158.029.318.044.479.044a1.229 1.229 0 001.245-.876l.067-.211a.133.133 0 000-.088l-2.145-5.471a.13.13 0 01.06-.165.13.13 0 01.062-.015h1.04a.132.132 0 01.123.085l1.456 3.859a.131.131 0 00.125.088.133.133 0 00.125-.088l1.265-3.848a.13.13 0 01.126-.09h1.076a.134.134 0 01.132.116.134.134 0 01-.008.063l-2.295 6.076c-.528 1.413-1.433 1.773-2.43 1.773a1.959 1.959 0 01-.561-.066.132.132 0 01-.1-.14h.001zM8.57 6.4a5.363 5.363 0 00-3.683 1.427.231.231 0 00-.029.31l.618.839a.236.236 0 00.362.028 3.823 3.823 0 012.738-1.11c2.12 0 3.227 1.584 3.227 3.15 0 1.7-1.163 2.898-2.835 2.921-1.292 0-2.266-.85-2.266-1.974a1.908 1.908 0 01.713-1.48.231.231 0 00.033-.324l-.65-.815a.236.236 0 00-.339-.034 3.43 3.43 0 00-.942 1.183 3.39 3.39 0 00-.337 1.47c0 1.935 1.655 3.452 3.775 3.464h.03c2.517-.032 4.337-1.884 4.337-4.415 0-2.247-1.667-4.64-4.752-4.64z"
                              fill="#fff"></path>
                    </svg>
                </li>

                <li>
                    <svg aria-labelledby="pi-venmo" class="payment-icon" height="24" role="img" viewBox="0 0 38 24"
                         width="35" xmlns="http://www.w3.org/2000/svg"><title id="pi-venmo">Venmo</title>
                        <g fill="none" fill-rule="evenodd">
                            <rect fill="#000" fill-opacity=".07" height="24" rx="3" width="38"></rect>
                            <path d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"
                                  fill="#3D95CE"></path>
                            <path d="M24.675 8.36c0 3.064-2.557 7.045-4.633 9.84h-4.74L13.4 6.57l4.151-.402 1.005 8.275c.94-1.566 2.099-4.025 2.099-5.702 0-.918-.154-1.543-.394-2.058l3.78-.783c.437.738.634 1.499.634 2.46z"
                                  fill="#FFF" fill-rule="nonzero"></path>
                        </g>
                    </svg>

                </li>

                <li>
                    <svg aria-labelledby="pi-visa" class="payment-icon" height="24" role="img" viewBox="0 0 38 24"
                         width="35" xmlns="http://www.w3.org/2000/svg"><title id="pi-visa">Visa</title>
                        <path d="M35 0H3C1.3 0 0 1.3 0 3v18c0 1.7 1.4 3 3 3h32c1.7 0 3-1.3 3-3V3c0-1.7-1.4-3-3-3z"
                              opacity=".07"></path>
                        <path d="M35 1c1.1 0 2 .9 2 2v18c0 1.1-.9 2-2 2H3c-1.1 0-2-.9-2-2V3c0-1.1.9-2 2-2h32"
                              fill="#fff"></path>
                        <path d="M28.3 10.1H28c-.4 1-.7 1.5-1 3h1.9c-.3-1.5-.3-2.2-.6-3zm2.9 5.9h-1.7c-.1 0-.1 0-.2-.1l-.2-.9-.1-.2h-2.4c-.1 0-.2 0-.2.2l-.3.9c0 .1-.1.1-.1.1h-2.1l.2-.5L27 8.7c0-.5.3-.7.8-.7h1.5c.1 0 .2 0 .2.2l1.4 6.5c.1.4.2.7.2 1.1.1.1.1.1.1.2zm-13.4-.3l.4-1.8c.1 0 .2.1.2.1.7.3 1.4.5 2.1.4.2 0 .5-.1.7-.2.5-.2.5-.7.1-1.1-.2-.2-.5-.3-.8-.5-.4-.2-.8-.4-1.1-.7-1.2-1-.8-2.4-.1-3.1.6-.4.9-.8 1.7-.8 1.2 0 2.5 0 3.1.2h.1c-.1.6-.2 1.1-.4 1.7-.5-.2-1-.4-1.5-.4-.3 0-.6 0-.9.1-.2 0-.3.1-.4.2-.2.2-.2.5 0 .7l.5.4c.4.2.8.4 1.1.6.5.3 1 .8 1.1 1.4.2.9-.1 1.7-.9 2.3-.5.4-.7.6-1.4.6-1.4 0-2.5.1-3.4-.2-.1.2-.1.2-.2.1zm-3.5.3c.1-.7.1-.7.2-1 .5-2.2 1-4.5 1.4-6.7.1-.2.1-.3.3-.3H18c-.2 1.2-.4 2.1-.7 3.2-.3 1.5-.6 3-1 4.5 0 .2-.1.2-.3.2M5 8.2c0-.1.2-.2.3-.2h3.4c.5 0 .9.3 1 .8l.9 4.4c0 .1 0 .1.1.2 0-.1.1-.1.1-.1l2.1-5.1c-.1-.1 0-.2.1-.2h2.1c0 .1 0 .1-.1.2l-3.1 7.3c-.1.2-.1.3-.2.4-.1.1-.3 0-.5 0H9.7c-.1 0-.2 0-.2-.2L7.9 9.5c-.2-.2-.5-.5-.9-.6-.6-.3-1.7-.5-1.9-.5L5 8.2z"
                              fill="#142688"></path>
                    </svg>
                </li>
            </ul>
        </div>
    </div>
</footer>
<script>
    function cartClick() {
        <?php
        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) { ?>
        window.location = 'cart.php';
        <?php } else { ?>
        window.location = 'login.php';
        <?php } ?>
    }


</script>
</body>
</html>
