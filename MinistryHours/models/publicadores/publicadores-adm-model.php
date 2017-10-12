<?php 
/**
 * Modelo para gerenciar notícias
 *
 * @package TutsupMVC
 * @since 0.1
 */
class PublicadoresAdmModel extends MainModel
{

	/**
	 * $posts_per_page
	 *
	 * Receberá o número de posts por página para configurar a listagem de 
	 * notícias. Também utilizada na paginação. 
	 *
	 * @access public
	 */
	public $posts_por_pagina = 5;
	
	/**
	 * Construtor para essa classe
	 *
	 * Configura o DB, o controlador, os parâmetros e dados do usuário.
	 *
	 * @since 0.1
	 * @access public
	 * @param object $db Objeto da nossa conexão PDO
	 * @param object $controller Objeto do controlador
	 */
	public function __construct( $db = false, $controller = null ) {
		// Configura o DB (PDO)
		$this->db = $db;
		
		// Configura o controlador
		$this->controller = $controller;

		// Configura os parâmetros
		$this->parametros = $this->controller->parametros;

		// Configura os dados do usuário
		$this->userdata = $this->controller->userdata;
	}
	
	/**
	 * Lista publicadores
	 *
	 * @since 0.1
	 * @access public
	 * @return array Os dados da base de dados
	 */
	public function listar_publicadores () {
	
		// Configura as variáveis que vamos utilizar
		$id = $where = $query_limit = null;
		
		// Verifica se um parâmetro foi enviado para carregar uma notícia
		if ( is_numeric( chk_array( $this->parametros, 0 ) ) ) {
			
			// Configura o ID para enviar para a consulta
			$id = array ( chk_array( $this->parametros, 0 ) );
			
			// Configura a cláusula where da consulta
			$where = " WHERE ID = ? ";
		}
		
		// Configura a página a ser exibida
		$pagina = ! empty( $this->parametros[1] ) ? $this->parametros[1] : 1;
		
		// A páginação inicia do 0
		$pagina--;
		
		// Configura o número de posts por página
		$posts_por_pagina = $this->posts_por_pagina;
		
		// O offset dos posts da consulta
		$offset = $pagina * $posts_por_pagina;
		
		/* 
		Esta propriedade foi configurada no publicadores-adm-model.php para
		prevenir limite ou paginação na administração.
		*/
		if ( empty ( $this->sem_limite ) ) {
		
			// Configura o limite da consulta
			$query_limit = " LIMIT $offset,$posts_por_pagina ";
		
		}
		
		// Faz a consulta
		$query = $this->db->query(
			'SELECT * FROM publisher ' . $where . ' ORDER BY NAME DESC' . $query_limit,
			$id
		);
		
		// Retorna
		return $query->fetchAll();
	} // listar_publicadores
	
	/**
	 * Paginação
	 *
	 * @since 0.1
	 * @access public
	 */
	
} // NoticiasAdmModel