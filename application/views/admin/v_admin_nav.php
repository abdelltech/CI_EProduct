<nav class="top-bar" data-topbar role="navigation">

    <ul class="title-area left">
        <li class="name">
            <h1> <a href="<?php echo base_url();?>index.php/admin_c">Home</a></h1>
        </li>
    </ul>

    <section class="top-bar-section">
        <ul class="left">
            <li class="divider"></li>
           <!-- <li><a href="">View orders</a></li>
            <li class="divider"></li>-->
            <li><a href="<?php echo base_url();?>index.php/product_c/CreateNewProduct">Add Product</a></li>
            <li class="divider"></li>
        </ul>
        
        <ul class="right">
            <li><a>Welcome <b> <?= $this->session->userdata('login') ; ?></b></a></li>
            <li><a  href="<?php echo site_url('users_c/signout');?>">Log out</a></li>
        </ul>
    </section>

</nav>