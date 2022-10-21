<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro</title>
  	<link href="{{ asset('css/cadastrarLivro.css') }}" rel="stylesheet">

</head>
<body>
	<div class="corpo">
		<div class="corpo-afasta"></div>
		
		<div class="corpo-container">
			
			<div class="corpo-container-h3">
				<h3>Cadastrar Livro</h3>
			</div>
			
			
			<div class="corpo-container-form">
				<form method="POST" action="">
					@csrf
					<p>Titulo</p>
					<input type="text" name="nomeLivro" placeholder="Titulo">
					<p>Autor</p>
					<input type="text" name="autorLivro" placeholder="Autor do Livro">
					<p>Categoria</p>
					<input type="text" name="categoriaLivro" placeholder="Categoria do Livro">

					<div class="corpo-container-input-3">
						<input id="corpo-container-button-submit" type="submit" value="Cadastrar">
					</div>					
				</form>
			</div>			
		</div>
	</div>
	
</body>
</html>