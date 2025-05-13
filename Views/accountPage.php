<?php
include 'head.php';
include 'nav.php';
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

<div class="col-md-6">
    <?php if (!empty($_SESSION['user'])): ?>
        <?php $user = $_SESSION['user']; ?>
        <h4>mon</h4>
        <p><strong>Prénom :</strong> <?= htmlspecialchars($user['prenom']) ?></p>
        <p><strong>Nom :</strong><a href=""><?= htmlspecialchars($user['nom']) ?></a></p>
        <p><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Téléphone :</strong> <?= htmlspecialchars($user['phone']) ?></p>
    <?php else: ?>
        <p class="text-danger">Aucune information utilisateur disponible.</p>
    <?php endif; ?>
</div>


<?php include('footer.php'); ?>