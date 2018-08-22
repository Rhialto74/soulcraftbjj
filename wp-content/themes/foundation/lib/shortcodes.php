<?php

/* * *********************************************************
 * Row [row][/row]
 * ********************************************************* */

function foundation_row($params, $content = null) {
    extract(shortcode_atts(array(
        'class' => ''
    ), $params));
    $result = '<div class="row' . $class . '">';
    //echo '<textarea>'.$content.'</textarea>';
    $content = str_replace("]<br />", ']', $content);
    $content = str_replace("<br />\n[", '[', $content);
    $result .= do_shortcode($content);
    $result .= '</div>';

    return force_balance_tags($result);
}

add_shortcode('row', 'foundation_row');

/* * *********************************************************
 * Columns [column lg="5" md="7" sm="12"]...[column]
 * ********************************************************* */

function foundation_columns($params, $content = null) {
    extract(shortcode_atts(array(
        'lg' => '',
        'md'=>'',
        'sm' => '',
        'centeredlarge' => '',
        'centeredsmall' => '',
        'smoff' => '',
        'lgoff' => '',
        'off'=>''
    ), $params));

    if ($centeredlarge == 'yes') {
        $centeredlarge = 'large-centered';
    } else {
        $centeredlarge = '';
    }
    if ($centeredsmall == 'yes') {
        $centeredsmall = 'small-centered';
    } else {
        $centeredsmall = '';
    }

    $arr = array('medium'=>'md','small'=>'sm');
    $classes = array();
    foreach ($arr as $k => $aa) {
        if (${$aa} == 12 || ${$aa} == '') {
            $classes[] = $k.'-12';
        } else {
            $classes[] = $k.'-' . ${$aa};
        }
    }
    $arr2 = array('smoff', 'lgoff');
    foreach ($arr2 as $aa) {
        $nn = str_replace('off', '', $aa);
        if (${$aa} == 0 || ${$aa} == '') {
            //$classes[] = '';
        } else {
            $classes[] = ($nn=='sm'?'small':'large') . '-offset-' . ${$aa};
        }
    }

    $result = '<div class="large-' . $lg . ' ' . implode(' ', $classes) . ' columns'.$centeredsmall. ''.$centeredlarge.'">';
    $result .= do_shortcode($content);
    $result .= '</div>';

    return force_balance_tags($result);
}

add_shortcode('column', 'foundation_columns');


/* * *********************************************************
 * jQuery UI Accordion 
 * ********************************************************* */
$efs_theme=get_option('EFS_THEME',5);
$_efs_oscitas_accordion = array('current_id'=>0);


function foundation_toggles($params, $content = null) {
    global $_efs_oscitas_accordion,$efs_theme;
    extract(shortcode_atts(array(
        'id' => count($_efs_oscitas_accordion),
        'class' => ''
    ), $params));
    $_efs_oscitas_accordion[$id] = array();
    $_efs_oscitas_accordion['current_id'] = count($_efs_oscitas_accordion)-1;
    do_shortcode($content);
    if($efs_theme==4){
        $scontent = '<div class="section-container accordion '.$class.'" data-section="accordion" id="oscitas-efs-toggle-' . $id .'">';
        if(isset($_efs_oscitas_accordion[$id]['tabs']) && is_array($_efs_oscitas_accordion[$id]['tabs'])){
           $scontent.=implode('', $_efs_oscitas_accordion[$id]['tabs']);
        }
        $scontent.='</div>';


    } else{
        $scontent = '<dl class="accordion '.$class.'" data-accordion id="oscitas-efs-toggle-' . $id .'">';
        if(isset($_efs_oscitas_accordion[$id]['tabs']) && is_array($_efs_oscitas_accordion[$id]['tabs'])){
            $scontent.=implode('', $_efs_oscitas_accordion[$id]['tabs']);
        }
        $scontent.='</dl>';


    }
    if (trim($scontent) != "") {

        $_efs_oscitas_accordion['current_id'] =$_efs_oscitas_accordion['current_id']-1;
        return $scontent;
    } else {
        return "";
    }

}
function foundation_toggle($params, $content = null) {
    global $_efs_oscitas_accordion,$efs_theme;
    extract(shortcode_atts(array(
        'title' => 'title',
        'active' => '',
    ), $params));
    //$con = do_shortcode($content);
    $index = $_efs_oscitas_accordion['current_id'];
    if (!isset($_efs_oscitas_accordion[$index]['tabs'])) {
        $_efs_oscitas_accordion[$index]['tabs'] = array();
    }
    $pane_id =  'efs-tooglepane-' .$index . '-' .  count($_efs_oscitas_accordion[$index]['tabs']);
    if($efs_theme==4){

        $_efs_oscitas_accordion[$index]['tabs'][] ='<section class="' . $active . '">
    <p class="title" data-section-title><a href="#' . $pane_id . '">' . $title. '</a></p>
    <div class="content" data-section-content>
      <p>'. do_shortcode($content) .'</p>
    </div>
  </section>';
            '<section class="' . $active . '"><p class="title" data-section-title><a href="#' . $pane_id . '">' . $title. '</a></p><div class="content" data-section-content><p>'
            . do_shortcode($content) . '</p></div></section>';
    } else{

        $_efs_oscitas_accordion[$index]['tabs'][] = '<dd><a href="#' . $pane_id . '">' . $title
            . '</a><div class="content '. $active .'" id="'.$pane_id.'">'
            . do_shortcode(trim($content)) . '</div></dd>';
    }
}


add_shortcode('accordion', 'foundation_toggles');
add_shortcode('toggle', 'foundation_toggle');

/* * *********************************************************
 * jQuery UI Tabs
 * ********************************************************* */
$efs_theme=get_option('EFS_THEME',5);
$_efs_oscitas_tabs = array('current_id'=>0);

function foundation_tabs($params, $content = null) {
    global $_efs_oscitas_tabs,$efs_theme;
    extract(shortcode_atts(array(
        'id' => count($_efs_oscitas_tabs),
        'class' => ''
    ), $params));
    $_efs_oscitas_tabs[$id] = array();
    $_efs_oscitas_tabs['current_id'] = count($_efs_oscitas_tabs)-1;
   do_shortcode($content);
    if($efs_theme==4){
        $scontent = '<div class="section-container tabs '.$class.'" data-section="tabs" id="oscitas-efs-tabs-' . $id .'">';
        if(isset($_efs_oscitas_tabs[$id]['tabs']) && is_array($_efs_oscitas_tabs[$id]['tabs'])){
            $scontent.=  implode('', $_efs_oscitas_tabs[$id]['tabs']);
        }
        $scontent.='</div>';
    } else{

        $scontent = '<div id="foundation_tabs-' . $id .'" class="'.$class.'">';
        if(isset($_efs_oscitas_tabs[$id]['tabs']) && is_array($_efs_oscitas_tabs[$id]['tabs']) && isset($_efs_oscitas_tabs[$id]['panes']) && is_array($_efs_oscitas_tabs[$id]['panes'])){
            $scontent .='<dl class="tabs" data-tab>';
            $scontent.=  implode('', $_efs_oscitas_tabs[$id]['tabs']);
            $scontent .='</dl>';
            $scontent .='<div class="tabs-content">';
            $scontent.=  implode('', $_efs_oscitas_tabs[$id]['panes']);
            $scontent .='</div>';
        }
        $scontent.='</div>';

    }

    if (trim($scontent) != "") {
        $_efs_oscitas_tabs['current_id'] = $_efs_oscitas_tabs['current_id']-1;
        //echo ($scontent);
        return $scontent;
    } else {
        return "";
    }
}
add_shortcode('tabs', 'foundation_tabs');

function foundation_tab($params, $content = null) {
    extract(shortcode_atts(array(
        'title' => 'title',
        'active' => '',
    ), $params));
    global $_efs_oscitas_tabs,$efs_theme;
    $index = $_efs_oscitas_tabs['current_id'];
    if (!isset($_efs_oscitas_tabs[$index]['tabs'])) {
        $_efs_oscitas_tabs[$index]['tabs'] = array();
    }
    $pane_id =  'efs-tabpane-' .$index . '-' .  count($_efs_oscitas_tabs[$index]['tabs']);
    if($efs_theme==4){
        $_efs_oscitas_tabs[$index]['tabs'][] = '<section class="' . $active . '"><p class="title" data-section-title><a href="#' . $pane_id . '">' . $title. '</a></p><div class="content" id="' . $pane_id . '" data-section-content><p>'. do_shortcode(trim($content)) . '</p></div></section>';
    } else{
        $_efs_oscitas_tabs[$index]['tabs'][] = '<dd class="' . $active . '"><a href="#' . $pane_id . '">' . $title
            . '</a></dd>';
        $_efs_oscitas_tabs[$index]['panes'][] = '<div class="content ' . $active . '" id="'.$pane_id.'"><p>'. do_shortcode(trim($content)) . '</p></div>';
    }
}
add_shortcode('tab', 'foundation_tab');


