
<div class="container">
    <h1>Medições</h1>
    
    <!-- form add categorias -->
    <div class="box">
        <h3>Adicionar uma medição</h3>
        <form action="<?php echo URL; ?>medicoes/add" method="POST">

            <label>Sigla</label>
            <input type="text" name="sigla" value="" required />
            <label>Descrição</label>
            <input type="text" name="descricao" value="" required />

            <input type="submit" name="submit_add_medicao" value="Enviar" />
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
        <h3>Lista de medições (dados do model)</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>ID</td>
                <td>Sigla</td>
                <td>Descrição</td>
                <td>Status</td>
                <td colspan="2">Ações</td>

            </tr>
            </thead>
            <tbody>

            <?php foreach ($medicoes as $medicao) { ?>
                <tr>
                    <td><?php if (isset($medicao->id)) echo htmlspecialchars($medicao->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($medicao->sigla)) echo htmlspecialchars($medicao->sigla, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($medicao->descricao)) echo htmlspecialchars($medicao->descricao, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($medicao->status)) echo htmlspecialchars($medicao->status, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'medicoes/delete/' . htmlspecialchars($medicao->id, ENT_QUOTES, 'UTF-8'); ?>">Excluir</a></td>
                    <td><a href="<?php echo URL . 'medicoes/edit/' . htmlspecialchars($medicao->id, ENT_QUOTES, 'UTF-8'); ?>">Editar</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>