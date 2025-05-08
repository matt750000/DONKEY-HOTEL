<?php include('head.php');
include('nav.php');
?>
<?php
$priceOption = $_SESSION['prixOption']  ?? [];
?>
<h1 class="text-center text-white">
    Donkey Hôtel
</h1>
<?php if (!empty($_SESSION['erreur'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo htmlspecialchars($_SESSION['erreur']) ?>
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

<div class="container my-5">
    <div class="row mb-4">
        <div class="col-md-6">

            <form method="POST" action="index.php?page=confirmation">
                <div class="row mb-4">
                    <!-- Hôtel -->
                    <div class="col-md-6">
                        <div class="border rounded p-4">

                            <p>Hôtel : <?= htmlspecialchars($_POST['hotel_name']) ?></p>
                            <p>Prix par nuit : <?= htmlspecialchars($_POST['price_night']) ?> €</p>
                            <p>Date d'arrivée : <?= htmlspecialchars($_POST['start_date']) ?></p>
                            <p>Date de départ : <?= htmlspecialchars($_POST['end_date']) ?></p>

                            <!-- Champs cachés pour transférer les infos -->
                            <input type="hidden" name="hotel_name" value="<?= htmlspecialchars($_POST['hotel_name']) ?>">
                            <input type="hidden" name="price_night" value="<?= htmlspecialchars($_POST['price_night']) ?>">
                            <input type="hidden" name="start_date" value="<?= htmlspecialchars($_POST['start_date']) ?>">
                            <input type="hidden" name="end_date" value="<?= htmlspecialchars($_POST['end_date']) ?>">
                        </div>



                        <div class="form-check mb-2">
                            <?php var_dump($priceOptions);
                            exit; ?>
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="options[]"
                                id="option_<?= htmlspecialchars($opt['id']) ?>"
                                value="<?= htmlspecialchars($opt['name']) ?>"
                                <?= isset($_POST['options']) && in_array($opt['name'], $_POST['options']) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="option_<?= htmlspecialchars($opt['id']) ?>">
                                <?= htmlspecialchars($opt['name']) ?> :
                                <span class="text-muted"><?= htmlspecialchars($opt['price']) ?> €</span>
                            </label>
                        </div>

                    </div>
                </div>


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
                    <button type="submit" class="btn btn-primary">Réservation</button>

                </div>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>