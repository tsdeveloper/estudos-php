<?php $v->layout("test::base", ["title" => "Editando usuário {$user->first_name}"]); ?>

<?php $v->start("nav"); ?>
<a href="./" title="Voltar">Voltar</a>
<?php $v->stop(); ?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="name" value="<?= $user->first_name; ?>">
    <input type="text" name="name" value="<?= $user->last_name; ?>">
    <input type="text" name="name" value="<?= $user->email; ?>">
    <button>Atualizar Usuário</button>
</form>
