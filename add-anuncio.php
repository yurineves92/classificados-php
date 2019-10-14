<?php require 'pages/header.php'; ?>
<?php 
    if(empty($_SESSION['cLogin'])) {
        ?>
        <script type="text/javascript">window.location.href="login.php";</script>
        <?php
        exit;
    }

    require 'classes/anuncios.class.php';
    $a = new Anuncios();
    if(isset($_POST['titulo']) && !empty($_POST['titulo'])){

        $titulo = addslashes($_POST['titulo']);
        $categoria = addslashes($_POST['categoria']);
        $valor = addslashes($_POST['valor']);
        $descricao = addslashes($_POST['descricao']);
        $estado = addslashes($_POST['estado']);

        $a->addAnuncio($titulo,$categoria,$valor,$descricao,$estado);

        ?>
        <div class="container-fluid">
            <div class="alert alert-success">Anúncio feito com sucesso</div>
        </div>
        <?php
    }
?>
<div class="container">
	<h2>Meus Anúncios - Adicionar</h2>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
			<label for="Categoria">Categoria:</label>
            <select name="categoria" id="categoria" class="form-control">
                <?php 
                    require 'classes/categorias.class.php';

                    $c = new Categorias();
                    $cats = $c->getLista();
                    foreach($cats as $cat):
                ?>
                <option value="<?php echo $cat['id'] ?>"><?php echo utf8_encode($cat['nome']); ?></option>
                <?php endforeach;?>
            </select>
		</div>
        <div class="form-group">
			<label for="Titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control">
		</div>
        <div class="form-group">
			<label for="Valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control">
		</div>
        <div class="form-group">
			<label for="Descricao">Descrição:</label>
            <textarea class="form-control" name="descricao" rows="4"></textarea>
		</div>
        <div class="form-group">
			<label for="Estado">Estado de Conservação:</label>
            <select name="estado" id="estado" class="form-control">
                <option value="1">Ruim</option>
                <option value="2">Bom</option>
                <option value="3">Ótimo</option>
            </select>
		</div>
        <input type="submit" value="Enviar" class="btn btn-default">
    </form>
</div>
<?php require 'pages/footer.php'; ?>