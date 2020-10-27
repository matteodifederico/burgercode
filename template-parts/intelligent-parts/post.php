    <!-- CSS global link -->
    <?php call_globalCss(); ?>
    <?php call_animationCss(); ?>
    <?php call_headerCss(); ?>
    <?php call_sidebarCss(); ?>
    <?php call_footerCss(); ?>
    <!-- component -->

    <!-- Javascript global link -->
    <?php call_globalJs(); ?>
    <?php call_headerJs(); ?>
    <?php call_sidebarJs(); ?>
    <?php call_footerJs(); ?>
    <!-- Hide loader spinner -->
    <script src="<?php echo $resources->url->js; ?>hide-loader.js"></script>
  </body>
<!-- end page -->
</html>
