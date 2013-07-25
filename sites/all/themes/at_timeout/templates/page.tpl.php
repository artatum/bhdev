<?php // AT Timeout ?>
<div class="<?php print $classes; ?>">

  <div id="menu-top-wrapper">
    <div class="container clearfix">
      <?php print render($page['menu_bar_top']); ?> <!-- /menu bar top -->
    </div>
  </div>

  <div id="page" class="container">

    <header<?php print $header_attributes; ?>>

      <?php if ($site_logo || $site_name || $site_slogan): ?>
        <!-- start: Branding -->
        <div<?php print $branding_attributes; ?>>

          <?php if ($site_logo): ?>
            <div id="logo">
              <?php print $site_logo; ?>
            </div>
          <?php endif; ?>

          <?php if ($site_name || $site_slogan): ?>
            <!-- start: Site name and Slogan hgroup -->
            <hgroup<?php print $hgroup_attributes; ?>>

              <?php if ($site_name): ?>
                <h1<?php print $site_name_attributes; ?>><?php print $site_name; ?></h1>
              <?php endif; ?>

              <?php if ($site_slogan): ?>
                <h2<?php print $site_slogan_attributes; ?>><?php print $site_slogan; ?></h2>
              <?php endif; ?>

            </hgroup><!-- /end #name-and-slogan -->
          <?php endif; ?>

        </div><!-- /end #branding -->
      <?php endif; ?>

      <!-- region: Header -->
      <?php print render($page['header']); ?>

    </header>

    <?php if ($page['menu_bar']):?>
      <div id="menu-bar-wrapper">
        <?php print render($page['menu_bar']); ?>
      </div>
    <?php endif; ?>

    <?php print $breadcrumb; ?>

    <?php if ($messages): ?>
      <div id="messages-wrapper">
        <?php print $messages; ?>
      </div> <!-- /message -->
    <?php endif; ?>

    <?php print render($page['help']); ?>

    <?php print render($page['secondary_content']); ?>

    <?php if (
      $page['three_33_top'] ||
      $page['three_33_first'] ||
      $page['three_33_second'] ||
      $page['three_33_third'] ||
      $page['three_33_bottom']
      ): ?>
      <!-- Three column 3x33 Gpanel -->
      <div id="tripanel" class="at-panel gpanel panel-display three-3x33 clearfix">
        <?php print render($page['three_33_top']); ?>
        <?php print render($page['three_33_first']); ?>
        <?php print render($page['three_33_second']); ?>
        <?php print render($page['three_33_third']); ?>
        <?php print render($page['three_33_bottom']); ?>
      </div>
    <?php endif; ?>

    <div id="columns">
      <div class="columns-inner clearfix">
        <div id="content-column">
          <div class="content-inner">

            <?php print render($page['highlighted']); ?>

            <?php if (
              $page['two_50_top'] ||
              $page['two_50_first'] ||
              $page['two_50_second'] ||
              $page['two_50_bottom']
              ): ?>
              <!-- Two column 2x50 -->
              <div id="bipanel" class="at-panel gpanel panel-display two-50 clearfix">
                <?php print render($page['two_50_top']); ?>
                <?php print render($page['two_50_first']); ?>
                <?php print render($page['two_50_second']); ?>
                <?php print render($page['two_50_bottom']); ?>
              </div>
            <?php endif; ?>

            <<?php print $tag; ?> id="main-content">

              <?php if ($title || $primary_local_tasks || $secondary_local_tasks || $action_links = render($action_links)): ?>
                <header class="main-content-header clearfix">

                  <?php print render($title_prefix); ?>
                  <?php if ($title): ?>
                    <h1 id="page-title"><?php print $title; ?></h1>
                  <?php endif; ?>
                  <?php print render($title_suffix); ?>

                  <?php if ($primary_local_tasks || $secondary_local_tasks || $action_links): ?>
                    <div id="tasks" class="clearfix">
                      <?php if ($primary_local_tasks): ?>
                        <ul class="tabs primary clearfix"><?php print render($primary_local_tasks); ?></ul>
                      <?php endif; ?>
                      <?php if ($secondary_local_tasks): ?>
                        <ul class="tabs secondary clearfix"><?php print render($secondary_local_tasks); ?></ul>
                      <?php endif; ?>
                      <?php if ($action_links = render($action_links)): ?>
                        <ul class="action-links clearfix"><?php print $action_links; ?></ul>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>

                </header>
              <?php endif; ?>

              <?php print render($page['content']); ?>

            </<?php print $tag; ?>>

            <?php print render($page['content_aside']); ?>

          </div>
        </div>

        <?php print render($page['sidebar_first']); ?>
        <?php print render($page['sidebar_second']); ?>

      </div>
    </div>

    <?php print render($page['tertiary_content']); ?>

    <?php if (
      $page['three_50_25_25_top'] ||
      $page['three_50_25_25_first'] ||
      $page['three_50_25_25_second'] ||
      $page['three_50_25_25_third'] ||
      $page['three_50_25_25_bottom']
      ): ?>
      <!-- Three column 50-25-25 -->
      <div id="tripanel-2" class="at-panel gpanel panel-display three-50-25-25 clearfix">
        <?php print render($page['three_50_25_25_top']); ?>
        <?php print render($page['three_50_25_25_first']); ?>
        <?php print render($page['three_50_25_25_second']); ?>
        <?php print render($page['three_50_25_25_third']); ?>
        <?php print render($page['three_50_25_25_bottom']); ?>
      </div>
    <?php endif; ?>

    <?php if (
      $page['three_25_25_50_top'] ||
      $page['three_25_25_50_first'] ||
      $page['three_25_25_50_second'] ||
      $page['three_25_25_50_third'] ||
      $page['three_25_25_50_bottom']
      ): ?>
      <!-- Three column 25-25-50 -->
      <div id="tripanel-3" class="at-panel gpanel panel-display three-25-25-50 clearfix">
        <?php print render($page['three_25_25_50_top']); ?>
        <?php print render($page['three_25_25_50_first']); ?>
        <?php print render($page['three_25_25_50_second']); ?>
        <?php print render($page['three_25_25_50_third']); ?>
        <?php print render($page['three_25_25_50_bottom']); ?>
      </div>
    <?php endif; ?>

    <?php if (
      $page['four_first'] ||
      $page['four_second'] ||
      $page['four_third'] ||
      $page['four_fourth'] ||
      $page['footer']
      ): ?>
      <footer<?php print $footer_attributes; ?>>
        <div id="footer-inner" class="clearfix">

          <?php if (
            $page['four_first'] ||
            $page['four_second'] ||
            $page['four_third'] ||
            $page['four_fourth']
            ): ?>
            <!-- Four column Gpanel -->
            <div id="footerpanel" class="at-panel gpanel panel-display four-4x25 clearfix">
              <div class="panel-row row-1 clearfix">
                <?php print render($page['four_first']); ?>
                <?php print render($page['four_second']); ?>
              </div>
              <div class="panel-row row-2 clearfix">
                <?php print render($page['four_third']); ?>
                <?php print render($page['four_fourth']); ?>
              </div>
            </div>
          <?php endif; ?>

          <?php if ($page['footer']): print render($page['footer']); endif; ?>
        </div>

      </footer> <!-- /footer/footer-inner -->
    <?php endif; ?>

    <?php if ($feed_icons):?>
      <div id="feed-icon">
        <?php print $feed_icons; ?>
      </div>
    <?php endif; ?>

  </div> <!-- /page -->
</div>