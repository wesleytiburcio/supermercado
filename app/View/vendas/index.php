
<div class="container">
    <h1>Vendas</h1>
 
    <!-- form add promocao -->
    <div class="box">
        <h3>Adicionar uma venda</h3>
        <form action="<?php echo URL; ?>vendas/add" method="POST">
        <div>
            <label>Data</label>
            <input type="date" name="data" value="" required />
            <label>Total</label>
            <input type="text" name="total" value="" required />

            <label>Valor Pago</label>
            <input type="text" name="valorpago" value="" required />
            <label>Troco</label>
            <input type="text" name="troco" value="" Readonly />
            
        </div>
        <br>
        <input type="submit" name="submit_add_venda" value="Enviar" />
        
        </form>
    </div>
    <!-- main content output -->
    <div class="box">
        <!--<h3>Total de produtos: <?php /*echo $amount_of_produtos; */?></h3>
        <h3>Total de produtos (via AJAX)</h3>
        <div id="javascript-ajax-result-box"></div>
        <div>
            <button id="javascript-ajax-button">Clique aqui para obter a quantidade de produtos via Ajax (será exibido em # javascript-ajax-result-box acima)</button>
        </div>-->
        <h3>Lista de Vendas (dados do model)</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>ID</td>
                <td>Data</td>
                <td>Total</td>
                <td>Valor Pago</td>
                <td>Troco</td>
                <td>Excluir</td>
                <td>Atualizar</td>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($vendas as $venda) { ?>
                <tr>
                    <td><?php if (isset($venda->id)) echo htmlspecialchars($venda->id, ENT_QUOTES, 'UTF-8'); ?></td>                    
                    <td><?php if (isset($venda->data)) echo htmlspecialchars($venda->data, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($venda->total)) echo htmlspecialchars($venda->total, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($venda->valorpago)) echo htmlspecialchars($venda->valorpago, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($venda->troco)) echo htmlspecialchars($venda->troco, ENT_QUOTES, 'UTF-8'); ?></td>
                    
                    <td><a href="<?php echo URL . 'vendas/delete/' . htmlspecialchars($venda->id, ENT_QUOTES, 'UTF-8'); ?>">Excluir</a></td>
                    <td><a href="<?php echo URL . 'vendas/edit/' . htmlspecialchars($venda->id, ENT_QUOTES, 'UTF-8'); ?>">Editar</a></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</div>