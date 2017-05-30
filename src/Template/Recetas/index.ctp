<head>
 
 <?php
use Cake\Routing\Router; // Para el Router.
echo $this->Html->script('jquery-3.2.1.min');
?>
 
</head>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Nueva Receta'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Ingredientes'), ['controller' => 'Ingredientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo Ingrediente'), ['controller' => 'Ingredientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recetas index large-9 medium-8 columns content">
    <h3><?= __('Recetas') ?></h3>
    <div class="elinput">
  <label for="Nombre">Nombre: </label>
  <input id="tags">
  <button id="boton" onclick="click_buscar();">Buscar</button>
  <br>
  <br>
  <br>
    </div>
    <?php echo $this->element('table_r'); ?>
</div>

<script type="text/javascript">
function click_buscar() { // Para la búsqueda a través de AJAX.
    $.ajax({
                type: 'POST',
                dataType: "html",
                evalScripts: true,
                data: {'tags': $('#tags').val()},
                success: function (data) {
                    var pos = data.search("</div>");
                    var newdata = data.slice(pos);
                    $("#totalajax").html(newdata);
                },
                url: '<?php echo Router::url(array('controller' => 'Recetas', 'action' => 'index')); ?>'});
}
$(document).ready(function () { // Para el ordenamiento(sort) a través de AJAX.
$(".sorter a").bind("click", function (event) {
            if (!$(this).attr('href'))
                return false;
            $("#filas").fadeTo("fast", 1);
            $.ajax({
                type: 'POST',
                dataType: "html",
                evalScripts: true,
                data:{'tags': $('#tags').val()}, // Esto es para que al ordenar no pierda el filtro, si es que lo hay.
                success: function (data, textStatus) {
                    var pos = data.search("</div>");
                    var newdata = data.slice(pos);
                    $("#totalajax").html(newdata);
                },
                url: $(this).attr('href')});
            return false;
        });
$(".pagination a").bind("click", function (event) { // Para la paginación a través de AJAX.
    if(!$(this).attr('href'))
        return false;
    $.ajax({
        type: 'POST',
        dataType: "html", 
        evalScripts:true,
        data:{'tags': $('#tags').val()}, // Esto es para que los botones de paginación esten de acuerdo al filtro.
        success:function (data, textStatus) {
            var pos = data.search("</div>");
            var newdata = data.slice(pos);
            $("#totalajax").html(newdata);
        }, 
        url:$(this).attr('href')});
        return false;
    });
    });
</script>