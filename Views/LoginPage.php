<?php include('head.php'); ?>

<body>
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

    <!-- Affichage du message d'erreur local (par exemple $error) -->
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>
    <h1 class="text-success text-center">
        Donkey Hôtel
    </h1>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form id="registrationForm" action="" method="POST">
                            <div class="form-group">
                                <label for="mail"></label>
                                <input type="email" class="form-control" id="mail" placeholder="Entre votre e-mail" name="mail" required />
                            </div>
                            <div class="form-group">
                                <label for="pass"></label>
                                <input type="password" class="form-control" id="pass" placeholder="Votre mot de passe" name="pass" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning">Se connecter</button>
                            </div>
                        </form>
                        <p class="mt-3">vous n'avez pas de compte ? <a href="http://localhost:8000/index.php?page=register">Inscrivez-vous !</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>