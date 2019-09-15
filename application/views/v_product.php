<?php if( $product != NULL): ?>
<br />
<center><h3><?= $title; ?></h3></center>
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

</div>

<?php endforeach; ?>
<?php endif; ?>