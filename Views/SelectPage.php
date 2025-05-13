<?php include('head.php');
include('nav.php');
?>
<?php
$search = $_SESSION['search'] ?? [];
$hotelsDisponibles = $_SESSION['hotelsDisponibles'] ?? [];
?>
<h1 class="text-center text-white">
    Donkey Hôtel
</h1>

<?php if (!empty($_SESSION['erreur'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($_SESSION['erreur']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['erreur']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($_SESSION['success']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>


<?php if (!empty($search['city'])): ?>
    <div class="fs-4 fw-bold text-white" style="padding: 20px;">
        Ville : <?= htmlspecialchars($search['city']) ?>
    </div>
<?php endif; ?>
<div class="container">
    <div class="row">
        <?php if (!empty($hotelsDisponibles)) : ?>
            <?php foreach ($hotelsDisponibles as $hotel) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($hotel['hotel_name']) ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($hotel['pricenight']) ?> € / nuit</h6>
                            <p class="card-text">Arrivée : <?= htmlspecialchars($search['startdate']) ?></p>
                            <p class="card-text">Départ : <?= htmlspecialchars($search['enddate']) ?></p>

                            <form method="POST" action="http://localhost:8000/index.php?page=result">
                                <input type="hidden" name="hotel_name" value="<?= htmlspecialchars($hotel['hotel_name']) ?>">
                                <input type="hidden" name="price_night" value="<?= htmlspecialchars($hotel['pricenight']) ?>">
                                <input type="hidden" name="start_date" value="<?= htmlspecialchars($search['startdate']) ?>">
                                <input type="hidden" name="end_date" value="<?= htmlspecialchars($search['enddate']) ?>">
                                <button type="submit" class="btn btn-warning btn-lg">Réserver</button>
                            </form>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="alert alert-warning mt-4" role="alert">
                Aucun hôtel trouvé pour cette ville.
            </div>
        <?php endif; ?>
    </div>
</div>
<?php
include('footer.php'); ?>