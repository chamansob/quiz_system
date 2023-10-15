<?php

use Illuminate\Support\Facades\secure_url;
use Illuminate\Support\Facades\Url;

class Form
{
    protected static $wtform = 10;
    protected static $wtlable = 2;
    public static function open($attributes = [])
    {
        $formAttributes = '';
        foreach ($attributes as $key => $value) {
            if ($key === 'files' && $value === true) {
                $formAttributes .= "enctype='multipart/form-data' ";
            } else {
                $formAttributes .= "$key='$value' ";
            }
        }

        return "<form $formAttributes novalidate>";
    }
    public static function label($for, $text, $required)
    {
        if ($required === true) {
            $error = '(<span class="error">*</span>)';
        } else {
            $error = '';
        }
        $ls = 'col-xl-' . self::$wtlable . ' col-sm-4 col-md-' . self::$wtlable . ' col-form-label';

        return "<label for='$text' class='$ls'>" . ucfirst($for) . ":" . $error . "</label>";
    }
    public static function hidden($name, $value = null)
    {
        return "<input type='hidden' name='$name' value='$value'  />";
    }
    public static function input($lable, $name, $value = null, $attributes = [])
    {
        
        $inputAttributes = '';
        if (!in_array('placeholder', $attributes)) {
            $attributes = array_merge($attributes, array('placeholder' => ucfirst($lable)));
        }
        foreach ($attributes as $key => $val) {

            if ($key === 'required') {
                $required = true;
            } else {
                $required = false;
                $inputAttributes .= "$key='$val' ";
            }
        }


        $lss = 'col-xl-' . self::$wtform . ' col-lg-9 col-md-' . self::$wtform;
        $x = '<div class="form-group row mb-4">';
        $x .=  self::label($lable, $name, $required);
        $x .= '<div class="' . $lss . '">';
        $x .= '<input type="text" name="'.$name.'" value="'.$value.'" '.$inputAttributes.' />';
        $x .= '</div></div>';
        return $x;
    }
    public static function email($lable, $name, $value = null, $attributes = [])
    {
        $inputAttributes = '';
        if (!in_array('placeholder', $attributes)) {
            $attributes = array_merge($attributes, array('placeholder' => ucfirst($lable)));
        }
        foreach ($attributes as $key => $val) {

            if ($key === 'required') {
                $required = true;
            } else {
                $required = false;
                $inputAttributes .= "$key='$val' ";
            }
        }


        $lss = 'col-xl-' . self::$wtform . ' col-lg-9 col-md-' . self::$wtform;
        $x = '<div class="form-group row mb-4">';
        $x .=  self::label($lable, $name, $required);
        $x .= '<div class="' . $lss . '">';        
        $x .= '<input type="email" name="' . $name . '" value="' . $value . '" ' . $inputAttributes . ' />';
        $x .= '</div></div>';
        return $x;
    }
    public static function password($lable, $name, $value = null, $attributes = [])
    {
        $inputAttributes = '';
        if (!in_array('placeholder', $attributes)) {
            $attributes = array_merge($attributes, array('placeholder' => ucfirst($lable)));
        }
        foreach ($attributes as $key => $val) {

            if ($key === 'required') {
                $required = true;
            } else {
                $required = false;
                $inputAttributes .= "$key='$val' ";
            }
        }


        $lss = 'col-xl-' . self::$wtform . ' col-lg-9 col-md-' . self::$wtform;
        $x = '<div class="form-group row mb-4">';
        $x .=  self::label($lable, $name, $required);
        $x .= '<div class="' . $lss . '">';
        $x .= '<input type="password" name="' . $name . '" value="' . $value . '" ' . $inputAttributes . ' />';       
        $x .= '</div></div>';
        return $x;
    }
    public static function number($lable, $name, $value = null, $attributes = [])
    {
        $inputAttributes = '';
        if (!in_array('placeholder', $attributes)) {
            $attributes = array_merge($attributes, array('placeholder' => ucfirst($lable)));
        }
        foreach ($attributes as $key => $val) {

            if ($key === 'required') {
                $required = true;
            } else {
                $required = false;
                $inputAttributes .= "$key='$val' ";
            }
        }


        $lss = 'col-xl-' . self::$wtform . ' col-lg-9 col-md-' . self::$wtform;
        $x = '<div class="form-group row mb-4">';
        $x .=  self::label($lable, $name, $required);
        $x .= '<div class="' . $lss . '">';
        $x .= '<input type="number" name="' . $name . '" value="' . $value . '" ' . $inputAttributes . ' />';
        $x .= '</div></div>';
        return $x;
    }

    public static function date($lable, $name, $value = null, $attributes = [])
    {
        // id = "basicFlatpickr"
        // id = "dateTimeFlatpickr"
        // id = "rangeCalendarFlatpickr"
        // id = "timeFlatpickr"
        // id = "dateFlatpickr"
        $inputAttributes = '';
        if (!in_array('placeholder', $attributes)) {
            $attributes = array_merge($attributes, array('placeholder' => ucfirst($lable)));
        }
        foreach ($attributes as $key => $val) {

            if ($key === 'required') {
                $required = true;
            } else {
                $required = false;
                $inputAttributes .= "$key='$val' ";
            }
        }


        $lss = 'col-xl-' . self::$wtform . ' col-lg-9 col-md-' . self::$wtform;
        $x = '<div class="form-group row mb-4">';
        $x .=  self::label($lable, $name, $required);
        $x .= '<div class="' . $lss . '">';
        $x .= '<input type="text" name="' . $name . '" value="' . $value . '" ' . $inputAttributes . ' />';       
        $x .= '</div></div>';
        return $x;
    }
    public static function select($lable, $name, $options, $selected = null, $attributes = [])
    {
        //class ="basic"
        //class ="form-small"
        //class ="disabled-results"
        //class ="js-states form-control"
        $selectAttributes = '';
        if (!in_array('placeholder', $attributes)) {
            $attributes = array_merge($attributes, array('placeholder' => 'Select a option'));
        }
        foreach ($attributes as $key => $value) {
            if ($key === 'required') {
                $required = true;
            } else {
                $required = false;
                $selectAttributes .= "$key='$value' ";
            }
        }
        $lss = 'col-xl-' . self::$wtform . ' col-lg-9 col-md-' . self::$wtform;
        $html = '<div class="form-group row mb-4">';
        $html .=  self::label($lable, $name, $required);
        $html .= '<div class="' . $lss . '">';
        $selectMultiple = isset($attributes['multiple']) && $attributes['multiple'] ? 'multiple' : '';
        
        $html .= "<select name='$name' $selectAttributes >";
        
        foreach ($attributes as $key => $value) {
            if ($key === 'placeholder') {
                $html .= " <option>$value</option>";
            } else {
               
            }
        }
        $i=1;

       
        foreach ($options as $value => $text) {
           
            if ($selectMultiple == '') {
            $selectedAttr = $value == $selected ? 'selected' : '';
            }else {
                $selectedAttr = in_array($value, $selected) ? 'selected' : '';

            }
            $html .= '<option value="'.$value.'" '.$selectedAttr.'> '.ucfirst($text).'</option>';
            $i++;
        }
   

        $html .= "</select>";
        $html .= '</div></div>';
        return $html;
    }
    public static function textarea($lable, $name, $value = null, $attributes = [])
    {
        $inputAttributes = '';
        if (!in_array('placeholder', $attributes)) {
            $attributes = array_merge($attributes, array('placeholder' => ucfirst($lable)));
        }
        foreach ($attributes as $key => $val) {
            if ($key === 'required') {
                $required = true;
            } else {
                $required = false;
                $inputAttributes .= "$key='$val' ";
            }
        }


        $lss = 'col-xl-' . self::$wtform . ' col-lg-9 col-md-' . self::$wtform;
        $x = '<div class="form-group row mb-4">';
        $x .=  self::label($lable, $name, $required);
        $x .= '<div class="' . $lss . '">';
        $x .= '<textarea name="' . $name . '"  ' . $inputAttributes . '>' . $value . '</textarea></div></div>';
        if ($name != '') {
            $x .= "<script>

CKEDITOR.replace('" . $name . "', {    filebrowserBrowseUrl :  '" . TP_BACK . "elfinder/elfinder.php',});
CKEDITOR.replace( '" . $name . "', {
        qtRows: 20, // Count of rows
        qtColumns: 20, // Count of columns
        qtBorder: '1', // Border of inserted table
        qtWidth: '90%', // Width of inserted table
        qtStyle: { 'border-collapse' : 'collapse' },
        qtClass: 'test', // Class of table
        qtCellPadding: '0', // Cell padding table
        qtCellSpacing: '0', // Cell spacing table
        qtPreviewBorder: '4px double black', // preview table border
        qtPreviewSize: '4px', // Preview table cell size
        qtPreviewBackground: '#c8def4' // preview table background (hover)
    });

			CKEDITOR.replace( '" . $name . "', {
				allowedContent:
					'h1 h2 h3 p blockquote strong em;' +
					'a[!href];' +
					'img(left,right)[!src,alt,width,height];' +
					'table tr th td caption;' +
					'span{!font-family};' +
					'span{!color};' +
					'span(!marker);' +
					'del ins'
			} );
			CKEDITOR.replace( '" . $name . "', {
	// Load the simplebox plugin.
	extraPlugins: 'widgetbootstrap'
} );

		</script>";
        }
        return $x;
    }
    public static function text($lable, $name, $value = null, $attributes = [])
    {
        $inputAttributes = '';
        if (!in_array('placeholder', $attributes)) {
            $attributes = array_merge($attributes, array('placeholder' => ucfirst($lable)));
        }
        foreach ($attributes as $key => $val) {
            if ($key === 'required') {
                $required = true;
            } else {
                $required = false;
                $inputAttributes .= "$key='$val' ";
            }
        }


        $lss = 'col-xl-' . self::$wtform . ' col-lg-9 col-md-' . self::$wtform;
        $x = '<div class="form-group row mb-4">';
        $x .=  self::label($lable, $name, $required);
        $x .= '<div class="' . $lss . '">';
        $x .= '<textarea name="' . $name . '"  ' . $inputAttributes . '>' . $value . '</textarea></div></div>';
       
        
        return $x;
    }
    public static function file($lable, $name, $attributes = [])
    {
        $inputAttributes = '';
        foreach ($attributes as $key => $val) {
            if ($key === 'required') {
                $required = true;
            } else {
                $required = false;
                $inputAttributes .= "$key='$val' ";
            }
        }
        $x = ' <div class="form-group row mb-4">';
        $x .=  self::label($lable, $name, $required);
        $x .= '<div class="col-xl-' . self::$wtform . ' col-lg-9 col-md-' . self::$wtform . '"> ';
        $x .= "<input type='file' name='$name' $inputAttributes /></div></div>";

        return $x;
    }
    public static function file_edit($lable, $name, $path, $image, $attributes = [])
    {
        $inputAttributes = '';
        foreach ($attributes as $key => $val) {
            if ($key === 'required') {
                $required = true;
            } else {
                $required = false;
                $inputAttributes .= "$key='$val' ";
            }
        }
        $x = '<div class="form-group row mb-4">
								<label for="exampleInputFile" class="col-xl-' . self::$wtlable . ' col-sm-4 col-md-' . self::$wtlable . ' col-form-label">' . $lable . ':</label>
<div class="col-xl-' . self::$wtform . ' col-lg-9 col-md-' . self::$wtform . '">';
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/" . MYF . $path . $image)) {
            if ($image != '') {
                $x .= '<div style="width:150px">
		<img  src="' . BASE_PATH . $path . webp($image) . '"  class="img-thumbnail img-responsive" /></div>
                  <div><strong>Remove Image:</strong>
                    <input type="checkbox" name="check_' . $name . '" id="checkbox" value="1" />
                  </div>

                  <input type="hidden" name="tpimg_' . $name . '" value="' . $image . '" >';
            }
        } else {
            $x .= '<div> <img class="img-thumbnail" src="' . TP_BACK . 'assets/images/sample.jpg' . '" width="60" height="60" /></div><br>';
        }
        $x .= '
			<div class="col-xl-' . self::$wtform . ' col-lg-9 col-md-' . self::$wtform . '">   
            <input type="file" name="' . $name . '" accept="image/png, image/jpeg, image/gif,imgge/webp"  ' . $inputAttributes . '"></div>

							</div>
                            </div>';
        return $x;
    }
    public static function checkbox($name, $value = 1, $checked = false, $attributes = [])
    {
        $inputAttributes = '';
        foreach ($attributes as $key => $val) {
            $inputAttributes .= "$key='$val' ";
        }

        $checkedAttr = $checked ? 'checked' : '';

        return "<input type='checkbox' name='$name' value='$value' $inputAttributes $checkedAttr />";
    }
    public static function radio($name, $value, $checked = false, $attributes = [])
    {
        $inputAttributes = '';
        foreach ($attributes as $key => $val) {
            $inputAttributes .= "$key='$val' ";
        }

        $checkedAttr = $checked ? 'checked' : '';

        return '<input type="radio" name="'.$name.'" value="'.$value.'" '.$inputAttributes.' '.$checkedAttr.' />';
    }
    public static function submit($value = 'Submit', $name, $attributes = [])
    {
        $buttonAttributes = '';
        foreach ($attributes as $key => $val) {
            $buttonAttributes .= "$key='$val' ";
        }

        $x = '<div class="form-group row">
		<div class="col-xl-' . self::$wtlable . ' col-sm-4 col-md-' . self::$wtlable . '">
		</div>
		<div class="col-xl-' . self::$wtform . ' col-lg-9 col-md-' . self::$wtform . '">
		<button type="submit" name="' . $name . '" ' . $buttonAttributes . '>' . ucfirst($value) . '</button>
		</div>
		</div>';
        return $x;
    }
    public static function close()
    {
        return "</form>";
    }
    ///Extra 
    public static function link_to($url, $title = null, $attributes = [])
    {
        $title = $title ?: $url;

        $attributeString = '';
        foreach ($attributes as $key => $value) {
            $attributeString .= "$key='$value' ";
        }

        return "<a href='" . $url . "' $attributeString>$title</a>";
    }

  
}
