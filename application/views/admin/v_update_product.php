<form method="post" action="<?php echo site_url('product_c/validFormUpdateProduct')?>">
    <div class="row">

        <fieldset>
            <legend>Update Product</legend>

            <input name="idProduct"  type="hidden" value="<?php if(isset($idProduct)) echo $idProduct; ?>" />

            <label>Name
                <input name="name"  type="text"  size="18" 	value="<?= set_value('name', $labelProduct);?>"  />
                <?= form_error('name');?>    
            </label>

            <label>Type
                <select name="idCategory">
                    <?php foreach($category  as $key=>$value) : ?>
                        <option value="<?php echo $key; ?>"
                            <?php if(isset($idCategory)  and $idCategory==$key): ?> selected="selected" <?php endif; ?> >
                            <?php echo $value; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('idCategory');?>
            </label>

            <label>Price
                <input name="price"  type="text"  size="18"  value="<?= set_value('price', $priceProduct);?>" />
                <?= form_error('price');?>  
            </label>

            <label>Quantity
                <input name="quantity"  type="text"  size="18"  value="<?= set_value('quantity', $qteProduct);?>" />
                <?= form_error('quantite');?> 
            </label>

            <label>Photo
                <input name="photo"  type="text"  size="18" value="<?= set_value('photo',$photoProduct);?>" />
                <?= form_error('photo');?> 
            </label>

            <input class="button" type="submit" name="btn_updateProduct" value="Update" />

        </fieldset>
    </div>
</form>