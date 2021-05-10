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

          <?php if (!empty($primary_nav)): ?>
          <div class="header--navigation-button" >
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
          </div>
          <?php endif; ?>
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