<?php include('head.php'); ?>
<?php include('nav.php'); ?>

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
<h4>MES RESERVATIONS</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Ville</th>
            <th scope="col">Arrivé / Retour</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($showbg as $bg): ?>
            <?php var_dump($bg); ?>
            <tr>
                <td><?= htmlspecialchars($bg['name']) ?></td>
                <td>
                    <?php
                    echo htmlspecialchars($bg['startdate']) . ' / ' . htmlspecialchars($bg['enddate']);
                    ?>
                </td>
                <td>
                    <!-- Exemple d'affichage des actions pour chaque réservation -->
                    <a href="details.php?id=<?= ($userId) ?>">Modifier</a>
                    <a href=" details.php?id=<?= ($userId) ?>">Annuler</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include('footer.php'); ?>