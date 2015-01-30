<?php
/*
Plugin Name: Slide Editor Tyrex
Plugin URI: http://www.lokaalgevonden.nl
Description: This plugin provides a slide-editor for tyrex
Version: 1.0
Author: Marten Sytema
Author URI: http://www.sytematic.nl
Author Email: marten@sytematic.nl
License:

  Copyright 2013 Sytematic Software (marten@sytematic.nl)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as 
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
class SlideEditor {
	/**
	 * Initializes the plugin by setting localization, filters, and administration functions.
	 */
	function __construct() {
		

		add_action('init', array($this, 'load_options'));
			
		add_action('admin_print_styles', array( $this, 'register_admin_styles' ) );
		add_action('admin_enqueue_scripts', array( $this, 'register_admin_scripts' ) );
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
		register_uninstall_hook( __FILE__, array( $this, 'uninstall' ) );

		add_action('widgets_init', array($this, 'register_widgets' ));
		add_action('admin_menu', array($this, 'settings_menu' ));
		add_action('admin_init', array($this, 'register_settings'));
		add_action('admin_head', array($this,'enqueueeditor'));
	
		
		add_action( 'admin_menu', array($this, 'add_pages') );
		
	} // end constructor


	function add_pages(){ 
		add_menu_page( 'Slide editor', 'Slide editor', 'edit_pages', 'slide-editor', array(&$this, 'render_admin_page'));
	}

	function render_admin_page(){
		echo '<h1>Slide editor</h1>';
		echo '<div id="slide_editor"></div>';
	}

	function load_options(){

	}


	function register_admin_styles() {
		wp_enqueue_style('editorstyle', plugins_url( '/slideeditor-wp/css/style.css'));
	}

	function register_admin_scripts() {

		wp_enqueue_script( 'react', plugins_url( '/slideeditor-wp/lib/react.js' ) );
		wp_enqueue_script( 'react-jsx', plugins_url( '/slideeditor-wp/lib/JSXTransformer.js', 'react' ) );
		wp_enqueue_script( 'react-draggable', plugins_url( '/slideeditor-wp/lib/react-draggable.js', 'react-jsx' ) );

	}


	function enqueueeditor(){
		echo '<script type="text/jsx" src="'.plugins_url('/slideeditor-wp/js/editor.js').'" ></script>';
	}
	
	function activate(){

	}

	function deactivate(){

	}

	function uninstall(){

	}

	function register_widgets(){

	}

	function settings_menu(){

	}

	function register_settings(){

	}
	
} // end class

$slideEditor = new SlideEditor();
