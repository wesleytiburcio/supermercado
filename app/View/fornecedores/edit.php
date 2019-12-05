<div class="container">
    <h1>Fornecedor</h1>
    <h2>Você está na View: app/view/fornecedores/index.php (tudo nesta tela vem desse arquivo)</h2>
    <!-- form add categorias -->
    <div class="box">
        <h3>Editar um fornecedor</h3>

        <form action="<?php echo URL; ?>fornecedores/update" method="POST">
            <input type="hidden" name="id" value="<?= $dados->id ?>">

            <label>Nome</label>
            <input type="text" name="nome" value="<?= $dados->nome ?>" required />

            <label>Email</label>
            <input type="text" name="email" value="<?= $dados->email ?>" required />

            <label>Telefone</label>
            <input type="text" name="telefone" value="<?= $dados->telefone ?>" required />

            <input type="submit" name="submit_add_fornecedores" value="Enviar" />
        </form>
    </div>
</div>