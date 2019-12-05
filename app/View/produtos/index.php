
<div class="container">
    <h1>Produtos</h1>

    <!-- form add produto -->
    <div class="box">
        <h3>Adicionar um produto</h3>
        <form action="<?php echo URL; ?>produtos/add" method="POST">
        <div>
            <label>Nome</label>
            <input type="text" name="nome" value="" required />
            <label>Preço de Custo</label>
            <input type="text" name="precodecusto" value="" required />
            <label>Preço de Venda</label>
            <input type="text" name="precodevenda" value="" required />
        </div>
        <br>
        <div>
        <label>Categoria</label>
            <select name="idCategoria" required>
                <option value="">Selecione a Categoria</option>
                <?php foreach($categorias as $value): ?>
                    <option value="<?php echo $value->id ?>"><?php echo $value->nome ?></option>                
                <?php endforeach ?>
            </select>

            <label>Fornecedor</label>
            <select name="idFornecedor" required>
                <option value="">Selecione o Fornecedor</option>
                <?php foreach($fornecedores as $value): ?>
                    <option value="<?php echo $value->id ?>"><?php echo $value->nome ?></option>                
                <?php endforeach ?>
            </select>

            <label>Mediçao</label>
            <select name="idMedicao" required>
                <option value="">Selecione a Mediçao</option>
                <?php foreach($medicoes as $value): ?>
                    <option value="<?php echo $value->id ?>"><?php echo $value->sigla ." - " . strtoupper($value->descricao) ?></option>                
                <?php endforeach ?>
            </select>

        </div>
        <br>
            <input type="submit" name="submit_add_produto" value="Enviar" />
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
                <td>Preço de Custo</td>
                <td>Preço de Venda</td>
                <td>Categoria</td>
                <td>Fornecedor</td>
                <td>Medição</td>
                <td>Status</td>
                <td>Excluir</td>
                <td>Atualizar</td>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($produtos as $produto) { ?>
                <tr>
                    <td><?php if (isset($produto->id)) echo htmlspecialchars($produto->id, ENT_QUOTES, 'UTF-8'); ?></td>                    
                    <td><?php if (isset($produto->nome)) echo htmlspecialchars($produto->nome, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($produto->precodecusto)) echo htmlspecialchars($produto->precodecusto, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($produto->precodevenda)) echo htmlspecialchars($produto->precodevenda, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($produto->nomeCategoria)) echo htmlspecialchars($produto->nomeCategoria, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($produto->nomeFornecedor)) echo htmlspecialchars($produto->nomeFornecedor, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($produto->descricaoMedicao)) echo htmlspecialchars($produto->descricaoMedicao, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($produto->status)) echo htmlspecialchars($produto->status, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'produtos/delete/' . htmlspecialchars($produto->id, ENT_QUOTES, 'UTF-8'); ?>">Excluir</a></td>
                    <td><a href="<?php echo URL . 'produtos/edit/' . htmlspecialchars($produto->id, ENT_QUOTES, 'UTF-8'); ?>">Editar</a></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</div>