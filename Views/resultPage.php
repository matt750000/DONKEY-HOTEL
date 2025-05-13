<?php include('head.php'); ?>
<?php include('nav.php'); ?>

<h1 class="text-center text-white">
    Donkey Hôtel
</h1>

<?php if (!empty($_SESSION['erreur'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo htmlspecialchars($_SESSION['erreur']); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['erreur']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($_SESSION['success']); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<form method="POST" action="">
    <input type="hidden" name="hotel_name" value="<?= htmlspecialchars($_POST['hotel_name'] ?? '') ?>">
    <input type="hidden" name="price_night" value="<?= htmlspecialchars($_POST['price_night'] ?? '') ?>">
    <input type="hidden" name="start_date" value="<?= htmlspecialchars($_POST['start_date'] ?? '') ?>">
    <input type="hidden" name="end_date" value="<?= htmlspecialchars($_POST['end_date'] ?? '') ?>">

    <!-- Affichage des informations de réservation -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="border rounded p-4">
                <p><strong>Hôtel :</strong> <?= htmlspecialchars($_POST['hotel_name'] ?? ''); ?></p>
                <p><strong>Prix par nuit :</strong> <?= htmlspecialchars($_POST['price_night'] ?? 0); ?> €</p>
                <p><strong>Date d'arrivée :</strong> <?= htmlspecialchars($_POST['start_date'] ?? ''); ?></p>
                <p><strong>Date de départ :</strong> <?= htmlspecialchars($_POST['end_date'] ?? ''); ?></p>
            </div>

            <!-- Affichage des options -->
            <?php foreach ($priceOption as $opt): ?>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="options[]"
                        id="option_<?= htmlspecialchars($opt['id']) ?>"
                        value="<?= htmlspecialchars($opt['id']) ?>">
                    <label class="form-check-label" for="option_<?= htmlspecialchars($opt['id']) ?>">
                        <?= htmlspecialchars($opt['name']) ?> :
                        <span class="text-muted"><?= htmlspecialchars($opt['price']) ?> €</span>
                    </label>
                </div>
            <?php endforeach; ?>

            <!-- Informations client -->
            <div class="col-md-6">
                <h4>Infos client</h4>
                <?php if (!empty($_SESSION['user'])): ?>
                    <?php $user = $_SESSION['user']; ?>
                    <p><strong>Prénom :</strong> <?= htmlspecialchars($user['prenom']) ?></p>
                    <p><strong>Nom :</strong> <?= htmlspecialchars($user['nom']) ?></p>
                    <p><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></p>
                    <p><strong>Téléphone :</strong> <?= htmlspecialchars($user['phone']) ?></p>
                <?php else: ?>
                    <p class="text-danger">Aucune information utilisateur disponible.</p>
                <?php endif; ?>
            </div>

            <div class="col-md-6">
                <p class="fw-bold text-primary mt-4">TOTAL : <?php echo number_format($total, 2); ?> euros</p>
            </div>

            <div class="text-end mt-4">
                <button type="submit" name="valider" value="1" class="btn btn-primary">Réserver</button>
            </div>
        </div>
    </div>
</form>