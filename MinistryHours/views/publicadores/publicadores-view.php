<?php
// Evita acesso direto a este arquivo
if (!defined('ABSPATH'))
    exit;
?>

<div class="wrap">

    <h1>Administração</h1>
    <h2>Publicadores - Eurico Chaves</h2>
    <?php
// Número de posts por página
    $modelo->posts_por_pagina = 10;

// Lista notícias
    $lista = $modelo->listar_publicadores();
//print_r($lista);
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data Cadastro</th>
                <th>Relatório</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lista as $publicadores): ?>
                <tr>
                    <td>
                        <?php echo $publicadores['NAME'] ?>
                    </td>
                    <td>
                        <?php echo $publicadores['DATE_INS'] ?>
                    </td>
                    <td>
                        <a href="<?php echo HOME_URI ?>/relatorio/publicador/<?php echo $publicadores['ID'] ?>">
                            Acessar Relatório
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="">Exportar Relatórios</a>
    <?php //$modelo->paginacao(); ?>

</div> <!-- .wrap -->
