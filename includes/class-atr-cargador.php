<?php 
/* 
* Registrar todas las acciones y filtros para el tema
*/

class ATR_Cargador{
    protected $actions;
    protected $filters;
    protected $shortcodes;

    public function __construct(){
        $this->action = [];
        $this->filters = [];
        $this->shortcodes = [];
    }

    public function add_action($hook, $component, $callback, $priority = 10, $accepted_args = 1){
        $this->actions = $this->add($this->actions, $hook, $component, $callback, $priority, $accepted_args);
    }

    public function add_filter($hook, $component, $callback, $priority = 10, $accepted_args = 1){
        $this->filters = $this->add($this->filters, $hook, $component, $callback, $priority, $accepted_args);
    }

    public function add($hooks, $hook, $component, $callback, $priority, $accepted_args){
        $hooks[] = [
            'hook' => $hook,
            'component'     => $component,
            'callback'      => $callback,
            'priority'      => $priority,
            'accepted_args' => $accepted_args,
        ];
        return $hooks;
    }


    public function add_shortcodes($tag, $component, $callback){
        $this->shortcodes = $this->add_s($this->shortcodes, $tag, $component, $callback);
    }

    public function add_s($shortcodes, $tag, $component, $callback){
        $shortcodes[] = [
            'tag'           => $tag,
            'component'     => $component,
            'callback'      => $callback
        ];
        return $shortcodes;
    }


    public function run(){
        foreach($this->actions as $hook_u){
            extract($hook_u, EXTR_OVERWRITE); //convierte los índices del arreglo en variables

            add_action($hook, [$component, $callback], $priority, $accepted_args);
        }

        foreach($this->filters as $hook_u){
            extract($hook_u, EXTR_OVERWRITE); //convierte los índices del arreglo en variables

            add_filter($hook, [$component, $callback], $priority, $accepted_args);
        }

        foreach($this->shortcodes as $shortcode){
            extract($shortcode, EXTR_OVERWRITE); //convierte los índices del arreglo en variables

            add_shortcode($tag, [$component, $callback]);
        }
    }
}