<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class Template extends Model
{

	protected $table = "template";
	public $timestamps = false;
	protected $folder = "logo";
	

	public static function call_cl_fun()
	{
		return (new Template());
	}
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
		$x = stylesheet_formate( 'elfinder/css/elfinder.min.css');
		//$x .= script_formate('//cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js');
		$x .= script_formate(TP_BACK . 'elfinder/js/elfinder.min.js');
		echo $x;
	
  }
	 public static function hd_script()
  {
	
  }

	public static function other_script()
	{
		
?>
		<script>
			define('elFinderConfig', {
				// elFinder options (REQUIRED)
				// Documentation for client options:
				// https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
				defaultOpts: {
					url: '<?= TP_BACK ?>elfinder/php/connector.minimal.php', // or connector.maximal.php : connector URL (REQUIRED)
					commandsOptions: {
						edit: {
							extraOptions: {
								// set API key to enable Creative Cloud image editor
								// see https://console.adobe.io/
								creativeCloudApiKey: '',
								// browsing manager URL for CKEditor, TinyMCE
								// uses self location with the empty value
								managerUrl: ''
							}
						},
						quicklook: {
							// to enable CAD-Files and 3D-Models preview with sharecad.org
							sharecadMimes: ['image/vnd.dwg', 'image/vnd.dxf', 'model/vnd.dwf', 'application/vnd.hp-hpgl', 'application/plt', 'application/step', 'model/iges', 'application/vnd.ms-pki.stl', 'application/sat', 'image/cgm', 'application/x-msmetafile'],
							// to enable preview with Google Docs Viewer
							googleDocsMimes: ['application/pdf', 'image/tiff', 'application/vnd.ms-office', 'application/msword', 'application/vnd.ms-word', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/postscript', 'application/rtf'],
							// to enable preview with Microsoft Office Online Viewer
							// these MIME types override "googleDocsMimes"
							officeOnlineMimes: ['application/vnd.ms-office', 'application/msword', 'application/vnd.ms-word', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/vnd.oasis.opendocument.text', 'application/vnd.oasis.opendocument.spreadsheet', 'application/vnd.oasis.opendocument.presentation']
						}
					},
					// bootCalback calls at before elFinder boot up 
					bootCallback: function(fm, extraObj) {
						/* any bind functions etc. */
						fm.bind('init', function() {
							// any your code
						});
						// for example set document.title dynamically.
						var title = document.title;
						fm.bind('open', function() {
							var path = '',
								cwd = fm.cwd();
							if (cwd) {
								path = fm.path(cwd.hash) || null;
							}
							document.title = path ? path + ':' + title : title;
						}).bind('destroy', function() {
							document.title = title;
						});
					}
				},
				managers: {
					// 'DOM Element ID': { /* elFinder options of this DOM Element */ }
					'elfinderder': {}
				}
			});
		</script>


<?php
	}
	// Common Database Methods



	public static function action_data($id)
	{
		$data = self::find($id);
		$logo = '';
		$favicon_logo = '';
		$temp = '';
		$top_bar = '';
		$theme = '';
		$checkbox = '';
		$temps = '';
		$checkboxs = '';
		$tpimg_logo = '';
		$tpimg_favicon_logo = '';
		if (isset($_REQUEST['submit'])) {
			extract($_POST);
			$r = Request::capture();
			$data->sitename = $sitename;
			$data->site_title = $site_title;
			
			if ($_FILES['logo']['size'] != 0) {
				$data->logo = $data->image_maker($_FILES['logo'], 1, $id, "logo");
			} elseif (isset($_POST['tpimg_logo'])) {
				$data->logo = $_POST['tpimg_logo'];
			}
			if ($_FILES['favicon_logo']['size'] != 0) {
				$data->favicon_logo = $data->image_maker($_FILES['favicon_logo'], 1, $id, "favicon_logo");
			} elseif (isset($_POST['tpimg_favicon_logo'])) {
				$data->favicon_logo = $_POST['tpimg_favicon_logo'];
			}
			if ($_FILES['site_map']['size'] != 0) {
				$data->site_map = upload(SITE_ROOT, $_FILES['site_map']);
			}
			if ($_FILES['robots']['size'] != 0) {
				$data->site_map = upload(SITE_ROOT, $_FILES['robots']);
			}

			$data->email = $email;
			$data->top_bar = $top_bar;
			$data->theme = $theme;
			$data->meta_keywords = $meta_keywords;
			$data->meta_description = $meta_description;
			$data->analytics = $analytics;
			$data->canonical = $canonical;
			$data->google_site_verification = $google_site_verification;
			$data->og_title = $og_title;
			$data->og_locale = $og_locale;
			$data->og_type = $og_type;
			$data->og_description = $og_description;
			$data->og_url = $og_url;
			$data->og_site_name = $og_site_name;
			$data->article_modified_time = $article_modified_time;
			$data->og_image = $og_image;
			$data->og_image_alt = $og_image_alt;
			$pp = $data->save();
			$message = '<div align="center">                
                <h4 class="alert alert-success">Success! Record Updated Successfully</h4>
                <span><img src="' . TP_BACK . 'assets/loaders/c_loader_re.gif" title="c_loader_re.gif"></span>
            </div>';

			echo output_message($message);
			redirect_by_js("" . TP_BACK . "admin/dashboard/settings", 100);
		}
	}

	public static function backupsql()
	{
		$data = Template_mo::backnow();
		backup_action('File Name', "{$data}");
		redirect_by_js("backnow_history", 100);
	}
	public static function backnow_history()
	{

		Template_mo::backnow_his();
	}
	public static function backup_history_clear()
	{
		Template_mo::backup_history_clears();
	}

	public static function form_data()
	{
		echo $fo = Forms::form_start();
		self::action_data(1, 'edit');
		$data = self::find(1);
		$impath = $data->path() . $data->logo;
		$impath2 = $data->path() . $data->favicon_logo;
		$site_map =  $data->site_map;
		$robots =  $data->robots;
		$sitename = $data->sitename;
		$site_title = $data->site_title;
		$email = $data->email;
		$top_bar = $data->top_bar;
		$theme = $data->theme;
		$favicon_logo = $data->favicon_logo;
		$logo = $data->logo;
		$meta_keywords = $data->meta_keywords;
		$meta_description = $data->meta_description;
		$analytics = $data->analytics;
		$canonical = $data->canonical;
		$google_site_verification = $data->google_site_verification;
		$og_title = $data->og_title;
		$og_locale = $data->og_locale;
		$og_type = $data->og_type;

		$og_description = $data->og_description;
		$og_url = $data->og_url;
		$og_site_name = $data->og_site_name;
		$article_modified_time = $data->article_modified_time;

		$og_image = $data->og_image;
		$og_image_alt = $data->og_image_alt;
		$options=['Deactive','Active'];
		echo '<h2 class="text-center">Basic Inforamtion</h2>';
		echo $fo = Forms::image_simple_edit("Logo", "logo", $impath, $logo);
		echo $fo = Forms::image_simple_edit("Favicon image", "favicon_logo", $impath2, $favicon_logo);
		echo $fo = Form::input("Email", "email", $email, ['class' => 'form-control', 'placeholder' => 'Email']);
		echo '<hr><h2 class="text-center">Them Inforamtion</h2><hr>';
		echo $fo = Form::Select("Top Bar", "top_bar", $options, $top_bar, ['class' => 'form-control', 'placeholder' => 'Choose One']);
		echo $fo = Form::number("Theme", "theme",$theme, ['class' => 'form-control','max'=>"3", 'placeholder' => 'Theme']);
		echo '<hr><h2 class="text-center">Meta Inforamtion</h2><hr>';
		echo $fo = Form::input("Site Logo Title", "site_title", $site_title, ['class' => 'form-control', 'placeholder' => 'Site Logo Title']);
		echo $fo = Form::input("Site Title", "sitename", $sitename, ['class' => 'form-control', 'placeholder' => 'Site Title']);
		echo $fo = Form::text("Meta Description", "meta_description", $meta_description, ['class' => 'form-control', 'placeholder' => 'Meta Description']);
		echo $fo = Form::text("Meta Keyword", "meta_keywords", $meta_keywords, ['class' => 'form-control', 'placeholder' => 'Meta Keyword']);
		echo $fo = Form::text("Google Analytics", "analytics", $analytics, ['class' => 'form-control', 'placeholder' => 'Google Analytics']);
		echo $fo = Form::text("Canonical", "canonical", $canonical, ['class' => 'form-control', 'placeholder' => 'Canonical']);
		echo $fo = Form::text("Google Webmaster Code", "google_site_verification", $google_site_verification, ['class' => 'form-control', 'placeholder' => 'Google Webmaster Code']);

		echo '<hr><h2 class="text-center">Upload Site Map And Robots</h2><hr>';
		echo $fo = Forms::upload_file("Upload Site map", "site_map", $site_map);
		echo $fo = Forms::upload_file("Robots ", "robots", $robots);
		echo '<hr><h2 class="text-center">Open Graph Inforamtion</h2><hr>';

		echo $fo = Form::input("Og Title", "og_title", $og_title, ['class' => 'form-control', 'placeholder' => 'Og Title']);
		echo $fo = Form::input("Og Locale", "og_locale", $og_locale, ['class' => 'form-control', 'placeholder' => 'Og Locale']);
		echo $fo = Form::input("Og Url", "og_url", $og_url, ['class' => 'form-control', 'placeholder' => 'Og Url']);
		echo $fo = Form::input("Og Type", "og_type", $og_type, ['class' => 'form-control', 'placeholder' => 'Og Type']);
		echo $fo = Form::input("Og Site Name", "og_site_name", $og_site_name, ['class' => 'form-control', 'placeholder' => 'Og Site Name']);
		echo $fo = Form::input("Og Description", "og_description", $og_description, ['class' => 'form-control', 'placeholder' => 'Og Description']);
   
		echo $fo = Form::input("Article Modified Time", "article_modified_time",$article_modified_time, ['class' => 'form-control', 'placeholder' => 'Article Modified Time']);
		echo $fo = Form::input("Og Image", "og_image", $og_image, ['class' => 'form-control', 'placeholder' => 'Og Image']);
		echo $fo = Form::input("Og Image Alt", "og_image_alt", $og_image_alt, ['class' => 'form-control', 'placeholder' => 'Og Image Alt']);
    
		echo $fo = Form::submit("submit", "submit", ['class' => 'btn btn-primary submit-fn mt-2']);
		echo $fo = Form::close();
	}
}

?>