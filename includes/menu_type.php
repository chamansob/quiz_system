<?php

use Illuminate\Database\Eloquent\Model;

class Menu_type extends Model
{
  use CommonTrait;
  protected $table = "menu_type";
  public $timestamps = false;
  protected $folder = "menu_type";
 // protected $guarded = [];

  public static function call_cl_fun()
  {
    return (new Menu_type());
  }
  

  public static function show($pname, $action)
  {
    echo '<form name="form" action="deleteall.php" method="post">
            <div class="table-responsive" data-pattern="priority-columns">
            <table id="' . strtolower(self::table()) . 's" class="table table-hover non-hover" style="width:100%">
              <thead>
               <tr>
                  <th><input type="checkbox" name="checkall"/>Id</th>				  
				          <th>Name</th>
                  <th>Status</th>
                  <th>Options </th>
                </tr>
             </thead>
             </table>
             </div>
          </form>';
  }
  public static function form_data()
  {
    echo $fo = Forms::form_start();
    if ($_GET['action'] == 'add') {
      self::action_data('', 'add');
      $name = '';
    } else {
      self::action_data($_GET['id'], 'edit');

      $rw = self::findOrFail($_GET['id']);
      $name = $rw->name;
    }
    echo $fo = Form::input("Name", "name", $name,['class' => 'form-control', 'placeholder' => 'Name', 'required' => "required"]);

    echo $fo = Form::submit("submit", "submit", ['class' => 'btn btn-primary submit-fn mt-2']);
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
      extract($_POST);

      if ($type == 'edit') {

        $data->id = $id;
        $rw = self::findOrFail($id);
        $pp = $data->update();
        $message = '<div align="center"><h4 class="alert alert-success">Success! Record Updated Successfully</h4><span><img src="' . TP_BACK . 'assets/loaders/c_loader_re.gif" title="c_loader_re.gif"></span>

</div>';
        echo output_message($message);
        redirect_by_js($id, 100);
      } else {
        $pp = $data->create();
        $message = '<div align="center"><h4 class="alert alert-success">Success! New Record Added Successfully</h4><span><img src="' . TP_BACK . 'assets/loaders/c_loader_re.gif" title="c_loader_re.gif"></span>

</div>';
        echo output_message($message);
        redirect_by_js('add', 1000);
      }
    }
  }
}
