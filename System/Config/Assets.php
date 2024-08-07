<?php
/**
* Attention, don't try to change the structure of the code, delete, or change.
* Because there is some code connected to the NSY system. So, be careful.
*
* Hi Welcome to NSY Assets Manager.
* The easiest & best assets manager in history.
* Made with love by Vikry Yuansah.
*
* How to use it? Simply follow this :
* https://github.com/kazuyamarino/nsy-docs/blob/master/USERGUIDE.md#introducting-to-nsy-assets-manager
*/

function header_assets()
{
	// Site Title
	Add::custom('<title>' . get_title() . ' ' . get_version() . ' | ' . get_codename() . '</title>');

	// Meta Tag
	Add::meta('charset="utf-8"');
	Add::meta('http-equiv="x-ua-compatible"', 'ie=edge');
	Add::meta('name="description"', get_desc());
	Add::meta('name="keywords"', get_keywords());
	Add::meta('name="author"', get_author());
	Add::meta('name="viewport"', 'width=device-width, initial-scale=1, shrink-to-fit=no');

	// Favicon
	Add::link('favicon.png', 'shortcut icon');

	// Font Awesome CSS
	Add::link('../../node_modules/@fortawesome/fontawesome-free/css/all.min.css', 'stylesheet', 'text/css');

	// Bulma CSS
	Add::link('../../node_modules/bulma/css/bulma.min.css', 'stylesheet', 'text/css');
	Add::link('../../node_modules/bulma-modal-fx/dist/css/modal-fx.min.css', 'stylesheet', 'text/css');

	// Datatable CSS
	Add::link('../../node_modules/datatables.net-bm/css/dataTables.bulma.min.css', 'stylesheet', 'text/css');

	// Tooltip CSS
	Add::link('../../node_modules/simptip/simptip.min.css', 'stylesheet', 'text/css');

	// Flatpickr CSS
	Add::link('../../node_modules/flatpickr/dist/flatpickr.min.css', 'stylesheet', 'text/css');

	// Main Style
	Add::link('main.css', 'stylesheet', 'text/css');

	// Modernizr JS
	Add::script('modernizr.min.js', 'text/javascript', 'UTF-8');

	// JS Cookie
	Add::script('../../node_modules/js-cookie/dist/js.cookie.min.js', 'text/javascript', 'UTF-8');
}

function footer_assets()
{
	// Jquery JS
	Add::script('../../node_modules/jquery/dist/jquery.min.js', 'text/javascript', 'UTF-8');
	Add::script('../../node_modules/jquery-migrate/dist/jquery-migrate.min.js', 'text/javascript', 'UTF-8');

	// Norma JS
	Add::script('norma.bulma.min.js', 'text/javascript', 'UTF-8');

	// WhatInput JS
	Add::script('../../node_modules/what-input/dist/what-input.min.js', 'text/javascript', 'UTF-8');

	// Datatables JS
	Add::script('../../node_modules/datatables.net/js/dataTables.min.js', 'text/javascript', 'UTF-8');
	Add::script('../../node_modules/datatables.net-bm/js/dataTables.bulma.min.js', 'text/javascript', 'UTF-8');
	Add::link('../../node_modules/jquery-datatables-checkboxes/css/dataTables.checkboxes.css', 'stylesheet', 'text/css');
	Add::script('../../node_modules/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js', 'text/javascript', 'UTF-8');

	// Bulma modal-fx JS
	Add::script('../../node_modules/bulma-modal-fx/dist/js/modal-fx.min.js', 'text/javascript', 'UTF-8');

	// Flatpickr JS
	Add::script('../../node_modules/flatpickr/dist/flatpickr.min.js', 'text/javascript', 'UTF-8');

	// System JS
	Add::script('config/system.js', 'text/javascript', 'UTF-8');

	// Main JS
	Add::script('main.js', 'text/javascript', 'UTF-8');
}

function sweetalert_init()
{
	// Sweetalert init
	Add::script('../../node_modules/sweetalert2/dist/sweetalert2.all.min.js', 'text/javascript', 'UTF-8');
	Add::script('../../node_modules/promise-polyfill/dist/polyfill.min.js', 'text/javascript', 'UTF-8');
}

function datatables_init()
{
	// Datatables init
	Add::script('datatables/init.js', 'text/javascript', 'UTF-8');
}

function datatables_crud_init()
{
	// Datatables init
	Add::script('datatables/init_crud.js', 'text/javascript', 'UTF-8');
}

function dashboard_header_assets()
{
	// Dashboard Style
	Add::link('../dashboard/css/main.css', 'stylesheet', 'text/css');
}

function dashboard_footer_assets()
{
	// Dashboard JS
	Add::script('../dashboard/js/main.min.js', 'text/javascript', 'UTF-8');
	Add::script('../../node_modules/chart.js/dist/chart.umd.js', 'text/javascript', 'UTF-8');
	Add::script('../dashboard/js/chart.sample.js', 'text/javascript', 'UTF-8');
	Add::link('../../node_modules/@mdi/font/css/materialdesignicons.min.css', 'stylesheet', 'text/css');

	// Responsive Style
	Add::link('responsive-tables.min.css', 'stylesheet', 'text/css');
	Add::script('responsive-tables.min.js', 'text/javascript', 'UTF-8');
}
