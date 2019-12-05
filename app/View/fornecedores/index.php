
<div class="container">
    <h1>Fornecedores</h1>
    
    <!-- form add categorias -->
    <div class="box">
        <h3>Adicionar um fornecedor</h3>
        <form action="<?php echo URL; ?>fornecedores/add" method="POST">
            <label>Nome</label>
            <input type="text" name="nome" value="" required />

            <label>Email</label>
            <input type="text" name="email" value="" required />

            <label>Telefone</label>
            <input type="text" name="telefone" value="" required />

            <input type="submit" name="submit_add_fornecedores" value="Enviar" />
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
        <h3>Lista de Fornecedores (dados do model)</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Email</td>
                <td>Telefone</td>
                <td>Status</td>
                <td colspan="2">Ações</td>

            </tr>
            </thead>
            <tbody>

            <?php foreach ($fornecedores as $fornecedor) { ?>
                <tr>
                    <td><?php if (isset($fornecedor->id)) echo htmlspecialchars($fornecedor->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($fornecedor->nome)) echo htmlspecialchars($fornecedor->nome, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($fornecedor->email)) echo htmlspecialchars($fornecedor->email, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($fornecedor->telefone)) echo htmlspecialchars($fornecedor->telefone, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($fornecedor->status)) echo htmlspecialchars($fornecedor->status, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'fornecedores/delete/' . htmlspecialchars($fornecedor->id, ENT_QUOTES, 'UTF-8'); ?>">Excluir</a></td>
                    <td><a href="<?php echo URL . 'fornecedores/edit/' . htmlspecialchars($fornecedor->id, ENT_QUOTES, 'UTF-8'); ?>">Editar</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>