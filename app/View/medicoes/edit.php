<div class="container">
    <h1>Medição</h1>
    <h2>Você está na View: app/view/medições/index.php (tudo nesta tela vem desse arquivo)</h2>
    <!-- form add categorias -->
    <div class="box">
        <h3>Editar uma medição</h3>
        <form action="<?php echo URL; ?>medicoes/update" method="POST">
            <input type="hidden" name="id" value="<?= $dados->id ?>">

            <label>Sigla</label>
            <input type="text" name="sigla" value="<?= $dados->sigla ?>"  />
            <label>Descrição</label>
            <input type="text" name="descricao" value="<?= $dados->descricao ?>"  />

            <input type="submit" name="submit_edit_medicao" value="Enviar" />
        </form>
    </div>
</div>