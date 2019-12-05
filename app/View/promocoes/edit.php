
<div class="container">
    <h1>Promoção</h1>
    <h2>Você está na View: app/view/promocoes/index.php (tudo nesta tela vem desse arquivo)</h2>
    <!-- form add produto -->
    <div class="box">
        <h3>Adicionar uma promoção</h3>
        <form action="<?php echo URL; ?>promocoes/update" method="POST">
        <div>
            <input type="hidden" name="id" value="<?= $umaPromocao->id ?>">

            <label>Nome</label>
            <input type="text" name="nome" value="<?= $umaPromocao->nome ?>"  />
            <label>Porcentagem</label>
            <input type="text" name="porcentagem" value="<?= $umaPromocao->porcentagem ?>"  />
            
        </div>
        <br>
       
        <div>            
            <label>Produto</label>
            <select name="idProduto" >
            
                <?php foreach($relacaoProdutos as $value): ?>
                <?php $selected = ''; ?>
                 <?php   
                    if($value->id == $umaPromocao->idProdutos) {
                        $selected = 'selected';
                    }
                    ?>
                    <option <?php echo $selected ?> value="<?php echo $value->id ?>"><?php echo $value->nome ?></option>     
                <?php endforeach ?>
            </select>            
        </div>
        <br>
            <input type="submit" name="submit_edit_promocao" value="Enviar" />
        </form>
    </div>
</div>