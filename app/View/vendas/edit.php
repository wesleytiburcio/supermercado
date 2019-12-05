<div class="container">
    <h1>Vendas</h1>
    <h2>Você está na View: app/view/vendas/index.php (tudo nesta tela vem desse arquivo)</h2>
    <!-- form add promocao -->
    <div class="box">
        <h3>Editar uma Venda</h3>
        <form action="<?php echo URL; ?>vendas/update" method="POST">
        <div>
            <input type="hidden" name="id" value="<?= $vendas->id ?>">

            <label>Data</label>
            <input type="date" name="data" value="<?php echo $vendas->data; ?>" />
            <label>Data</label>

            <label>Total</label>
            <input type="text" name="total" value="<?php echo $vendas->total ?>"  />
            <label>Valor Pago</label>
            <input type="text" name="valorpago" value="<?php echo $vendas->valorpago ?>"  />
            <label>Troco</label>
            <input type="" name="troco" value="<?php echo $vendas->troco ?>" Readonly  />
            
        </div>
        <br>
        <input type="submit" name="submit_edit_venda" value="Enviar" />
        
        </form>
    </div>
</div>