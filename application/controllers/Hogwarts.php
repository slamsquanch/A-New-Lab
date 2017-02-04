<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hogwarts extends Application
{

    function __construct()
    {
            parent::__construct();
    }

    /**
     * Homepage for our app
     */
    public function index()
    {
        // this is the view we want shown
        $this->data['pagebody'] = 'homepage';

        // build the list of authors, to pass on to our view
        $source = $this->quotes->all();
        $authors = array ();
        foreach ($source as $record)
        {
            $authors[] = array ('who' => $record['who'], 'mug' => $record['mug'], 'href' => $record['where']);
        }
        $this->data['authors'] = $authors;

        $this->render();
    }

    //Shucks function
    public function shucks()
    {
        // this is the view we want shown
        $this->data['pagebody'] = 'justone';

        // build the list of authors, to pass on to our view
        $source = $this->quotes->get('2');
        $authors = array ();

        $this->data['mug'] = $source['mug'];
        $this->data['what'] = $source['what'];
        $this->data['who'] = $source['who'];

        $this->render();
    }
    
    //Random function
    public function random()
    {
    // this is the view we want shown
    $this->data['pagebody'] = 'justone';
    $num = rand(1,6);   //random quote generator.
    // build the list of authors, to pass on to our view
    $source = $this->quotes->get($num);
    $authors = array ();

    $this->data['mug'] = $source['mug'];
    $this->data['what'] = $source['what'];
    $this->data['who'] = $source['who'];

    $this->render();
    }

}
