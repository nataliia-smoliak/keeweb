<?php

class keeweb extends rcube_plugin
{
    public $rc;
    public $home; // declare public to be used in other classes

    function init()
    {
        $this->rc = rcube::get_instance();
        $this->register_task('keeweb', 'keeweb');
        $this->add_hook('startup', array(
            $this,
            'startup'
        ));
    }

    protected function setup()
    {
        require($this->home . '/lib/keeweb_ui.php');
        $this->ui = new keeweb_ui($this);
        $this->add_texts('localization/', true);
    }

    public function startup($args)
    {
        $this->setup();
        $this->ui->init();
        if ($args['task'] == 'keeweb') {

            // register calendar actions
            $this->register_action('index', array(
                $this,
                'keeweb_view'
            ));
        }
    }

    function keeweb_view()
    {
        $this->rc->output->set_pagetitle($this->gettext('keeweb'));

        // Add CSS stylesheets to the page header
        $this->ui->addCSS();

        // Add JS files to the page header
        $this->ui->addJS();

        $this->rc->output->send("keeweb.keeweb");
    }
}