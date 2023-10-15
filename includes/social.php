<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Social extends Model
{
  use CommonTrait;
  protected $table = "social";
  public $timestamps = false;
  protected $folder = "social";
  protected $guarded = [];


  public static function call_cl_fun()
  {
    return (new Social());
  }


  public static function show($pname, $action)
  {
    echo
    '<form name="form" action="deleteall" method="post">
            <div class="table-responsive" data-pattern="priority-columns">
            <table id="' . strtolower(self::table()) .
      's" class="table table-hover non-hover" style="width:100%">
              <thead>
                 <tr>
                  <th><input type="checkbox" name="checkall"/>Id</th>				  
				          <th>Title</th>                 
                  <th>Url</th>		
                  <th>Class</th>	
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
    echo $fo = Forms::form_start();
    if ($_GET['action'] == 'add') {
      self::action_data('', 'add');
      $title = '';

      $url = '';

      $class = '';
    } else {
      self::action_data($_GET['id'], 'edit');

      $rw = self::findOrFail($_GET['id']);

      $title = $rw->title;
      $url = $rw->url;
      $class = $rw->class;
    }
    echo $fo = Form::input("Title", "title", $title, ['class' => 'form-control', 'placeholder' => 'Title', 'required' => "required"]);
    echo $fo = Form::input("Url", "url", $url, ['class' => 'form-control', 'placeholder' => 'Url', 'required' => "required"]);
    echo $fo = Form::input("Class", "class", $class, ['class' => 'form-control', 'placeholder' => 'Class', 'required' => "required"]);

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
      $r = Request::capture();
      $data->title = $r->title;
      $data->url = $r->url;
      $data->class = $r->class;

      if ($type == 'edit') {

        $pp = $data->save();
        $message = '<div align="center"><h4 class="alert alert-success">Success! Record Updated Successfully</h4><span><img src="' . TP_BACK . 'assets/loaders/c_loader_re.gif" title="c_loader_re.gif"></span>

</div>';
        echo output_message($message);
        redirect_by_js($id, 100);
      } else {

        $data->status = "Active";
        $pp = $data->save();
        $message = '<div align="center"><h4 class="alert alert-success">Success! New Record Added Successfully</h4><span><img src="' . TP_BACK . 'assets/loaders/c_loader_re.gif" title="c_loader_re.gif"></span>

</div>';
        echo output_message($message);
        redirect_by_js('add', 1000);
      }
    }
  }
}
