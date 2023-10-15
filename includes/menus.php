<?php

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
	protected $table = "menus";
	public $timestamps = false;
	protected $folder = "menu";
	protected $guarded = [];
	use CommonTrait;

	public static function call_cl_fun()
	{
		return (new Menus());
	}

	public static function show($pname, $action)
	{
		echo '<form name="form" action="deleteall" method="post">
            <table id="' . $pname .
			'" class="table table-hover non-hover  table-responsive" style="width:100%">
              <thead>
               <tr>
                  <th><input type="checkbox" name="checkall"/>Id</th>				  
				  <th>Name</th>                 
                  <th>Image</th>				 
                  <th>Status</th>
				  <th>Created/Updated</th>
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
			$parent_id = '';
			$title = '';
			$url = '';
			$class = '';
			$position = '';
			$group_id = '';
			$status = '';
		} else {
			self::action_data($_GET['id'], 'edit');

			$rw = self::findOrFail($_GET['id']);

			$parent_id = $rw->parent_id;
			$title = $rw->title;
			$url = $rw->url;
			$class = $rw->class;
			$position = $rw->position;
			$group_id = $rw->group_id;
			$status = $rw->status;
			//dd($rw->status);
		}
		echo $fo = Forms::input("Title", "title", $title, 1);
		echo $fo = Forms::input("Url", "url", $url, 1);
		echo $fo = Forms::Select("Type", "class", 'menu_type', $class, 1);
		echo $fo = Forms::Select_menu("Menu Group", 'group_id', 'menu_group', $group_id, 1);
		echo $fo = Forms::Select_status_av("Status", "status", $status);
		echo $fo = Forms::submit();
		echo $fo = Forms::form_end();
	}
	protected static function action_data($id, $type)
	{
		if ($type == 'edit') {
			$data = self::find($id);
		} else {
			$data = self::call_cl_fun();
		}
		if (isset($_REQUEST['submit'])) {
			extract($_POST);

			$data->title = $title;
			$data->url = $url;
			$data->class = $class;

			$data->group_id = $group_id;

			if ($type == 'edit') {

				$data->id = $id;
				$rw = self::findOrFail($id);
				$data->status = ($rw->status == "Active") ? "Deactive" : "Active";

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
	public static function getStatusAttribute($value)
	{
		return ($value == "Active") ? "Active" : "Deactive";
	}
}
