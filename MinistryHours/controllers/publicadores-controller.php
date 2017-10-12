<?php
/**
 * PublicadoresController - Controller de exemplo
 *
 * @package TutsupMVC
 * @since 0.1
 */
class PublicadoresController extends MainController
{

	/**
	 * $login_required
	 *
	 * Se a página precisa de login
	 *
	 * @access public
	 */
	public $login_required = false;

	/**
	 * $permission_required
	 *
	 * Permissão necessária
	 *
	 * @access public
	 */
	public $permission_required;

	/**
	 * Carrega a página "/views/publicadores/index.php"
	 */
    public function index() {
		// Título da página
		$this->title = 'Publicadores';
	
		// Carrega o modelo para este view
        $modelo = $this->load_model('publicadores/publicadores-adm-model');
				
		/** Carrega os arquivos do view **/
		
		// /views/_includes/header.php
        require ABSPATH . '/views/_includes/header.php';
		
		// /views/_includes/menu.php
        require ABSPATH . '/views/_includes/menu.php';
		
		// /views/publicadores/index.php
        require ABSPATH . '/views/publicadores/publicadores-view.php';
		
		// /views/_includes/footer.php
        require ABSPATH . '/views/_includes/footer.php';
		
    } // index
	

} // class PublicadoresController