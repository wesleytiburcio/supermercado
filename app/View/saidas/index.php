
<div class="container">
    <h1>Saidas</h1>

    <!-- form add promocao -->
    <div class="box">
        <h3>Adicionar uma saida</h3>
        <form action="<?php echo URL; ?>saidas/add" method="POST">
        <div>
    
            <div>
            <label>Produto</label>
                <select name="idProduto" required>
                    <option value="">Selecione o Produto</option>
                    <?php foreach($produtos as $value): ?>
                        <option value="<?php echo $value->id ?>"><?php echo $value->nome ?></option>                
                    <?php endforeach ?>
                </select>
       
            <label>Total da Venda</label>
                <select name="idVenda" required>
                    <option value="">Selecione a Venda</option>
                    <?php foreach($vendas as $value): ?>
                        <option value="<?php echo $value->id ?>"><?php echo $value->total ?></option>                
                    <?php endforeach ?>
                </select>

            </div>
            <br>
            
            <label>Valor de Venda</label>
            <input type="text" name="valorvenda" value="" required />
            <label>Quantidade</label>
            <input type="text" name="quantidade" value=""  />
            <label>Data</label>
            <input type="date" name="data" value="" required />
        </div>
        <br>
        <input type="submit" name="submit_add_saida" value="Enviar" />
        
        </form>
    </div>
    <!-- main content output -->
    <div class="box">
        <!--<h3>Total de saidas: <?php /*echo $amount_of_produtos; */?></h3>
        <h3>Total de produtos (via AJAX)</h3>
        <div id="javascript-ajax-result-box"></div>
        <div>
            <button id="javascript-ajax-button">Clique aqui para obter a quantidade de produtos via Ajax (será exibido em # javascript-ajax-result-box acima)</button>
        </div>-->
        <h3>Lista de Saidas (dados do model)</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>ID</td>
                <td>Produto</td>
                <td>Total da Venda</td>
                <td>Valor de Venda</td>
                <td>Quantidade</td>
                <td>Data</td>
                <td>Excluir</td>
                <td>Atualizar</td>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($saidas as $saida) { ?>
                <tr>
                    <td><?php if (isset($saida->id)) echo htmlspecialchars($saida->id, ENT_QUOTES, 'UTF-8'); ?></td> 
                    
                    <td><?php if (isset($saida->nomeProduto)) echo htmlspecialchars($saida->nomeProduto, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($saida->totalVenda)) echo htmlspecialchars($saida->totalVenda, ENT_QUOTES, 'UTF-8'); ?></td>
                 
                    <td><?php if (isset($saida->valorvenda)) echo htmlspecialchars($saida->valorvenda, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($saida->quantidade)) echo htmlspecialchars($saida->quantidade, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($saida->data)) echo htmlspecialchars($saida->data, ENT_QUOTES, 'UTF-8'); ?></td>

                    <td><a href="<?php echo URL . 'saidas/delete/' . htmlspecialchars($saida->id, ENT_QUOTES, 'UTF-8'); ?>">Excluir</a></td>
                    <td><a href="<?php echo URL . 'saidas/edit/' . htmlspecialchars($saida->id, ENT_QUOTES, 'UTF-8'); ?>">Editar</a></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</div>