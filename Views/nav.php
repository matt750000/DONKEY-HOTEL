<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<body>
    <nav class="navbar">
        <div class=" container-fluid d-flex justify-content-between align-items-center">

            <div class="d-flex">
                <ul class="nav">
                    <li class="nav-item">
                        <?php if (!empty($_SESSION['user']) && !empty($_SESSION['user'])): ?>
                            <a class="nav-link active text-white" href="#">
                                <?php echo
                                htmlspecialchars($_SESSION['user']['prenom'])
                                    . ' ' .
                                    htmlspecialchars($_SESSION['user']['nom'])
                                ?>
                            </a>
                        <?php else: ?>
                            <a class="nav-link text-white fw-bold" href="login.php">Connexion</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>


            <div class="d-flex justify-content-center flex-grow-1">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="http://localhost:8000/index.php?page=account">Mon compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="http://localhost:8000/index.php?page=myReservation">Mes réservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-bold" href="http://localhost:8000/index.php?page=hotel">Trouver un hôtel</a>
                    </li>
                </ul>
            </div>


            <div class="d-flex">
                <ul class="nav">
                    <?php if (!empty($_SESSION['user'])): ?>
                        <li class="nav-item">
                            <a class="nav-link text-white  bg-primary" href="index.php?page=logout">Se déconnecter</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

        </div>
    </nav>