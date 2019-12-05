<div class="container">
    <h1>Categoria</h1>
    
    <!-- form add categorias -->
    <div class="box">
        <h3>Editar uma categoria</h3>
        <form action="<?php echo URL; ?>categorias/update" method="POST">
            <input type="hidden" name="id" value="<?= $dados->id ?>">

            <label>Nome</label>
            <input type="text" name="nome" value="<?= $dados->nome ?>" required />

            <input type="submit" name="submit_edit_categoria" value="Enviar" />
        </form>
    </div>
</div>