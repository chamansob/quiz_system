<?php
// If it's going to need the database, then it's
// probably smart to require it before we start.

use Illuminate\Database\Eloquent\Model;
use Illuminate\Hashing\BcryptHasher;

class Users extends Model
{

    protected $table = "users";
    public $timestamps = true;
    protected $folder = "users";
    use CommonTrait;

    public static function call_cl_fun()
    {
        return (new Users());
    }

    public static function authenticate($username = "", $password = "")
    {
        global $database;

        $cs = self::where("username", '=', $username)->count();
        if ($cs == 1) {
            $xx = self::where('username', '=', $username)->first();
        } else {
            $msg = 'Username Not Matched';
            return $msg;
            exit();
        }
        $np = $xx->password;
        $xp = new BcryptHasher();
        if ($xp->check($password, $np, ['rounds' => 4])) {
            $password = $xx->password;
        } else {
            $msg = 'Password Not Matched';
            return $msg;
            exit();
        }

        $result_array = $xx;

        return !empty($result_array) ? ($result_array) : false;
    }

    // replaced with a custom save()
    // public function save() {
    //   // A new record won't have an id yet.
    //   return isset($this->id) ? $this->update() : $this->create();
    // }

    protected static function action_data($id, $type)
    {
        if ($type == 'edit') {

            $data = self::find($id);
        } else {

            $data = self::call_cl_fun();
        }

        $image_name = '';
        $temp = '';
        $checkbox = '';
        if (isset($_REQUEST['submit'])) {
            extract($_POST);
            //print_r($_POST);
            //exit();
            $data->username = $username;
            $data->full_name = $name;
            $data->email = $email;

            if ($_FILES['avatar']['size'] != 0) {
                $data->avatar = $data->image_maker($_FILES['avatar'], 1, $id, "avatar");
            } elseif (isset($_POST['tpimg_image'])) {
                $data->avatar = $_POST['tpimg_image'];
            }

            if ($type == 'edit') {

                if (isset($_POST['check_avatar'])) {
                    $datas = self::find($id);

                    unlink($_SERVER['DOCUMENT_ROOT'] . "/" . MYF . $datas->image_path());
                    $datas->empty_imgae($id);
                }
                if ($password != '') {
                    $xp = new BcryptHasher();
                    $data->password = $xp->make($password, ['rounds' => 4]);
                    $data->spass = $password;
                } else {
                    $us = self::find($id);
                    $data->password = $us->password;
                    $data->spass = $password;
                }

                $pp = $data->save();
                $message = '<div align="center"><h4 class="alert alert-success">Success! Record Updated Successfully</h4><span><img src="' . TP_BACK . 'assets/loaders/c_loader_re.gif" title="c_loader_re.gif"></span>

</div>';
                echo output_message($message);
                redirect_by_js($id, 100);
            } else {

                $xp = new BcryptHasher();
                $data->password = $xp->make($password, ['rounds' => 4]);
                $pp = $data->save();
                $message = '<div align="center"><h4 class="alert alert-success">Success! New Record Added Successfully</h4><span><img src="' . TP_BACK . 'assets/loaders/c_loader_re.gif" title="c_loader_re.gif"></span>

</div>';
                echo output_message($message);
                redirect_by_js("add", 1000);
            }
        }
    }

    public static function form_data()
    {
        echo $fo = Forms::form_start();

        if ($_GET['action'] == 'add') {
            self::action_data('', 'add');
            $username = '';
            $password = '';
            $name = '';
            $email = '';
            $phone = '';
            $impath = '';
            $image = '';
        } else {

            self::action_data($_GET['id'], 'edit');
            $rw = self::find($_GET['id']);
            $username = $rw->username;
            $name = $rw->full_name;
            $email = $rw->email;
            $phone = $rw->phone;
            $impath = $rw->path() . $rw->avatar;
            $image = $rw->avatar;
            $password = '';
            //print_r($role);

        }

        if ($image == '') {
            echo $fo = Forms::img("Avatar", "avatar", $impath, $image);
        } else {
            echo $fo = Forms::image_simple_edit("Avatar", "avatar", $impath, $image);
        }
        echo $fo = Form::input("Username", "username", $username, ['class' => 'form-control', 'placeholder' =>'Username', 'required' => "required"]);
        echo $fo = Forms::password("Password", "password", $password, ['class' => 'form-control', 'placeholder' =>'Password', 'required' => "required"]);
        echo $fo = Form::input("Full Name", "name", $name, ['class' => 'form-control', 'placeholder' => 'Full Name']);
        echo $fo = Form::email("Email", "email", $email, ['class' => 'form-control', 'placeholder' => 'Email']);
        echo $fo = Form::input("Phone", "phone", $phone, ['class' => 'form-control', 'placeholder' => 'Phone']);
        echo $fo = Form::submit("submit", "submit", ['class' => 'btn btn-primary submit-fn mt-2']);
        echo $fo = Form::close();
    }

    public static function show($pname, $action)
    {

        echo '<form name="form" action="deleteall.php" method="post">
            <div class="table-responsive" data-pattern="priority-columns">
            <table id="' . strtolower(self::tableclass()) . 's"  class="table table-hover non-hover" style="width:100%">

              <thead>
               <tr>
                  <th><input type="checkbox" name="checkall"/>Id</th>
				  <th>Username/Password</th>
                  <th>Email</th>
                  <th>Image</th>
				  <th>Created/Updated</th>
                  <th>Options </th>
                </tr>
              </thead>

            </table></div>
          </form>';
    }
    public static function log_history()
    {
        $dps = '';
        $link = '';
        $maction = 'clear';
        $logfile = SITE_ROOT . DS . 'logs' . DS . 'log.txt';

?>

        <div class="widget widget-activity-five">
            <div class="widget-heading">
                <h5 class="">Activity Log</h5>

                <div class="task-action">
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal">
                                <circle cx="12" cy="12" r="1"></circle>
                                <circle cx="19" cy="12" r="1"></circle>
                                <circle cx="5" cy="12" r="1"></circle>
                            </svg>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                            <a class="dropdown-item" href="<?= TP_BACK_SIDE ?>user/log_history_clear">Clear History</a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="widget-content">

                <div class="w-shadow-top"></div>

                <div class="mt-container mx-auto">
                    <div class="timeline-line">


                        <?php
                        if (file_exists($logfile) && is_readable($logfile) && $handle = fopen($logfile, 'r')) { // read
                            echo "<ul class=\"log-entries\">";
                            while (!feof($handle)) {
                                $entry = fgets($handle);
                                if (trim($entry) != "") {
                                    echo '
                                    <div class="item-timeline timeline-new">
                            <div class="t-dot">
                                <div class="t-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg></div>
                            </div>
                            <div class="t-content">
                                <div class="t-uppercontent">
                                    <h5>'. $entry.'</h5>
                                </div>
                               
                            </div>
                        </div>
                                    ';
                                }
                            }
                            echo "</ul>";
                            fclose($handle);
                        } else {
                            echo "Could not read from {$logfile}.";
                        }

                        ?>

                        


                    </div>
                </div>

                <div class="w-shadow-bottom"></div>
            </div>

        </div>

<?php
    }
    public static function log_history_clear()
    {
        $logfile = SITE_ROOT . DS . 'logs' . DS . 'log.txt';
        file_put_contents($logfile, '');
        // Add the first log entry
        log_action('Logs Cleared', "by User ID : {$_SESSION['user_id']}");
        // redirect to this same page so that the URL won't
        // have "clear=true" anymore
        $message = '<div align="center"><h4 class="alert alert-success">Success! Clear the history</h4><span><img src="' . TP_BACK . 'assets/loaders/c_loader_re.gif" title="c_loader_re.gif"></span>

</div>';
        echo output_message($message);
        redirect_by_js("log_history", 1000);
    }
    public function deleteall()
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
}

?>