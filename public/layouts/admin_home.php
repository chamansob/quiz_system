<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
  <div class="widget widget-one">
    <div class="widget-heading">
      <h6 class="">Welcome Screen</h6>
    </div>
    <?php $template = Template::findOrFail(1); ?>
    <!-- /.dropdown js__dropdown -->

    <br>
    <br>
    <h1 class="text-center">
      <?= $template->sitename ?>
    </h1>
     <?php if(file_exists(BASE_PATH.$template->path().$template->logo))
      {?>
    <center class="animated wow bounceIn">
     
      <img src="<?= BASE_PATH ?><?= $template->path() . $template->logo ?>" class="img-responsive img-thmbnail">
    </center>
    <?php
    }?>
    <br>
  </div>
</div>

<!-- /.row small-spacing -->

<!-- /.row small-spacing -->