<?php
include("includes/initialize.php");

// $data=$database::select('select * from counter where id = ?', [1]);
// $data=$database::update("update counter set value=? where id=?",[140,1]);
// $data=$database::delete("DELETE FROM counter WHERE id = ?",[1]);
//$data = Services::find(7)->title;
//dd($data);





$menu_items = array(
    array(
        'label' => 'Dashboard',
        'link' => '#dashboard',
        'icon' => 'home',
        'parent_class' => 'list-unstyled menu-categories',
        'parent_id' => 'accordionExample',
        'extra' => '',
        'children' => array(
            array(
                'label' => 'Login Log',
                'link' =>  TP_BACK_SIDE . 'user/log_history',
                'icon' => '',
                'child_class' => 'collapse submenu list-unstyled show',
                'child_id' => 'dashboard',
                'extra' => '',
            ),
            array(
                'label' => 'Backup',
                'link' =>  TP_BACK_SIDE . 'template/backnow_history',
                'icon' => '',
                'child_class' => '',
                'child_id' => '',
                'extra' => '',
            ),

        )
    ),
);

echo generate_menu($menu_items);
?>

<?php
$mes = Menu_type::all();


foreach ($mes as $menuda) {
    if ($menuda->status == "Deactive") {
        echo '<option value="' . $menuda->id . '">' . ucfirst($menuda->name) . '</option>';
    }
}
?>
<select name="class" id="menu-class">
</select>