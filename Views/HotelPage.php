<?php

include('head.php'); ?>

<body>
    <?php include('nav.php'); ?>
    <h1>Donkey Hôtel</h1>
    <form method="POST">
        <div class="mb-4">
            <LEgend>Trouvez votre hôtel</LEgend>
            <label for="ville" class="form-label">
                <select class="form-select" id="ville" name="ville" required>
                    <option value="" disabled selected>Choisissez une ville</option>
                    <?php foreach ($hotel as $item) : ?>
                        <option value="<?= htmlspecialchars($item['name']) ?>">
                            <?= htmlspecialchars($item['name']) ?>
                        </option> <?php endforeach; ?>
                </select>
                <label for="arrivalDate" class="form-label">
                    <select class="form-select" id="arrivalDate" name="arrivalDate" required>
                        <option value="" disabled selected>Date d'arrivée</option>
                        <?php foreach ($hotel as $item) : ?>
                            <option value="<?= htmlspecialchars($item['startdate']) ?>">
                                <?= htmlspecialchars($item['startdate']) ?>
                            </option> <?php endforeach; ?>
                    </select>

                    <label for="departDate" class="form-label">
                        <select class="form-select" id="departDate" name="departDate" required>
                            <option value="" disabled selected>Date de retour</option>
                            <?php foreach ($hotel as $item) : ?>
                                <option value="<?= htmlspecialchars($item['enddate']) ?>">
                                    <?= htmlspecialchars($item['enddate']) ?>
                                </option> <?php endforeach; ?>
                        </select>

                        <a href="../controlleurs/HotelController.php" class="btn btn-primary">Voir</a>
        </div>
        <div class="img1">
            <img src="../img/photo-hotel-paris.jpg" alt="hotel">
        </div>
    </form>
    <?php
    include('footer.php'); ?>

</body>

</html>