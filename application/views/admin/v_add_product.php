    <?php echo form_open_multipart('product_c/validFormAddProduct');?>
    <div class="row">
        <fieldset>
            <legend>Add New Product</legend>

            <label>Name
                <input name="name"  type="text"  size="18" 	value=""  autofocus />
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
                <?= form_error('idCategory');?>
            </label>


            <label>Price
                <input name="price"  type="text"  size="18"  value="<?= set_value('price');?>"/>
                <?= form_error('price');?>  
            </label>

            <label>Quantity
                <input name="quantity"  type="text"  size="18"  value="<?= set_value('quantity');?>"/>
                <?= form_error('quantity');?> 
            </label>

            <label>Picture
                <input name="photo"  type="file"   />
                 <?= form_error('photo');?> 
                <?= $error ; ?> 
            </label>

            <input class="button" type="submit" name="btn_addProduct" value="Create"   />

        </fieldset>
    </div>
</form>