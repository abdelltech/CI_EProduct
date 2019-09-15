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
                <label>Quantity : <?= $value->qteProduct; ?> </label>
            </div>
            <div>
                <a class="button info" style="border-bottom-left-radius: 15px; border-top-right-radius: 15px;" href="<?php echo base_url();?>index.php/product_c/updateProduct/<?= $value->idProduct?>">Update product</a>
                <a  onClick="return  confirm('Do you want to delete this product ?')" class="button" style="border-bottom-left-radius: 15px; border-top-right-radius: 15px;" href="<?php echo base_url();?>index.php/product_c/DeleteProduct/<?= $value->idProduct?>">Delete product</a>
            </div>

        </div>

    <?php endforeach; ?>
<?php endif; ?>