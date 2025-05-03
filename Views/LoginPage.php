<?php include('head.php'); ?>

<body>
    <h1 class="text-success text-center">
        Donkey Hôtel
    </h1>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form id="registrationForm" action="">
                            <div class="form-group">
                                <label for="mail"></label>
                                <input type="email" class="form-control" id="mail" placeholder="Entre votre e-mail" name="mail" required />
                            </div>
                            <div class="form-group">
                                <label for="pass"></label>
                                <input type="password" class="form-control" id="pass" placeholder="Votre mot de passe" name="pass" required>
                            </div>
                            <button class="btn btn-warning"> Connexsion </button>
                        </form>
                        <p class="mt-3">vous n'avez pas de compte ? <a href="#">Inscruvez-vous !</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>