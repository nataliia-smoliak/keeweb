<?php

class keeweb_ui
{
    private $kee;
    private $ready = false;

    function __construct($kee)
    {
        $this->kee = $kee;
    }

    public function init()
    {
        if ($this->ready) // already done
            return;

        // add taskbar button
        $this->kee->add_button(array(
            'command' => 'keeweb',
            'class' => 'button-keeweb',
            'classsel' => 'button-keeweb button-selected',
            'innerclass' => 'button-inner',
            'label' => 'keeweb.keeweb',
            'type' => 'link'
        ), 'taskbar');

        $skin_path = $this->kee->local_skin_path();
        $this->kee->include_stylesheet($skin_path . '/fullkeeweb.css');

        $this->ready = true;
    }

    /**
     * Adds CSS stylesheets to the page header
     */
    public function addCSS()
    {
        $skin_path = $this->kee->local_skin_path();
        $this->kee->include_stylesheet($skin_path . '/keeweb.css');
        $this->kee->include_stylesheet($skin_path . '/fix.css');
    }

    /**
     * Adds JS files to the page header
     */
    public function addJS()
    {
        $this->kee->include_script('keeweb1.js');
        $this->kee->include_script('keeweb2.js');
        $this->kee->include_script('keeweb3.js');
    }
}
