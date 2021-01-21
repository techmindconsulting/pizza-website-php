<div class="cards">
    <div class="card">
        <h3>Mon profil</h3>
        <h4><?= $_SESSION['auth']['user']['fullname'] ?></h4>
        <h4><?= $_SESSION['auth']['user']['email'] ?></h4>
        <h4><?= $_SESSION['auth']['user']['phone'] ?></h4>
        <h4><?= $_SESSION['auth']['user']['address'] ?></h4>
    </div>
    <div class="card">
        <h3><?= $statOrder['total']; ?> commandes</h3>
        <ul>
            <li><?= $statOrder['status']['PAYMENT_STATUS_PENDING']?? 0  ?> commandes en attente</li>
            <li><?= $statOrder['status']['PAYMENT_STATUS_PAID']?? 0 ?> commandes payées</li>
            <li><?= $statOrder['status']['PAYMENT_STATUS_CANCELLED']?? 0 ?> commandes annulées</li>
        </ul>
    </div>
</div>