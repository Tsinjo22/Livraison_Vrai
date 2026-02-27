<?php include 'header.php'; ?>

<main class="container">

    <h1>Bienvenue sur la page d'accueil</h1>
    <p class="subtitle">Voici la liste des statuts de Livraison :</p>

    <div class="status-list">
        <?php foreach ($statuses as $s) { ?>
            <a class="status-btn" href="/status/<?= $s['id'] ?>">
                <?= $s['nom'] ?>
            </a>
        <?php } ?>
    </div>

    <?php if (!empty($WhereStatus)) { ?>
        <h2 class="section-title">
            Livraison : <?= $statuName['nom'] ?>
        </h2>

        <table class="table-livraison">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Livreur</th>
                    <th>Vehicule</th>
                    <th>Depart</th>
                    <th>Arrivee</th>
                    <th>Colis</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($WhereStatus as $d) { ?>
                <tr>
                    <td><?= $d['numero'] ?></td>
                    <td><?= $d['livreur'] ?></td>
                    <td><?= $d['vehicule'] ?></td>
                    <td><?= $d['depart'] ?></td>
                    <td><?= $d['arrivee'] ?></td>
                    <td>
                        <a class="link-btn" href="/colis/<?= $d['idColis'] ?>">Voir</a>
                    </td>
                    <td>
                        <a class="link-btn secondary" href="/livraison/<?= $d['numero'] ?>">Voir</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="empty">Aucune livraison trouvée</p>
    <?php } ?>

</main>