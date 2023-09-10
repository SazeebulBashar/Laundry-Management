
        <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-container">
            <div class="container-fluid">
                <div class="div">
                    <a class="navbar-brand" href="index.php"><img id="logo" src="./images/logo.jpg" alt="Happy Laundry"><a href="index.php" id="logo-title">Happy Laundry</a></a>
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        <a class="nav-link" href="services.php">Services</a>
                        <a class="nav-link" href="#">Pricing</a>
                        <a class="nav-link" href="#">About</a>


                        <?php
                        if (isset($_SESSION["user"])) {
                           echo "<a href='logout.php' class='btn btn-warning'> Logout </a>";
                   
                           echo  "<button type='button' class='btn btn-primary position-relative icon round'>"
                           . strtoupper($_SESSION["name"][0]) . strtoupper($_SESSION["name"][-1]) . "<span class='position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle'>
                             <span class='visually-hidden'>New alerts</span>
                           </span></button>" ; 

                        }
                        else{
                            echo "<a class='nav-link' href='registration.php'>Register</a>";
                            echo "<a href='login.php' class='btn btn-warning'>Login</a>";
                        }
                          ?>


                    </div>
                </div>
            </div>
        </nav>
