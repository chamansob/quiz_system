<?php
use Intervention\Image\ImageManager;
trait ImageTrait {
  
    public function image_maker($image, $upload_size, $uid, $imgfield)
    {
  
      $message = '';
      $upload_size = ($upload_size * 1024) * 1024;
  
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
        redirect_by_js('', 1000);
      ?>
  
  <?php
        redirect_by_js('', 100);
        exit();
      }
      if ($uid != '') {
        $user = self::find($uid);
        if ($user->$imgfield != '') {
  
          unlink($_SERVER['DOCUMENT_ROOT'] . "/" . MYF . $user->image_path());
          $user->empty_imgae($uid);
        }
      } else {
        $user = self::call_cl_fun();
      }
      $n = explode('.', $image['name']);
      $imgname = $n[0] . "_" . rand(5, 8522166) . "." . $n[1];
  
      $manager = new ImageManager(array(
        'driver' => 'gd'
      ));
      $image = $manager->make($filename)->save(SITE_ROOT . DS . $user->path() . $imgname);
      return $imgname;
    }
    public function empty_imgae($id = 0)
    {
  
      $s = self::find($id);
      $s->image = '';
      $pp = $s->save();
      if ($pp) {
        return true;
      } else {
        return false;
      }
    }
}

?>