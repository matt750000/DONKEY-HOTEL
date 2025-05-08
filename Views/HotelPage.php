<?php
include('head.php');
include('nav.php');
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
<div class="bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <h4 class="mb-4">Trouvez votre hôtel</h4>
                <form method="post" action="">
                    <div class="mb-3">
                        <select class="form-select" id="city" name="city" required>
                            <option value="" disabled selected>Choisissez une ville</option>
                            <?php foreach ($hotel as $item) : ?>
                                <option value="<?= htmlspecialchars($item['id']) ?>">
                                    <?= htmlspecialchars($item['name']) ?>
                                </option> <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="startdate">Date d'arrivée</label>
                        <input type="date" id="startdate" name="startdate">
                    </div>
                    <div class="mb-3">
                        <label for="enddate">Date de retour</label>
                        <input type="date" id="enddate" name="enddate">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-warning btn-lg"> Envoyer </button>
                    </div>
                </form>
            </div>

            <div class="col-md-6 text-center">
                <img src="../img/photo-hotel-paris.jpg" alt="hotel" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php'); ?>