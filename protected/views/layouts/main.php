<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<meta http-equiv="Content-Type"
	content="text/html; charset=<?php echo Yii::app()->charset; ?>" />
<title><?php echo Yii::app()->name; ?></title>

<link rel="stylesheet"
	href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/style.css"
	type="text/css" />
<link rel="stylesheet"
	href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/form.css"
	type="text/css" />

<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/script.js"></script>
</head>
<body>
	<div id="art-page-background-simple-gradient">
		<div id="art-page-background-gradient"></div>
	</div>
	<div id="art-page-background-glare">
		<div id="art-page-background-glare-image"></div>
	</div>
	<div id="art-main">
		<div class="art-sheet">
			<div class="art-sheet-tl"></div>
			<div class="art-sheet-tr"></div>
			<div class="art-sheet-bl"></div>
			<div class="art-sheet-br"></div>
			<div class="art-sheet-tc"></div>
			<div class="art-sheet-bc"></div>
			<div class="art-sheet-cl"></div>
			<div class="art-sheet-cr"></div>
			<div class="art-sheet-cc"></div>
			<div class="art-sheet-body">
				<div class="art-header-jpeg"></div>
				<div class="art-header"></div>
				<div class="art-nav">
					<div class="l"></div>
					<div class="r"></div>
					<?php
    $this->widget('application.components.ArtMenu', 
        array(
            'cls' => 'art-menu',
            'prelinklabel' => '<span class="l"></span><span class="r"></span><span class="t">',
            'postlinklabel' => '</span>',
            'items' => array(
                array(
                    'label' => 'Inicio',
                    'url' => array(
                        '/site'
                    )
                ),
                array(
                    'label' => 'Consola',
                    'url' => array(
                        '/console'
                    )
                ),
                array(
                    'label' => 'Repositorio',
                    'url' => array(
                        '/console'
                    ),
                    'items' => array(
                        array(
                            'label' => 'Abrir',
                            'url' => array(
                                '/repositorio/admin'
                            )
                        ),
                        array(
                            'label' => 'Guardar',
                            'url' => array(
                                '/repositorio/create'
                            )
                        )
                    ),
                    'visible' => ! Yii::app()->user->isGuest
                ),
                array(
                    'label' => 'Imprimir',
                    'url' => array(
                        '/octave'
                    ),
                    'items' => array(
                        array(
                            'label' => 'Codigo',
                            'url' => array(
                                '/imprimir/code'
                            )
                        ),
                        array(
                            'label' => 'Resultado',
                            'url' => array(
                                '/imprimir/resul'
                            )
                        )
                    )
                ),
                array(
                    'label' => 'Entrar',
                    'url' => array(
                        '/site/login'
                    ),
                    'visible' => Yii::app()->user->isGuest
                ),
                array(
                    'label' => 'Salir (' . Yii::app()->user->name . ')',
                    'url' => array(
                        '/site/logout'
                    ),
                    'visible' => ! Yii::app()->user->isGuest
                )
            )
        ));
    ?>
				</div>
				<div class="art-content-layout">
					<div class="art-content-layout-row">
						<!-- removed sidebar HTML and set aside -->
						<!-- goes before ..."art-layout-cell art-content" in page.html original -->

						<!-- Main content goes here -->
						<?php echo $content; ?>
					</div>
				</div>
				<div class="cleared"></div>
				<div class="art-footer">
					<div class="art-footer-inner">
						<a href="#" class="art-up-tag-icon" title="Ir Arriba"></a>
						<div class="art-footer-text">
							<p>Copyright 2012 - by Rafael J Torres</p>
						</div>
					</div>
					<div class="art-footer-background"></div>
				</div>
				<div class="cleared"></div>
			</div>
		</div>
		<div class="cleared"></div>
		<p class="art-page-footer">
			<?php require_once('/protected/views/site/count.php');	?>
		</p>
	</div>
	<div align="center">
		<a href="http://jigsaw.w3.org/css-validator/check/referer"> <img
			style="border: 0; width: 88px; height: 31px"
			src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
			alt="�CSS V�lido!" />
		</a> <a href="http://validator.w3.org/check?uri=referer"> <img
			src="http://www.w3.org/Icons/valid-xhtml10"
			alt="Valid XHTML 1.0 Transitional" height="31" width="88" />
		</a>
	</div>
</body>
</html>
