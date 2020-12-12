  <!-- footer -->
  <footer id="footer" class="footer">
    <div class="container">
        <div>
            <h3>Pizza Billy</h3>
            <nav>
                <ul>
                    <li><a href="index.php#header">Notre pizzeria</a></li>
                    <li><a href="index.php#localisation">Plan d'accès</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
                    <li><a href="#">La carte</a></li>
                </ul>
            </nav>
        </div>
        <div>
            <h3>Pizzeria</h3>
            <p>Ouvert tous les jours</p>
            <p><time datetime="17:30">17h30</time> à <time datetime="22:30">22h30</time></p>
            <p><?= CONTACT_ADDRESS ?></p>
            <address><?php CONTACT_PHONE ?></address>
        </div>
        <div>
            <h3>Notre carte</h3>
            <a href="#" download="pdf/carte_pizza_billy_marseille_13005.pdf">Télécharger la carte pizza billy</a>
        </div>
    </div>
    <p class="copyright">© Pizza Billy - Pizzeria <?= date('Y'); ?></p>
</footer>