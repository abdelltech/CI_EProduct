<?php $id=$this->session->userdata('id');  ?>
<nav class="top-bar" data-topbar role="navigation">

    <ul class="title-area left">
        <li class="name">
            <h1> <a href="<?php echo base_url();?>index.php/client_c/index">Home</a></h1>
        </li>
    </ul>

    <section class="top-bar-section">
        <ul class="left">
            <li class="divider"></li>
            <li><a href="">View My Basket</a></li>
            <li class="divider"></li>
        </ul>

        
        <ul class="right">
              <li><a>Welcome <b> <?= $this->session->userdata('login') ;  ?></b></a></li>
            <li class="has-dropdown"><a href="#">Acount</a>
                <ul class="dropdown">
                      <li><a class="" href="<?php echo site_url('users_c/updateAccount/'.$id);?>" >Edit My Account</a></li>
                    <li><a href="<?php echo site_url('users_c/signout');?>">Log out</a></li>
                  
                </ul>
            </li>
        </ul>
    </section>

</nav>