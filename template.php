<?php
  /**
  * @file
  * The primary PHP file for this theme.
  */
  function main_theme_preprocess_html(&$variables) {
    // drupal_add_css('https://fonts.googleapis.com/css?family=Roboto:300,400,700&subset=latin,cyrillic', array('type' => 'external'));
  }

  // move input outside of label (before it) in webform components
  function main_theme_form_element_label(&$variables) {
    $element = $variables['element'];
    $output = '';
    $output2 = '';
    $title = isset($element['#title']) ? filter_xss_admin($element['#title']) . ' ' : '';
    if ($title && ($required = !empty($element['#required']) ? theme('form_required_marker', array('element' => $element)) : '')) {
      $title .= $required;
    }
    $display = isset($element['#title_display']) ? $element['#title_display'] : 'before';
    $type = !empty($element['#type']) ? $element['#type'] : FALSE;
    $checkbox = $type && $type === 'checkbox';
    $radio = $type && $type === 'radio';
    if (!$checkbox && !$radio && ($display === 'none' || !$title)) {
      return '';
    }
    $attributes = &_bootstrap_get_attributes($element, 'label_attributes');
    $attributes['class'][] = 'control-label';
    if (!empty($element['#id'])) {
      $attributes['for'] = $element['#id'];
    }
    if ($checkbox || $radio) {
      if ($display === 'before') {
        $output .= $title;
      }
      elseif ($display === 'none' || $display === 'invisible') {
        $output .= '<span class="element-invisible">' . $title . '</span>';
      }
      if (!empty($element['#children'])) {
        $output2 .= $element['#children'];
      }
      if ($display === 'after') {
        $output .= $title;
      }
    }
    else {
      if ($display === 'invisible') {
        $attributes['class'][] = 'element-invisible';
      }
      $output .= $title;
    }
    return $output2 . '<label' . drupal_attributes($attributes) . '>' . $output . "</label>\n";
  }
  
  function main_theme_preprocess_page(&$variables) {
    if (arg(0) == 'taxonomy' && arg(1) == 'term' ) {
      $term = taxonomy_term_load(arg(2));
      $vocabulary = taxonomy_vocabulary_load($term->vid);
      $variables['theme_hook_suggestions'][] = 'page__taxonomy_vocabulary_' . $vocabulary->machine_name;
    }

    if (isset($variables['node'])) {
      $suggests = &$variables['theme_hook_suggestions'];
      $args = arg();
      unset($args[0]);
      $type = "page__type_{$variables['node']->type}";
      $suggests = array_merge(
        $suggests,
        array($type),
        theme_get_suggestions($args, $type)
      );
      // Examples:
      // - page--node.tpl.php
      // - page--node--%.tpl.php
      // - page--node--123.tpl.php
      // - page--node--edit.tpl.php
      // - page--type-blog.tpl.php
      // - page--type-blog--%.tpl.php
      // - page--type-blog--123.tpl.php
      // - page--type-blog--edit.tpl.php
    }
    
    // fix for a maintenance page
    global $user;
    if (!in_array('administrator', $user->roles) && variable_get('maintenance_mode') == 1 && arg(0) != 'user') {
      $variables['theme_hook_suggestions'][] = 'maintenance_page';
    }
  }
  // ---
