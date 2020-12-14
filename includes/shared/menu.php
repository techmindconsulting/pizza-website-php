<div class="topbar">
    <h1><a href="index.php">Pizza Billy</a></h1>
        <nav id="menu">
            <ul>
                <li><a href="#service" 
                <?php 
                    if ($currentPage === 'homepage') { ?> 
                        class="active" 
                <?php } ?> 
                     >Service</a></li>
                <li><a href="#localisation">Plan d'accès</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="carte.php" 
                <?php 
                    if ($currentPage === 'contact') { ?> 
                        class="active"
                <?php } ?>
                    >La carte</a></li>
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
            <li><a href="#service">Service</a></li>
            <li><a href="#localisation">Plan</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="carte.php">La carte</a></li>
        </ul>
    </nav>
</div>