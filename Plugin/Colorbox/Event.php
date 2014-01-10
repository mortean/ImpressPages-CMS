<?php

namespace Plugin\Colorbox;

class Event
{
    public static function ipInit()
    {
        ipAddCss(ipFileUrl('Plugin/Colorbox/assets/theme1/colorbox.css'));
        ipAddJs(ipFileUrl('Plugin/Colorbox/assets/colorbox/jquery.colorbox-min.js'));
        ipAddJs(ipFileUrl('Plugin/Colorbox/assets/colorboxInit.js'));
    }
}