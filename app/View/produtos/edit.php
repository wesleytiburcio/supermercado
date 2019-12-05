<div class="container">
    <h1>Produto</h1>
    <h2>Você está na View: app/view/produtos/index.php (tudo nesta tela vem desse arquivo)</h2>
    <!-- form add produto -->
    <div class="box">
        <h3>Adicionar um produto</h3>
        <form action="<?php echo URL; ?>produtos/update" method="POST">
        <div>
            <input type="hidden" name="id" value="<?= $dados->id ?>">

            <label>Nome</label>
            <input type="text" name="nome" value="<?= $dados->nome ?>"  />
            <label>Preço de Custo</label>
            <input type="text" name="precodecusto" value="<?= $dados->precodecusto ?>"  />
            <label>Preço de Venda</label>
            <input type="text" name="precodevenda" value="<?= $dados->precodevenda ?>"  />
        </div>
        <br>
       
        <div>
            
            <label>Categoria</label>
            <select name="idCategoria" >
            <?php $selected = ''; ?>
                <?php foreach($categorias as $value): ?>
                 <?php   
                    if($value->id == $dados->idCategoria) {
                        $selected = 'selected';
                    }
                    ?>
                    <option <?php echo $selected ?> value="<?php echo $value->id ?>"><?php echo $value->nome ?></option>                
                <?php endforeach ?>
            </select>
            
            <label>Fornecedor</label>
            <select name="idFornecedor" >
                <?php $selected = ''; ?>
                <?php foreach($fornecedores as $value): ?>
                    <?php 
                    if($value->id == $dados->idFornecedor) {
                        $selected = 'selected';
                    }
                    ?>
                    <option <?php echo $selected ?> value="<?php echo $value->id ?>"><?php echo $value->nome ?></option>                
                <?php endforeach ?>
            </select>
            
            <label>Mediçao</label>
            <select name="idMedicao" >
                <?php $selected = ''; ?>
                <?php foreach($medicoes as $value): ?>
                    <?php 
                    if($value->id == $dados->idFornecedor) {
                        $selected = 'selected';
                    }
                    ?>
                    <option <?php echo $selected ?> value="<?php echo $value->id ?>"><?php echo $value->sigla ." - " . strtoupper($value->descricao) ?></option>                
                <?php endforeach ?>
            </select>

        </div>
        <br>
            <input type="submit" name="submit_edit_produto" value="Enviar" />
        </form>
    </div>
</div>
