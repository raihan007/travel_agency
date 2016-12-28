<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div id="Packages" class="container text-center">    
      <h1>Our Packages</h1><br>
      <div class="row">
        <?php 
          foreach ($Allpackages as $package):
             $image = 'Null.png';
            if( !empty($package['Photos'])){
              $image = $package['Photos'][0]; 
            }
        ?>
        <div class="col-sm-4">
          <img src="<?php echo base_url('Public/Photos/Packages/'.$image); ?>" class="img-responsive" style="width:360px; height:240px;" alt="Image">
          <h4><a href="<?= base_url('Packages/Details/'.$package['EntityNo']) ?>"><?= $package['Title'];?></a><br/></h4>
        </div>
        <?php endforeach; ?>
      </div>
    </div>

