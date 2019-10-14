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
        if(isset($_FILES['fotos'])) {
            $fotos = $_FILES['fotos'];
        } else {
            $fotos = array();
        }

        $a->editAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos,$_GET['id']);

        ?>
        <div class="container-fluid">
            <div class="alert alert-success">Anúncio atualizado com sucesso</div>
        </div>
        <?php
    }
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $info = $a->getAnuncio($_GET['id']);
    } else {
        ?>
        <script type="text/javascript">window.location.href="meus-anuncios.php";</script>
        <?php
    }
?>
<div class="container">
	<h2>Meus Anúncios - Editar</h2>

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
                <option value="<?php echo $cat['id'] ?>" <?php echo ($info['id_categoria'] == $cat['id'])?'selected="selected"':''; ?>><?php echo utf8_encode($cat['nome']); ?></option>
                <?php endforeach;?>
            </select>
		</div>
        <div class="form-group">
			<label for="Titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $info['titulo']; ?>">
		</div>
        <div class="form-group">
			<label for="Valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control"  value="<?php echo $info['valor']; ?>">
		</div>
        <div class="form-group">
			<label for="Descricao">Descrição:</label>
            <textarea class="form-control" name="descricao" rows="4"><?php echo $info['descricao']; ?></textarea>
		</div>
        <div class="form-group">
			<label for="Estado">Estado de Conservação:</label>
            <select name="estado" id="estado" class="form-control">
                <option value="1" <?php echo ($info['estado'] == 1)?'selected="selected"':''; ?>>Ruim</option>
                <option value="2" <?php echo ($info['estado'] == 2)?'selected="selected"':''; ?>>Bom</option>
                <option value="3" <?php echo ($info['estado'] == 3)?'selected="selected"':''; ?>>Ótimo</option>
            </select>
		</div>
        <div class="form-group">
            <label for="addPhoto">Fotos do anúncio:</label>
            <input type="file" name="fotos[]" class="form-control" multiple><br>
            <div class="panel panel-default">
                <div class="panel-heading">Fotos do anúncio</div>
                <div class="panel-body">
                    <?php foreach($info['fotos'] as $foto): ?>
                    <div class="foto-item">
                        <img src="assets/images/anuncios/<?php echo $foto['url']; ?>" class="img-thumbnail"><br>
                        <a href="excluir-foto.php?id=<?php echo $foto['id'] ?>" class="btn btn-default">Excluir Imagem</a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>       
        </div>
        <input type="submit" value="Enviar" class="btn btn-default">
    </form>
</div>
<?php require 'pages/footer.php'; ?>