<?php include('head.php'); ?>

<body>
    <?php if (!empty($_SESSION['erreur'])): ?>
        <div class="alert alert-danger">
            <?php echo htmlspecialchars($_SESSION['erreur']);
            unset($_SESSION['erreur']); ?>
        </div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?php echo htmlspecialchars($_SESSION['success']);
            unset($_SESSION['success']); ?>
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
                        <form id="registrationForm" method="post" action="">
                            <div class="form-group">
                                <label for="email"></label>
                                <input type="email" class="form-control" id="mail" placeholder="Entre votre e-mail" name="mail" required />
                            </div>
                            <div class="form-group">
                                <label for="password"></label>
                                <input type="password" class="form-control" id="pass" placeholder="Votre mot de passe" name="pass" required>
                            </div>
                            <div class="form-group">
                                <label for="text"></label>
                                <input type="text" class="form-control" id="civility" placeholder="civility" name="civility" required>
                            </div>
                            <div class="form-group">
                                <label for="text"></label>
                                <input type="text" class="form-control" id="lastname" placeholder="Nom" name="lastname" required>
                            </div>
                            <div class="form-group">
                                <label for="text"></label>
                                <input type="text" class="form-control" id="firstname" placeholder="Prénom" name="firstname" required>
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber"></label>
                                <input type="text" class="form-control" id="phoneNumber" placeholder="Numéro de téléphone" name="phoneNumber" required>
                            </div>
                            <button class="btn btn-warning">Connexsion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>