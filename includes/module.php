<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Module extends Model
{
  protected $guarded = [];
  use CommonTrait;
  protected $table = "module";
  public $timestamps = false;
  protected $folder = "module";

  public static function call_cl_fun()
  {
    return (new Module());
  }

  public static function show($pname, $action)
  {
    echo '<form name="form" action="deleteall" method="post">
            <div class="table-responsive" data-pattern="priority-columns">
            <table id="' . strtolower(self::table()) .
      's" class="table table-hover non-hover" style="width:100%">
              <thead>
                 <tr>
                  <th><input type="checkbox" name="checkall"/>Id</th>
				          <th>Name</th>
                  <th>Image</th>
                  <th>Small Text</th>
                  <th>Status</th>
                  <th>Options </th>
                </tr>
              </thead>

         </table>';
    $data = self::call_cl_fun();
    if ($data->count() != 0) {

      echo 'Check All <input type="checkbox" id="checkall" name="checkall"/><br><br>
				<button class="btn btn-danger btn-sm waves-effect waves-light" type="submit" name="submit"><i class="ico fa fa-trash"></i> Delete All</button>
				';
    }
    echo '</div>
          </form>';
  }
  public static function form_data()
  {
    echo $fo = Form::open(['url' => '#', 'class' => 'needs-validation', 'method' => 'post','files'=>true]);
    if ($_GET['action'] == 'add') {
      self::action_data('', 'add');
      $name = '';
      $heading = '';
      $link = '';
      $small_text = '';
      $image = '';
      $impath = '';
      $text = '';
    } else {
      self::action_data($_GET['id'], 'edit');

      $rw = self::findOrFail($_GET['id']);

      $name = $rw->name;
      $heading = $rw->heading;
      $link = $rw->link;
      $small_text = $rw->small_text;
      $image = $rw->image;
      $impath = $rw->path();
      $text = $rw->text;
    }
    echo Form::input("Name",'name', $name, ['class' => 'form-control', 'required'=> "required"]);
    echo Form::input("Heading",'heading', $heading, ['class' => 'form-control', ]);
    echo Form::input("Link",'link', $link, ['class' => 'form-control', ]);
    if ($_GET['action'] == 'add') {
      echo $fo = Form::file("Upload Image","image",['class'=> 'form-control-file']);
    } else {
      echo $fo = Form::file_edit("Upload image", "image", $impath, $image, ['class' => 'form-control-file']);
    }
    echo Form::input('Small Text',"small_text", $small_text, ['class' => 'form-control', ]);
    echo $fo = Form::textarea("Text","text",  $text, ['class' => 'form-control']);
    echo $fo = Form::submit("submit", "submit",['class'=> 'btn btn-primary submit-fn mt-2']);
    echo $fo = Form::close();
  }
  protected static function action_data($id, $type)
  {
    if ($type == "edit") {
      $data = self::find($id);
    } else {
      $data = self::call_cl_fun();
    }
    if (isset($_REQUEST['submit'])) {
      $r = Request::capture();
    
      $data->name = $r->name;
      $data->heading = $r->heading;
      $data->link = $r->link;
      $data->small_text = $r->small_text;
      if ($_FILES['image']['size'] != 0) {      
        $data->image = $data->image_maker($_FILES['image'], 1, $id, 'image');
      } elseif (isset($_POST['tpimg_image'])) {
        $data->image = $_POST['tpimg_image'];
      } else {
        $data->image = '';
      }
     
      $data->text = $r->text;

      if ($type == 'edit') {
        if (isset($_REQUEST['check_image'])) {
          unlink($_SERVER['DOCUMENT_ROOT'] . '/' . MYF . $data->image_path());
          $data->empty_image();
        }
        $data->updated_at = date("Y-m-d H:i:s");

        $pp = $data->save();
        $message = '<div align="center"><h4 class="alert alert-success">Success! Record Updated Successfully</h4><span><img src="' . TP_BACK . 'assets/loaders/c_loader_re.gif" title="c_loader_re.gif"></span>

</div>';
        echo output_message($message);
        redirect_by_js($id, 100);
      } else {

        $data->status = 0;

        $data->created_at = date("Y-m-d H:i:s");

        $data->updated_at = date("Y-m-d H:i:s");
        $pp = $data->save();
        $message = '<div align="center"><h4 class="alert alert-success">Success! New Record Added Successfully</h4><span><img src="' . TP_BACK . 'assets/loaders/c_loader_re.gif" title="c_loader_re.gif"></span>

</div>';
        echo output_message($message);
        redirect_by_js('add', 1000);
      }
    }
  }
}
