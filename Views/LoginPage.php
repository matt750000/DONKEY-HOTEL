<?php include('head.php'); ?>

<body>
    <?php include('nav.php'); ?>

    <div class="message-de-errour">
        <?php if (!empty($_SESSION['erreur'])): ?>
            <div class="alert alert-danger"><?php echo $_SESSION['erreur'];
                                            unset($_SESSION['erreur']); ?></div>
        <?php endif; ?>
        <?php if (!empty($_SESSION['success'])): ?>
            <div class="alert alert-success"><?php echo $_SESSION['success'];
                                                unset($_SESSION['success']); ?></div>
        <?php endif; ?>
    </div>
    <h1>Donkey Hôtel</h1>
    <form method="POST">
        <div class="mb-4">
            <main class="container">
                <div class="row">
                    <section class="col-12">
                        <h1>Connexion à l'espace particulier</h1>

                        <form method="post" action="">
                            <div class="form-group">
                                <label for="email">Adresse Mail</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Mots de passe</label>
                                <input type="password" id="password" name="password" minlength="8" class="form-control" required>
                            </div>
                            <div class="mt-3">
                                <input type="submit" class="btn btn-primary" value="Connexion">
                                <a href="index.php" class="btn btn-secondary">Retour</a>
                            </div>
                        </form>
                    </section>
                </div>
            </main>

            <footer>
                <?php
                include('footer.php'); ?>

</body>

</html>