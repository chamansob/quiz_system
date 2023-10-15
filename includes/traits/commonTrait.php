<?php

use Intervention\Image\ImageManager;
use WebPConvert\WebPConvert;
trait CommonTrait
{

  public static function table()
  {
    return with(new static)->getTable();
  }
  public static function tableclass()
  {
    return static::class;
  }
  public function image_path()
  {
    return FULL_PATH . $this->folder . DS . $this->image;
  }

  public  function fpath()
  {
    return FULL_PATH . $this->folder . DS . $this->image;
  }
  public function path()
  {
    return FULL_PATH . $this->folder . DS;
  }
  public function img_path()
  {
    return $this->folder . DS;
  }
  public static function hd_css()
  {
    $x = stylesheet_formate(TP_BACK . 'plugins/table/datatable/datatables.css');
    $x .= stylesheet_formate(TP_BACK . 'plugins/table/datatable/custom_dt_html5.css');
    $x .= stylesheet_formate(TP_BACK . 'plugins/table/datatable/dt-global_style.css');
    $x .= stylesheet_formate(TP_BACK . 'plugins/sweetalerts/promise-polyfill.js');
    $x .= stylesheet_formate(TP_BACK . 'plugins/sweetalerts/sweetalert2.min.css');
    $x .= stylesheet_formate(TP_BACK . 'plugins/sweetalerts/sweetalert.css');
    $x .= stylesheet_formate(TP_BACK . 'assets/css/components/custom-sweetalert.css');
    $x .= stylesheet_formate(TP_BACK . 'assets/css/forms/theme-checkbox-radio.css');
   // $x .= stylesheet_formate(TP_BACK . 'assets/styles/jquery-ui.css');
   // $x .= stylesheet_formate(TP_BACK . 'elfinder/css/elfinder.min.css');
    $x .= stylesheet_formate(TP_BACK . 'elfinder/css/theme.css');
    $x .= stylesheet_formate(TP_BACK . 'plugins/table/datatable/custom_dt_miscellaneous.css');
    $x .= stylesheet_formate(TP_BACK . 'plugins/select2/select2.min.css');
    //  $x .= stylesheet_formate(TP_BACK . 'plugins/flatpickr/flatpickr.css');
    //  $x .= stylesheet_formate(TP_BACK . 'plugins/flatpickr/custom-flatpickr.css');

    echo $x;
  }
  public static function hd_script()
  {
    // $x = script_formate('https://cdnjs.cloudflare.com/ajax/libs/speakingurl/14.0.1/speakingurl.min.js');
    //$x .=  script_formate(TP_BACK . 'plugins/slugify/jquery.stringtoslug.min.js');
    $x =  script_formate(TP_BACK . 'plugins/table/datatable/datatables.js');
    // $x .= script_formate(TP_BACK . 'plugins/flatpickr/flatpickr.js');
    // $x .= script_formate(TP_BACK . 'plugins/flatpickr/custom-flatpickr.js');
    $x .= script_formate(TP_BACK . 'plugins/table/datatable/button-ext/dataTables.buttons.min.js');
    $x .= script_formate(TP_BACK . 'plugins/table/datatable/button-ext/jszip.min.js');
    $x .= script_formate(TP_BACK . 'plugins/table/datatable/button-ext/buttons.html5.min.js');
    $x .= script_formate(TP_BACK . 'plugins/table/datatable/button-ext/buttons.print.min.js');
    $x .= script_formate(TP_BACK . 'plugins/table/datatable/custom_miscellaneous.js');
    $x .= script_formate(TP_BACK . 'plugins/sweetalerts/sweetalert2.min.js');
    $x .= script_formate(TP_BACK . 'plugins/sweetalerts/custom-sweetalert.js');
  //  $x .= script_formate(TP_BACK . 'elfinder/js/elfinder.min.js');
    $x .= script_formate(TP_BACK . 'plugins/select2/select2.min.js');
    $x .= script_formate(TP_BACK . 'plugins/select2/custom-select2.js');

    $x .= self::extra_script();
    echo $x;
  }
  public static function extra_script()
  {
    $table = strtolower(self::tableclass());
?>
    <script type="text/javascript">
      function archiveFunction(id) {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        const swalWithBootstrapButtons = swal.mixin({
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger mr-3',
          buttonsStyling: false,
        })

        swalWithBootstrapButtons({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          reverseButtons: true,
          padding: '2em'
        }).then(function(result) {
          if (result.value) {

            swalWithBootstrapButtons(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
            setTimeout(function() {

              $.post("<?= TP_BACK ?>resources<?= DS ?>ajax_delete.php", {
                id: id,
                table: '<?= strtolower($table) ?>'
              }, function(data) {
                window.location = '';
              });

            }, 1000);

          } else if (
            // Read more about handling dismissals
            result.dismiss === swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons(
              'Cancelled',
              'Your Record is safe :)',
              'error'
            )
          }
        })

      }
    </script>

    <script type="text/javascript" language="javascript">
      $(document).ready(function() {
        $("#checkall").click(function() {
          // $('#service_title').slugify('#service_slug');

          $('input:checkbox').not(this).prop('checked', this.checked);
        });
        
        var dataTable = $('#<?= $table ?>s').DataTable({
          "processing": true,
          "order": [
            [0, "desc"]
          ],
          "serverSide": true,
          "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'l  B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
          buttons: {
            buttons: [{
                extend: 'copy',
                className: 'btn btn-sm'
              },
              {
                extend: 'csv',
                className: 'btn btn-sm'
              },
              {
                extend: 'excel',
                className: 'btn btn-sm'
              },
              {
                extend: 'print',
                className: 'btn btn-sm'
              }
            ]
          },
          "oLanguage": {
            "oPaginate": {
              "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
              "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
          },

          "lengthMenu": [
            [10, 25, 50, 100, 1000, 2000, 3000, 10000, -1],
            [10, 25, 50, 100, 1000, 2000, 3000, 10000]
          ],
          "pageLength": 10,
          drawCallback: function() {
            $('.bs-tooltip').tooltip();
            $('.dataTables_paginate > .pagination').addClass(' pagination-style-13 pagination-bordered');
          },
          "ajax": {
            url: "<?= TP_BACK ?>resources/ajax_<?= $table ?>.php", // json datasource
            type: "post", // method  , by default get
            data: {
              action: '<?= $table ?>', // etc..
            },
            error: function() { // error handling
              $(".employee-grid-error").html("");
              $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#employee-grid_processing").css("display", "none");
            }
          }
        });
      });
    </script>
    <?php
  }
  public static function deleteall()
  {

    $pp = self::whereIn('id', $_POST['checkbox'])->delete();
    if ($pp) {
      $message = '<div align="center"><h4 class="alert alert-warning">Record Deleted Successfully</h4><span><img src="' . TP_BACK . 'assets/loaders/c_loader_re.gif" title="c_loader_re.gif"></span></div>';
      echo output_message($message);
      redirect_by_js('show', 100);
    } else {
      $message = '<div align="center"><h4 class="alert alert-danger">Record Not Deleted</h4><span><img src="' . TP_BACK . 'assets/loaders/c_loader_re.gif" title="c_loader_re.gif"></span></div>';
      echo output_message($message);
      redirect_by_js('show', 100);
    }
  }
  public static function image_maker($image, $upload_size, $uid, $imgfield)
  {

    $message = '';
    $upload_size = ($upload_size * 1024) * 2048;
    $size = round($image['size']);
    $n = explode(".", $image['name']);
    $filename = $image["tmp_name"];
    $type = $n[1];
    if ($size > $upload_size) {

      $message = '<div align="center">                
                <h4 class="alert alert-danger">Image Size is Larger Than 1MB ' . $size . 'Kb</h4>                
            </div>';
      echo output_message($message);
      redirect_by_js('', 1000);
      exit();
    }
    if ($type != 'jpg' && $type != 'jpeg' && $type != 'png') {
      toast_msg("Error", "", "Image type is not jpg or png -" . $type . "", 1000);
      $message = '<div align="center">                
                <h4 class="alert alert-danger">Image type is not jpg or png - ' . $type . '</h4>                
            </div>';
      echo output_message($message);
      //  redirect_by_js('', 1000);
    ?>

<?php
      redirect_by_js('', 100);
      exit();
    }
    $dataCall = self::call_cl_fun();
    if ($uid != '') {
      $data = self::find($uid);

      if ($data->$imgfield != '') {
        $n = explode(".", $data->$imgfield);
         if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/" . MYF . $data->path() . $n[0] . ".webp")) {
          unlink($_SERVER['DOCUMENT_ROOT'] . "/" . MYF . $data->path() . $n[0] . ".webp");
        }
        unlink($_SERVER['DOCUMENT_ROOT'] . "/" . MYF . $data->path() . $data->$imgfield);
        $data->empty_imgae($uid, $imgfield);
      }
    }
    $n = explode('.', $image['name']);
    $imgname = $n[0] . "_" . rand(5, 8522166) . "." . $n[1];  
    $manager = new ImageManager(array(
      'driver' => 'gd'
    ));
    $image = $manager->make($filename)->save(SITE_ROOT . DS . $dataCall->path() . $imgname);
    $source = SITE_ROOT . DS . $dataCall->path() . $imgname;
    $ns = explode('.', $imgname);
    $destination = SITE_ROOT . DS . $dataCall->path() . $ns[0] . '.webp';
    $options = [];
    WebPConvert::convert($source, $destination, $options);
    $image = $manager->make($filename)->save($source);
    
    // $image = $manager->make($filename)->resize(null, 200, function ($constraint) {
    //   $constraint->aspectRatio();
    // })
    //   ->save(SITE_ROOT . DS . $user->path() . $imgname);
    return $imgname;
  }
  public function empty_imgae($id, $imgfield)
  {

    $s = self::find($id);
    $s->$imgfield = '';
    $pp = $s->save();
    if ($pp) {
      return true;
    } else {
      return false;
    }
  }
  public static function delete_data()
  {
    extract($_POST);
    $x = self::find($delete_id);
    if ($x != '') {
      if($x->image!='')
      {
        $n=explode(".", $x->image);
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/" . MYF . $x->path() .$n[0].".webp")) {
          unlink($_SERVER['DOCUMENT_ROOT'] . "/" . MYF . $x->path(). $n[0] . ".webp");
       
        }
      if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/" . MYF . $x->path() . $x->image)) {
        unlink($_SERVER['DOCUMENT_ROOT'] . "/" . MYF . $x->path() . $x->image);
        $data->empty_imgae($delete_id, 'image');
      }
    }
      $pp = $x->delete();
      if ($pp) {
        $message = '<div align="center"><h4 class="alert alert-warning">Record Deleted Successfully</h4><span><img src="' . TP_BACK . 'assets/loaders/c_loader_re.gif" title="c_loader_re.gif"></span></div>';
        echo output_message($message);
        redirect_by_js('show', 100);
      } else {
        $message = '<div align="center"><h4 class="alert alert-danger">Record Not Deleted</h4><span><img src="' . TP_BACK . 'assets/loaders/c_loader_re.gif" title="c_loader_re.gif"></span></div>';
        echo output_message($message);
        redirect_by_js('show', 100);
      }
    } else {
      $message = '<div align="center"><h4 class="alert alert-danger">Record Not Found</h4><span><img src="' . TP_BACK . 'assets/loaders/c_loader_re.gif" title="c_loader_re.gif"></span></div>';
      echo output_message($message);
      redirect_by_js('show', 100);
    }
  }
  public static function getStatusAttribute($value)
  {
    return ($value == 0) ? "Active" : "Deactive";
  }
  public static function status()
  {
    $id = $_GET['id'];
    $data = self::find($id);
    // dd($data);
    $value = ($data->status == "Active") ? 1 : 0;
    // $data->updated_at = date("Y-m-d H:i:s");
    $data->status = $value;
    $pp = $data->update();

    if ($pp) {
      $message = '<div align="center"><h4 class="alert alert-success">Status changed successfully</h4><span><img src="' . TP_BACK . 'assets/loaders/c_loader_re.gif" title="c_loader_re.gif"></span></div>';
      echo output_message($message);
      redirect_by_js('../show', 100);
    } else {
      $message = '<div align="center"><h4 class="alert alert-danger">Status not changed</h4><span><img src="' . TP_BACK . 'assets/loaders/c_loader_re.gif" title="c_loader_re.gif"></span></div>';
      echo output_message($message);
      redirect_by_js('../show', 100);
    }
  }
}
