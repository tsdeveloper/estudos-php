<?php $v->layout("test::base"); ?>

<?= (new \Source\Core\Session())->flash(); ?>

<?php foreach ($list as $user): ?>
    <article>
        <h1><?= "{$user->first_name} {$user->last_name}"; ?></h1>
        <p><?= $user->email; ?> - Registrado em <?= date_fmt($user->created_at); ?></p>
        <a href="editar&id=<?= $user->id; ?>" title="Editar">Editar</a>
    </article>

<?php endforeach; ?>

<?= ($pager ?? null); ?>
