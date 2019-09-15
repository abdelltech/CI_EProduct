<form method="post" action="">
<center><h3><?= $title; ?></h3></center>
  <div class="row">
    <div class="small-12 columns" style="border: solid #393939 2px; margin: 20px; border-radius: 25px;">
      <div class="row">

        <div class="small-3 columns" style="border-right: solid #393939 1px;">
            <label for="right-label" class="right inline" ><img title="Avocat"  alt="Avocat" style=" width: 600px;" src="<?php echo base_url();?>assets/images/<?= set_value('photo',$photoProduct);?>" ></label>
        </div>

        <div class="small-2 columns" style="border-right: solid #393939 1px; top: 70px;">
          <label for="right-label" class="right inline">Name : <?= set_value('nom',$labelProduct);?></label>
        </div>

        <div class="small-2 columns" style="border-right: solid #393939 1px; top: 70px;">
          <label for="right-label" class="right inline">

              Type : <?php foreach($category  as $key=>$value) : ?> <?php if(isset($idCategory)  and $idCategory==$key): ?>
                  <?php echo $value; ?>
              <?php endif ?>
              <?php endforeach ?>
          </label>
        </div>

        <div class="small-2 columns" style="border-right: solid #393939 1px; top: 70px;">
          <label for="right-label" class="right inline">Price : <?= set_value('price',$priceProduct);?></label>
        </div>

        <div class="small-3 columns" style="top: 70px;">
          <div class="row collapse postfix-round">
            <div class="small-9 columns">
              <input type="number" placeholder="Number of products" autofocus>
            </div>
            <div class="small-3 columns">
              <input type="submit" class="button info postfix" value="Create">
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  
</form>