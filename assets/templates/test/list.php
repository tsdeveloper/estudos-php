<?php $v->layout("test::base"); ?>


<?php foreach ($listUsuarios as $user): ?>
    <article>
        <h1><?= "{$user->first_name} {$user->last_name}"; ?></h1>
        <p><?= $user->email; ?> - Registrado em <?= "este" ?></p>
        <a href="?id=<?= $user->id; ?>" title="Editar">Editar</a>
    </article>

<?php endforeach; ?>

<?= ($pager ?? null); ?>
