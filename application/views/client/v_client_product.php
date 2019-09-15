<?php if( $product != NULL): ?>
<?php foreach ($product as $value): ?>

<div class="large-12 columns center"  style=" -webkit-column-break-inside: avoid; border: 1px solid #466d98; border-top-left-radius:10px; border-top-right-radius:10px; margin-top:20px; margin-left: 20px; width: 30%; display:inline-block;">

    <div>
        <strong><label style="font-size: medium; font-weight: 50%; text-align: center;"><?= $value->labelProduct; ?> </label></strong>
    </div>
        
    <div>
        <label><img src="<?php echo base_url();?>assets/images/<?= $value->photoProduct;?>" ></label>
    </div>

    <div>
        <label>Type : <?= $value->labelCategory; ?> </label>
    </div>

    <div>
        <label>Price : <?= $value->priceProduct; ?> </label>
    </div>

    <div>
        <label><a class="button info" style="border-bottom-left-radius: 15px; border-top-right-radius: 15px;" href="<?php echo base_url();?>index.php/client_c/addProduct/<?= $value->idProduct?>">Add to basket</a></label>
    </div>

</div>

<?php endforeach; ?>
<?php endif; ?>