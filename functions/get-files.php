<?php
/**
 * Get File Names
 *
 * @package Tetloose-Theme
 **/

/**
 * Function to get file names from specific folder.
 * Used to retrieve files with hash cache busting labels.
 *
 * @param dir   $dir directories string.
 * @param files $files array of files to return.
 **/
function get_files( $dir, $files ) {
    $file_list = [];
    $directories = new DirectoryIterator( get_template_directory() . $dir );

    foreach ( $directories as $directory ) {
        $file_name = $directory->getFilename();
        foreach ( $files as $file ) {
            if ( starts_with( $file_name, $file ) ) {
                array_push( $file_list, $file_name );
            }
        }
    }

    return $file_list;
}
