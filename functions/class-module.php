<?php
/**
 * Class Functions
 *
 * @package Tetloose-Theme
 **/

/**
 * Create css module + class names and attach to components
 **/
class Module {
    /**
     * Public function Constructor
     *
     * @param array $styles styles array of css module styles.
     * @param array $class_names names array of classnames.
     **/
    public function __construct( $styles = [], $class_names = [] ) {
        $this->styles = $styles;
        $this->class_names = $class_names;
    }

    /**
     * Public function css module styles
     **/
    public function styles() {
        return implode( ' ', preg_replace( '/,+/', ',', $this->styles ) );
    }

    /**
     * Public function class names
     **/
    public function class_names() {
        return implode( ' ', preg_replace( '/,+/', ',', $this->class_names ) );
    }
}
