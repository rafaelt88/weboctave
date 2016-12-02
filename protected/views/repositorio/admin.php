<h1>Abrir de Repositorio</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'repositorio-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
				'date',
				'title',
				'text',
				array(
						'class'=>'CButtonColumn',
						'template'=>'{update}',
						'updateButtonLabel'=>'Editar'
				),
				array(
						'class'=>'CButtonColumn',
						'template'=>'{delete}',
						'deleteButtonLabel'=>'Borrar',
						'deleteConfirmation'=>'¿Estás seguro de querer eliminar el registro?',
				),
		),
)); ?>
