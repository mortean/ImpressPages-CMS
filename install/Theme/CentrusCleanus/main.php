<?php echo $this->doctypeDeclaration(); ?>
<html<?php echo $this->htmlAttributes(); ?>>
<head>
    <?php
    ipAddCss(ipConfig()->themeUrl('ipContent.css'));
    ipAddCss(ipConfig()->themeUrl('theme.css'));
    ipPrintHead();
    ?>
</head>
<body>
    <div class="topmenu">
        <?php
        echo ipSlot('menu1'); // first argument is unique name of this menu within your theme. Choose anything you like. Second argument is a zone name
        ?>
    </div>
    <div class="content">
        <?php echo ipBlock('main') ?>
    </div>
    <?php
        ipAddJavascript(ipConfig()->coreModuleUrl('Assets/assets/js/jquery.js'));
        ipAddJavascript(ipConfig()->themeUrl('theme.js'));
        ipPrintJavascript();
    ?>
</body>
</html>