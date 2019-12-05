
<div class="container">
    <h1>Promoçôes</h1>
  
    <!-- form add promocao -->
    <div class="box">
        <h3>Adicionar uma promoção</h3>
        <form action="<?php echo URL; ?>promocoes/add" method="POST">
        <div>
            <label>Nome</label>
            <input type="text" name="nome" value="" required />
            <label>Porcentagem</label>
            <input type="text" name="porcentagem" value="" required />
            
        </div>
        <br>
        <div>
        <label>Produto</label>
            <select name="idProduto" required>
                <option value="">Selecione o Produto</option>
                <?php foreach($produtos as $value): ?>
                    <option value="<?php echo $value->id ?>"><?php echo $value->nome ?></option>                
                <?php endforeach ?>
            </select>

        </div>
        <br>
            <input type="submit" name="submit_add_promocao" value="Enviar" />
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
        <h3>Lista de produtos (dados do model)</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Porcentagem</td>
                <td>Produto</td>
                <td>Status</td>
                <td>Excluir</td>
                <td>Atualizar</td>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($promocoes as $promocao) { ?>
                <tr>
                    <td><?php if (isset($promocao->id)) echo htmlspecialchars($promocao->id, ENT_QUOTES, 'UTF-8'); ?></td>                    
                    <td><?php if (isset($promocao->nome)) echo htmlspecialchars($promocao->nome, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($promocao->porcentagem)) echo htmlspecialchars($promocao->porcentagem, ENT_QUOTES, 'UTF-8'); ?></td>
                    
                    <td><?php if (isset($promocao->nomeProduto)) echo htmlspecialchars($promocao->nomeProduto, ENT_QUOTES, 'UTF-8'); ?></td>
                    
                    
                    <td><?php if (isset($promocao->status)) echo htmlspecialchars($promocao->status, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'promocoes/delete/' . htmlspecialchars($promocao->id, ENT_QUOTES, 'UTF-8'); ?>">Excluir</a></td>
                    <td><a href="<?php echo URL . 'promocoes/edit/' . htmlspecialchars($promocao->id, ENT_QUOTES, 'UTF-8'); ?>">Editar</a></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</div>