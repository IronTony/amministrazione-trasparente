<?php

/* =========== Settings Menu ============ */


if ( is_admin() ){ // admin actions
  add_action('admin_menu', 'at_setting_menu');
  add_action('admin_menu', 'at_menu');
  add_action('admin_init', 'at_reg_settings');
} else {
  // non-admin enqueues, actions, and filters
}

function at_reg_settings() {
	register_setting( 'at_options_group', 'at_option_url');
	register_setting( 'at_options_group', 'at_option_love', 'intval');
	register_setting( 'at_options_group', 'at_option_widget');
}

function at_setting_menu()
{
    add_submenu_page('edit.php?post_type=amm-trasparente', 'Impostazioni', 'Impostazioni', 'manage_options', 'at_settings', 'at_settings_menu');
}

function at_settings_menu()
{

	$at_option_url = get_option('at_option_url');
	    
    if(isset($_POST['Submit'])) 	{
		$at_option_get_url = $_POST["at_option_url_n"];
        update_option( 'at_option_url', $at_option_get_url );

		if(isset($_POST['at_option_love_n'])){
			update_option( 'at_option_love', '1' );
		} else {
			update_option( 'at_option_love', '0' );
		}
	}
	
	echo '<div class="wrap">';
	screen_icon();
	echo '<h2>Impostazioni</h2>';
	echo '<div id="welcome-panel" class="welcome-panel">';
	echo '<form method="post" name="options" target="_self">';
	settings_fields( 'at_option_group' );	
	
	echo '
	<table class="form-table">
        <tr valign="top">
        <th scope="row">URL Pagina Amministrazione Trasparente</th>
        <td><input type="text" name="at_option_url_n" value="';
	echo get_option('at_option_url');
	echo '" />&nbsp;Inserisci qui l\'url della pagina in cui è stato inserito un tag head/list. Serve per il pulsante "Torna alla lista" (se supportato)</td></tr>';
	echo '<tr><th scope="row">Mostra "Un po\' di amore"</th>
        <td><input type="checkbox" name="at_option_love_n" ';
	$get_show_love = get_option('at_option_love');
	if ($get_show_love == '1') {
		echo 'checked=\'checked\'';
	}
	echo '/>&nbsp;Spunta questa casella per dimostrare il lato "OPEN" del sito web mostrando un link alla pagina wordpress.org di A.T. in fondo alla visualizzazione table/list</td>';
	echo '</tr></table>';

	
	echo '<p class="submit"><input type="submit" name="Submit" value="Aggiorna Impostazioni" /></p>';
	echo '</form></div></div>';

}

/* =========== Credits Menu ============ */
function at_menu()
{
    add_submenu_page('edit.php?post_type=amm-trasparente', 'Info & Aiuto', 'Info & Aiuto', 'manage_options', 'at_credits', 'at_credits_menu');
}

function at_credits_menu()
{
    echo '<div class="wrap"><h2>Amministrazione Trasparente per Wordpress</h2>Soluzione completa per la pubblicazione online dei documenti ai sensi del D.lgs. n. 33 del 14/03/2013, riguardante il riordino della disciplina degli obblighi di pubblicità, trasparenza e diffusione di informazioni da parte delle pubbliche amministrazioni, in attuazione dell’art. 1, comma 35, della legge n. 190/2012.<br/><br/>Versione <b>2.2.1</b><br/>Autore: <b>Marco Milesi</b><br/>Supporto & Feedback: <b><a href="http://wordpress.org/extend/plugins/amministrazione-trasparente/" title="Wordpress Support" target="_blank">www.wordpress.org/extend/plugins/amministrazione-trasparente</a><br/><br/><h3>Installazione</h3>Dopo avere attivato il plugin, per visualizzare la sezione contenente i link delle varie sezioni è sufficiente creare una nuova pagina (es. "Amministrazione Trasparente"), inserendo al suo interno il tag "<b>[at-list]</b>" oppure "<b>[at-table]</b>" per ottenere, rispettivamente, una lista dei link a pagina intera oppure una lista divisa su 2 colonne.
	Per l\'utilizzo dei tag nel template, usare rispettivamente <#?php echo do_shortcode(\'[at-list]\') ?#> oppure <#?php echo do_shortcode(\'[at-table]\') ?#> (senza il carattere #)<br/>
	Per informazioni e supporto, consultare il blog ufficiale oppure la pagina dedicata su Wordpress.org.<br/><br/><h3>Segnalazione BUG - Miglioramento Proattivo</h3>Nel caso in cui si riscontrino anomalie o imperfezioni durante l\'utilizzo di questo modulo, si prega di compilare una segnalazione e di inviarla a <b>milesimarco@outlook.com</b>. In questo modo, oltre a mantenere il plugin sempre aggiornato e privo di problemi per tutti, contribuisci in modo consapevole ad ottenere un prodotto gratuito e sempre aggiornato su cui poter contare. Allo stesso modo, se pensi che questo plugin debba implementare altre funzioni, contatta l\'autore o lascia un commento nella pagina su Wordpress.org!<br/><br/>Grazie per utilizzare Amministrazione Trasparente per Wordpress!<br/>Marco';
}
?>