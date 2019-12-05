<div class="container">
    <h1>Saidas</h1>
   
    <!-- form edit saida -->
    <div class="box">
        <h3>Adicionar uma saida</h3>
        <form action="<?php echo URL; ?>saidas/update" method="POST">
        <div>
            <input type="hidden" name="id" value="<?= $saidas->id ?>">
            <div>
                <label>Produto</label>
                <select name="idProduto" >
                    <?php foreach($relacaoProdutos as $value): ?>
                        <?php $selected = ''; ?>
                        <?php
                        if ($value->id == $saidas->idProdutos) {
                            $selected = 'selected';
                        } 
                        ?>
                        <option <?php echo $selected ?> value="<?php echo $value->id ?>"><?php echo $value->nome ?></option>                
                    <?php endforeach ?>
                </select>       

                <label>Venda</label>
                <select name="idVenda" >
                    <?php foreach($relacaoVendas as $value): ?>
                        <?php $selected = ''; ?>
                        <?php
                        if ($value->id == $saidas->idVendas) {
                            $selected = 'selected';   
                        }                         
                        ?>
                        <option <?php echo $selected ?> value="<?php echo $value->id ?>"><?php echo $value->total ?></option>                
                    <?php endforeach ?>
                </select>                
            </div>
            <br>            
            <label>Valor de Venda</label>
            <input type="text" name="valorvenda" value="<?php echo $saidas->valorvenda ?>"  />
            <label>Quantidade</label>
            <input type="text" name="quantidade" value="<?php echo $saidas->quantidade ?>"  />
            <label>Data</label>
            <input type="date" name="data" value="<?php echo $saidas->data ?>" />
        </div>
        <br>
        <input type="submit" name="submit_update_saida" value="Enviar" />
        
        </form>
    </div>
</div>