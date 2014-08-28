<?php

// Google groups extension for Bolt

namespace AddThis;

class Extension extends \Bolt\BaseExtension
{

    function info()
    {
        $data = array(
            'name' =>"AddThis",
            'description' => "A small extension to add the addthis plugin to your website",
            'author' => "Valentin Ferriere",
            'link' => "http://v-labs.fr",
            'version' => "0.1",
            'required_bolt_version' => "1.0",
            'highest_bolt_version' => "1.6.9",
            'type' => "Twig function",
            'first_releasedate' => "2014-08-27",
            'latest_releasedate' => "2014-08-27",
        );

        return $data;
    }

    function initialize()
    {
        $this->addTwigFunction('add_this', 'addThis');
    }

    function addThis($id)
    {
        $html = <<< EOM
        <div class="addthis_sharing_toolbox"></div>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=%addthisid%"></script>
EOM;

        $html = str_replace("%addthisid%", $id, $html);

        return new \Twig_Markup($html, 'UTF-8');
    }
}