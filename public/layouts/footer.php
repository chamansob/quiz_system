 <?php
    //  global $debugbarRenderer;
    //  echo $debugbarRenderer->render();
    ?>
 <?php $temp = Template::find(1); ?>
 <div class="footer-wrapper">
     <div class="footer-section f-section-1">
         <p class=""></p>
     </div>
     <div class="footer-section f-section-2">
         <p class="">Copyright © <?= date('Y') ?> <?= $temp->site_title ?>, All rights reserved.</p>
     </div>
 </div>
 </div>
 <!--  END CONTENT PART  -->

 </div>
 <!-- END MAIN CONTAINER -->

 <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
 <script src="<?= TP_BACK ?>assets/js/libs/jquery-3.1.1.min.js"></script>
 <script src="<?= TP_BACK ?>bootstrap/js/popper.min.js"></script>
 <script src="<?= TP_BACK ?>bootstrap/js/bootstrap.min.js"></script>
 <script src="<?= TP_BACK ?>plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
 <script src="<?= TP_BACK ?>assets/js/app.js"></script>

 <script>
     $(document).ready(function() {
         App.init();

     });
 </script>

 <script src="<?= TP_BACK ?>assets/js/custom.js"></script>
 <!-- END GLOBAL MANDATORY SCRIPTS -->

 <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
 <script src="<?= TP_BACK ?>plugins/apex/apexcharts.min.js"></script>
 <script src="<?= TP_BACK ?>assets/js/dashboard/dash_2.js"></script>

 <script src="<?= TP_BACK ?>assets/js/forms/bootstrap_validation/bs_validation_script.js"></script>

 <script src="<?= TP_BACK ?>assets/js/scrollspyNav.js"></script>
 <script src="<?= TP_BACK ?>plugins/font-icons/feather/feather.min.js"></script>
 <script type="text/javascript">
     feather.replace();
 </script>
 <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
 <?php

    if (isset($_GET['pname'], $_GET['action'])) {
        // echo $_GET['pname'];
        if ($_GET['pname'] == "menus" || $_GET['pname'] == "logfile") {
            Menus::hd_script();
        } else {
            if (class_exists($_GET['pname'])) {
                $_GET['pname']::hd_script();
            } else {
                redirect_to(BASE_PATH . "public" . DS . "admin");
            }
        }
    } else {
        Template::hd_script();
        Template::other_script();
    }

    ?>

 </body>

 </html>