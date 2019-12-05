
<div class="container">
    <h1>Categorias</h1>
   
    <!-- form add categorias -->
    <div class="box">
        <h3>Adicionar uma categoria</h3>
        <form action="<?php echo URL; ?>categorias/add" method="POST">
            <label>Nome</label>
            <input type="text" name="nome" value="" required />

            <input type="submit" name="submit_add_categoria" value="Enviar" />
        </form>
    </div>
    <!-- main content output -->
    <div class="boxabel>">
<!--        <h3>Total de categorias: --><?php //echo $amount_of_produtos; ?><!--</h3>-->
<!--        <h3>Total de categorias (via AJAX)</h3>-->
<!--        <div id="javascript-ajax-result-box"></div>-->
<!--        <div>-->
<!--            <button id="javascript-ajax-button">Clique aqui para obter a quantidade de produtos via Ajax (será exibido em # javascript-ajax-result-box acima)</button>-->
<!--        </div>-->
        <h3>Lista de categorias (dados do model)</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Status</td>
                <td colspan="2">Ações</td>

            </tr>
            </thead>
            <tbody>

            <?php foreach ($categorias as $categoria) { ?>
                <tr>
                    <td><?php if (isset($categoria->id)) echo htmlspecialchars($categoria->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($categoria->nome)) echo htmlspecialchars($categoria->nome, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($categoria->status)) echo htmlspecialchars($categoria->status, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'categorias/delete/' . htmlspecialchars($categoria->id, ENT_QUOTES, 'UTF-8'); ?>">Excluir</a></td>
                    <td><a href="<?php echo URL . 'categorias/edit/' . htmlspecialchars($categoria->id, ENT_QUOTES, 'UTF-8'); ?>">Editar</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>