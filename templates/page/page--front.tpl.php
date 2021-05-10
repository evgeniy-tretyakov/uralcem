<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */

$averageChains      =  110.136;
$averageNonstandart =  45.981;
$allNonstandart     = calcProd('2000-01-01', $averageNonstandart);
$allChains          = calcProd('1993-01-01', $averageChains);
$allCandN           = $allChains + $allNonstandart;
?>


<!-- Шапка -->
<header class="header">
  <div class="container">
    <div class="col-xs-1 header--logo">
        <?php if ($logo): ?>
          <a class="logo navbar-btn" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
            <img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" />
          </a>
        <?php endif; ?>
    </div>
    <div class="col-xs-2 header--phones">
        <?php if ($is_admin): ?><!-- BLOCK::Телефоны шапка (главная) --><?php endif ?>
        <?php
          $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 1))));
          print drupal_render($block);
        ?>
    </div>
    <div class="col-xs-1 header--social_links">
        <?php if ($is_admin): ?><!-- BLOCK::Социальные ссылки (главная) --><?php endif ?>
        <?php
          $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 2))));
          print drupal_render($block);
        ?>
    </div>
    <div class="col-xs-8 header--header_menu">

          <div class="header--navigation-button" >
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
          </div>
        </div>

          <div class="navbar-collapse col-sm-7 collapse header--navigation header--navigation_desctop">
            <nav role="navigation">
              <?php
                 $block = _block_get_renderable_array(_block_render_blocks(array(block_load('system', 'main-menu'))));
                 // unset($block['system_main-menu']['#theme_wrappers']);
                 print drupal_render($block);
               ?>
            </nav>
          </div>
    </div>
  </div>
</header>



<!-- Слайдер -->
<section class="highlighted">
  <div class="container">
    <div class="col-xs-7 highlighted--left">
      <div class="row highlighted--left_content">
        <?php if ($is_admin): ?><!-- BLOCK::Контент слайдера (главная) --><?php endif ?>
        <?php
          $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 13))));
          print drupal_render($block);
        ?>
      </div>
      <div class="row highlighted--left_button">
        <?php if ($is_admin): ?><!-- BLOCK::Кнопка слайдера (главная) --><?php endif ?>
        <?php
          $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 14))));
          print drupal_render($block);
        ?>
      </div>
    </div>
    <div class="col-xs-5 highlighted--right">
      <?php if ($is_admin): ?><!-- BLOCK::Список слайдера (главная) --><?php endif ?>
      <?php
        $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 15))));
        print drupal_render($block);
      ?>
    </div>
  </div>

  <div class="highlighted--bg_slider">
    <!-- hightlighted slider -->
    <?php if ($is_admin): ?><!-- VIEW::Представление: Слайды: Block --><?php endif ?>
    <?php
      $block = module_invoke('views', 'block_view', 'bg_slides_in_header-slider_block');
      print render ($block['content']);
    ?>
  </div>
</section>



<!-- Услуги -->
<main role="main" class="container services" id="services">
    <!-- view services -->
    <?php if (!empty($title)): ?>
      <h1 class="page-header"><?php print $title; ?></h1>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php print $messages; ?>
    <?php if (!empty($tabs)): ?>
      <?php print render($tabs); ?>
    <?php endif; ?>
    <?php if (!empty($page['help'])): ?>
      <?php print render($page['help']); ?>
    <?php endif; ?>
    <?php if (!empty($action_links)): ?>
      <ul class="action-links"><?php print render($action_links); ?></ul>
    <?php endif; ?>
    <?php print render($page['content']); ?>
</main>



<!-- Компетенции -->
<div class="clearfix"></div>
<section class="competence" id="competence">
    <div class="container">
      <?php if ($is_admin): ?><!-- VIEW::Представление: Слайды: Block --><?php endif ?>
      <?php
        $block = module_invoke('views', 'block_view', 'competence-slider_block');
        echo "<h2>" . $block['subject'] . "</h2>";
        print render ($block['content']);
      ?>
    </div>
</section>



<!-- Нам доверяют лучшие -->
<section class="trust_us" id="partners">
  <div class="container">
    <div class="row">
      <div class="col-xs-6 trust_us--title">
        <?php if ($is_admin): ?><!-- BLOCK::Нам доверяют лучшие -- заголовок (главная) --><?php endif ?>
        <?php
          $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 17))));
          print drupal_render($block);
        ?>
      </div>
      <div class="col-xs-6 trust_us--header">
        <?php if ($is_admin): ?><!-- BLOCK::Нам доверяют лучшие -- текс шапки (главная) --><?php endif ?>
        <?php
          $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 18))));
          print drupal_render($block);
        ?>
      </div>
    </div>
    <div class="row trust_us--content">
      <?php if ($is_admin): ?><!-- VIEW::Представление: Нам доверяют лучшие: Block --><?php endif ?>
      <?php
        $block = module_invoke('views', 'block_view', 'trust_us-block');
        print render ($block['content']);
      ?>
    </div>
  </div>
</section>



<!-- Технология ЛГМ LOST FOAM (белая технология) -->
<section class="lgm_technology" id="lgm_technology">
  <div class="container">
    <?php if ($is_admin): ?><!-- BLOCK::Технология ЛГМ (главная) --><?php endif ?>
    <?php
      $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 3))));
      print drupal_render($block);
    ?>
  </div>
  <div class="container-fluid lgm_technology--addition">
    <?php if ($is_admin): ?><!-- BLOCK::Технология ЛГМ -- дополнительно (главная) --><?php endif ?>
    <?php
      $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 32))));
      print drupal_render($block);
    ?>
  </div>
</section>



<!-- Технологический процесс производства -->
<section class="tech_proc">
    <div class="container">
      <div class="row tech_proc--title">
        <?php if ($is_admin): ?><!-- BLOCK::Технологический процесс -- заголовок (главная) --><?php endif ?>
        <?php
          $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 19))));
          print drupal_render($block);
        ?>
      </div>
      <div class="row tech_proc--content">
      <?php if ($is_admin): ?><!-- VIEW::Представление: Технологический процесс производства: Block --><?php endif ?>
      <?php
        $block = module_invoke('views', 'block_view', 'teh_proc-block');
        print render ($block['content']);
      ?>
      </div>
      <div class="row tech_proc--footer">
        <div class="col-xs-9">
          
          <?php if ($is_admin): ?><!-- BLOCK::Технологический процесс -- подвал (главная) --><?php endif ?>
          <?php
            $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 20))));
            print drupal_render($block);
          ?>
        </div>
        <div class="col-xs-3">
          <?php if ($is_admin): ?><!-- BLOCK::Технологический процесс -- кнопка (главная) --><?php endif ?>
          <?php
            $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 21))));
            print drupal_render($block);
          ?>
        </div>
      </div>
    </div>
</section>



<!-- Документация -->
<section class="documentation" id="documents">
  <div class="container">
    <?php
      $block_block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 22))));
      $block = module_invoke('views', 'block_view', 'documentation-block');
    ?>

    <div class="row">
      <div class="col-xs-5 documentation--title">
        <?php if ($is_admin): ?><!-- VIEW::Представление: Документация: Block (subject) --><?php endif ?>
        <?php echo "<h2>" . $block['subject'] . "</h2>" ?>
      </div>
      <div class="col-xs-7 documentation--header">
        <?php if ($is_admin): ?><!-- BLOCK::Документация шапка (главная) --><?php endif ?>
        <?php print drupal_render($block_block); ?>
      </div>
    </div>
    <div class="row documentation--content">
      <?php if ($is_admin): ?><!-- VIEW::Представление: Документация: Block --><?php endif ?>
      <?php print render ($block['content']) ?>
    </div>
  </div>
</section>



<!-- Цифры - среднее -->
<section class="numbers">
    <div class="container">
      <!-- left -->
      <div class="col-xs-6 numbers--left">
        <div class="row numbers--left_1">
          <div class="numbers--header"><strong><span data-num='<?php echo number_format($allCandN, 2, ",", " "); ?>' data-num-raw='<?php echo number_format($allCandN, 2, ".", ""); ?>'>0</span> <span class="ton">тонн</span></strong></div>
          <div class="numbers--desc"><span>Общий объем изготовленной и поставленной продукции</span></div>
        </div>
        <div class="row numbers--left_2">
          <div class="numbers--header"><strong><span data-num='<?php echo number_format($allChains, 2, ",", " "); ?>' data-num-raw='<?php echo number_format($allChains, 2, ".", ""); ?>'>0</span> <span class="ton">тонн</span></strong></div>
          <div class="numbers--desc"><span>Изготовлено и поставлено цепей для вращающихся цементных печей обжига</span></div>
        </div>
        <div class="row numbers--left_3">
          <div class="numbers--header"><strong><span data-num='<?php echo number_format($allNonstandart, 2, ",", " "); ?>' data-num-raw='<?php echo number_format($allNonstandart, 2, ".", ""); ?>'>0</span> <span class="ton">тонн</span></strong></div>
          <div class="numbers--desc"><span>Изготовлено и поставлено запасных частей для мельниц и дробилок</span></div>
        </div>
      </div>
      <!-- right -->
      <div class="col-xs-6 numbers--right">
        <div class="row numbers--right_1">
          <div class="numbers--header"><strong><span data-num='<?php echo number_format($averageChains * 12, 2, ",", " "); ?>' data-num-raw='<?php echo number_format($averageChains * 12, 2, ".", ""); ?>'>0</span> <span class="ton">тонн</span></strong></div>
          <div class="numbers--desc"><span>Средняя производительность цепей в год</span></div>
        </div>
        <div class="row numbers--right_2">
          <div class="numbers--header"><strong><span data-num='<?php echo number_format($averageNonstandart * 12, 2, ",", " "); ?>' data-num-raw='<?php echo number_format($averageNonstandart * 12, 2, ".", ""); ?>'>0</span> <span class="ton">тонн</span></strong></div>
          <div class="numbers--desc"><span>Средняя производительность запасных частей в год</span></div>
        </div>
        <div class="row numbers--right_3">&nbsp;</div>
      </div>
    </div>
</section>



<!-- Более 1300 наименований (ссылка на каталог) -->
<section class="catalogue_link" id="catalog">
  <div class="container">
    <?php if ($is_admin): ?><!-- BLOCK::Более 1300 наименований (ссылка на каталог) (главная) --><?php endif ?>
    <?php
      $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 4))));
      print drupal_render($block);
    ?>
  </div>
</section>



<!-- Почему мы -->
<section class="why_us">
  <div class="container">
    <div class="col-xs-6 why_us--text">
      <?php if ($is_admin): ?><!-- BLOCK::Почему мы (главная) --><?php endif ?>
      <?php
        $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 5))));
        print drupal_render($block);
      ?>
    </div>
    <div class="col-xs-6 why_us--form">
      <?php if ($is_admin): ?><!-- WEBFORM::Веб-форма: Заказать концепцию --><?php endif ?>
      <?php
        $block = module_invoke('webform', 'block_view', 'client-block-6');
        print render($block['content']);
      ?>
    </div>
  </div>
</section>



<!-- Доверие и репутация -->
<section class="trush_n_rep">
    <div class="container">
      <?php if ($is_admin): ?><!-- BLOCK::Доверие и репутация -- заголовок (главная) --><?php endif ?>
      <?php
        $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 24))));
        print drupal_render($block);
      ?>
      <?php if ($is_admin): ?><!-- VIEW::Представление: Доверие и репутация: Block --><?php endif ?>
      <?php 
        $block = module_invoke('views', 'block_view', 'trush_n_rep-block');
        print render ($block['content']);
      ?>
    </div>
</section>



<!-- О компании Uralcem -->
<section class="about_company" id="contacts">
    <div class="container">
      <div class="row about_company--title">
        <?php if ($is_admin): ?><!-- BLOCK::О компании -- заголовок (главная) --><?php endif ?>
        <?php
          $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 25))));
          print drupal_render($block);
        ?>
      </div>
      <div class="row about_company--content">
        <div class="col-xs-6 about_company--slider">
          <?php if ($is_admin): ?><!-- VIEW::Представление: О компании слайдер: Block --><?php endif ?>
          <?php 
            $block = module_invoke('views', 'block_view', 'about_comp-block');
            print render ($block['content']);
          ?>
        </div>
        <div class="col-xs-6 about_company--text">
          <?php if ($is_admin): ?><!-- BLOCK::О компании -- контент (главная) --><?php endif ?>
          <?php
            $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 26))));
            print drupal_render($block);
          ?>
        </div>
      </div>
    </div>
</section>



<!-- География поставок -->
<section class="geo">
  <div class="container">
    <?php if ($is_admin): ?><!-- BLOCK::География поставок (главная) --><?php endif ?>
    <?php
      $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 6))));
      print drupal_render($block);
    ?>

    <div id="map" class="geo--map">
      <?php if ($is_admin): ?><!-- BLOCK::География поставок -- блок карты (главная) --><?php endif ?>
      <?php
        $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 33))));
        print drupal_render($block);
      ?>
    </div>
  </div>
</section>



<!-- Выбирая uralcem - вы выбираете... -->
<section class="choose">
    <div class="container">
        <div class="row">
            <div class="col-xs-7 choose--text">
              <?php if ($is_admin): ?><!-- BLOCK::Выбирая uralcem -- заголовок (главная) --><?php endif ?>
              <?php
                $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 7))));
                print drupal_render($block);
              ?>
            </div>
            <div class="col-xs-5 choose--contacts">
              <?php if ($is_admin): ?><!-- BLOCK::Выбирая uralcem -- контакты (главная) --><?php endif ?>
              <?php
                $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 8))));
                print drupal_render($block);
              ?>
            </div>
        </div>
        <div class="row choose--branch">
            <div class="col-xs-3 branch--one">
              <?php if ($is_admin): ?><!-- BLOCK::Выбирая uralcem -- блок 1 (главная) --><?php endif ?>
              <?php
                $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 9))));
                print drupal_render($block);
              ?>
            </div>
            <div class="col-xs-3 branch--two">
              <?php if ($is_admin): ?><!-- BLOCK::Выбирая uralcem -- блок 2 (главная) --><?php endif ?>
              <?php
                $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 10))));
                print drupal_render($block);
              ?>
            </div>
            <div class="col-xs-3 branch--three">
              <?php if ($is_admin): ?><!-- BLOCK::Выбирая uralcem -- блок 3 (главная) --><?php endif ?>
              <?php
                $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 11))));
                print drupal_render($block);
              ?>
            </div>
            <div class="col-xs-3 branch--four">
              <?php if ($is_admin): ?><!-- BLOCK::Выбирая uralcem -- блок 4 (главная) --><?php endif ?>
              <?php
                $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 12))));
                print drupal_render($block);
              ?>
            </div>
        </div>
    </div>
</section>


<footer class="footer">
    <div class="container">
        <div class="col-xs-1 footer--logo">
          <?php if ($is_admin): ?><!-- BLOCK::Подвал -- лого (главная) --><?php endif ?>
          <?php
            $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 27))));
            print drupal_render($block);
          ?>
        </div>
        <div class="col-xs-3 footer--social_links">
          <?php if ($is_admin): ?><!-- BLOCK::Подвал -- текстовый блок 1 (главная) --><?php endif ?>
          <?php
            $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 31))));
            print drupal_render($block);
          ?>
        </div>
        <div class="col-xs-3 footer--phones">
          <?php if ($is_admin): ?><!-- BLOCK::Подвал -- текстовый блок 2 (главная) --><?php endif ?>
          <?php
            $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 28))));
            print drupal_render($block);
          ?>
        </div>
        <div class="col-xs-4 footer--address">
          <?php if ($is_admin): ?><!-- BLOCK::Подвал -- текстовый блок 3 (главная) --><?php endif ?>
          <?php
            $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 29))));
            print drupal_render($block);
          ?>
        </div>
        <div class="col-xs-1 footer_ribbla">
          <?php if ($is_admin): ?><!-- BLOCK::Подвал лого ribbla (главная) --><?php endif ?>
          <?php
            $block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 30))));
            print drupal_render($block);
          ?>
        </div>
    </div>
</footer>