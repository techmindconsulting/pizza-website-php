<div class="topbar">
    <h1><a href="index.php">Pizza Food</a></h1>
        <nav id="menu">
            <ul>
                <li><a href="#service" 
                <?php 
                        if ($currentPage === 'homepage') { ?> 
                            class="active" 
                <?php   } ?> 
                     >Service</a></li>
                <li><a href="index.php#localisation">Plan d'accès</a></li>
                <li><a href="index.php#contact">Contact</a></li>
                <li><a href="carte.php" <?php
                        if($currentPage === 'carte') { ?>
                        class="active"
                <?php   }
                ?>>La carte</a></li>
                <li>
                    <?php 
                        $link = isset($_SESSION['auth']['logged']) ? 'profile.php' : 'logout.php'; 
                        $class = $currentPage === 'login' ? 'active' : '';
                    ?>

                    <a href="<?=$link ?>"  class="<?=$class?>">
                        <?php 
                            if (isset($_SESSION['auth']['logged'])) {
                                echo 'Mon compte';
                            } else {
                                echo 'Se connecter';
                            }
                        ?>
                    </a>
                </li>
                
            </ul>
        </nav>
    </div>
    <div class="nav-mobile">
        <a href="#menu-responsive">
            <svg viewBox="0 0 100 65" width="40" height="40">
                <rect y="0" width="100" height="20" fill="#ffffff"></rect>
                <rect y="30" width="100" height="20" fill="#ffffff"></rect>
                <rect y="60" width="100" height="20" fill="#ffffff"></rect>
            </svg>
        </a>
    <nav id="menu-responsive" class="menu-responsive">
        <a class="close" href="#close"><i class="fas fa-times"></i></a>
        <ul>
            <li><a href="index.php#service">Service</a></li>
            <li><a href="index.php#localisation">Plan</a></li>
            <li><a href="index.php#contact">Contact</a></li>
            <li><a href="carte.php" <?php
                        if($currentPage === 'carte') { ?>
                        class="active"
                <?php   }
                ?>>La carte</a></li>
                <li>
                    <?php 
                        $link = isset($_SESSION['auth']['logged']) ? 'profile.php' : 'login.php'; 
                        $class = $currentPage === 'login' ? 'active' : '';
                    ?>

                    <a href="<?=$link ?>"  class="<?=$class?>">
                        <?php 
                            if (isset($_SESSION['auth']['logged'])) {
                                echo 'Mon compte';
                            } else {
                                echo 'Se connecter';
                            }
                        ?>
                    </a>
                </li>
                <?php if (isset($_SESSION['auth']['logged'])) { ?>
                    <li><a href="logout.php">Déconnexion</a></li>
                <?php } ?>
        </ul>
    </nav>
</div>