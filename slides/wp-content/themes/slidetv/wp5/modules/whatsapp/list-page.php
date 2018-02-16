<?php
if(isset($_GET["action"]) && $_GET["action"] == "edit"):
    $data = reset(Whatsapp::getWhatsappById($_GET["whatsid"]));   
    ?>
    <div class="wrap">
        <h2>Editar Cadastrado</h2>
        
        <form action="admin.php?page=list-whatsapp" method="POST">
        <table class="form-table">
            <tr class="valign-top">
                <th><label for="whatsappNumber">Numero:</label></td>
                <td><input type="text" name="name" id="whatsappNumber" value="<?php echo $data->number_whatsapp;?>" style="width:300px" /></td>
            </tr>
            <tr class="valign-top">
                <th><label for="whatsappEmail">Nome do Arquivo:</label></td>
                <td><input type="text" name="email" id="whatsappEmail" value="<?php echo $data->nameFile;?>" style="width:300px" /></td>
            </tr>
        </table>
        <p class="submit">
            <input type="hidden" name="id" value="<?php echo $data->id;?>" />
            <input type="submit" name="Submit" value="Atualizar" />
        </p>
        </form>
    </div>
    <?php 
else:    
    $orderby = (isset($_GET["orderby"])) ? $_GET["orderby"] : 'number_whatsapp';
    $order = (isset($_GET["order"])) ? $_GET["order"] : 'asc';

    $whatsapp = Whatsapp::getWhatsapp($orderby,$order);   
    ?>
    <div class="wrap">
        <h2>Lista de Cadastrados</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="admin.php?page=export-whatsapp">Exportar todos em csv</a>
            </div>
        </div>
        
        <form action="admin.php?page=export-whatsapp&action=export-selecteds" method="POST">
            <div class="tablenav top">
            <input type="submit" name="export-selecteds" value="Exportar selecionados" />
        </div>
        <table class="wp-list-table widefat fixed posts">
            <tr>
                <th id="cbNews" class="manage-column column-cb check-column"><input type="checkbox" /></th>
                <th class="manage-column sorted <?php echo ($orderby=="number_whatsapp" && $order == "asc") ? "desc" : "asc";?>"><a href="admin.php?page=list-whatsapp&orderby=number_whatsapp&order=<?php echo ($orderby=="number_whatsapp" && $order == "asc") ? "desc" : "asc";?>"><span>Número</span><span class="sorting-indicator"></span></a></th>
                <th class="manage-column sorted <?php echo ($orderby=="nameFile" && $order == "asc") ? "desc" : "asc";?>"><a href="admin.php?page=list-whatsapp&orderby=nameFile&order=<?php echo ($orderby=="nameFile" && $order == "asc") ? "desc" : "asc";?>"><span>Nome do Arquivo</span><span class="sorting-indicator"></span></a></th>
                <th class="manage-column sorted <?php echo ($orderby=="created" && $order == "asc") ? "desc" : "asc";?>"><a href="admin.php?page=list-whatsapp&orderby=created&order=<?php echo ($orderby=="created" && $order == "asc") ? "desc" : "asc";?>"><span>Data</span><span class="sorting-indicator"></span></a></th>
                <th><a href="javascript:void(0)">Ações</a></th>
            </tr>
            <?php foreach($whatsapp as $item):
            ?>
            <tr class="alternate">
                <th class="check-column" scope="row"><input type="checkbox" value="<?php echo $item->id;?>" name="whatsapp[]" /></th>
                <td><?php echo $item->number_whatsapp;?></td>
                <td><?php echo $item->nameFile;?></td>
                <td><?php echo date("d/m/Y",strtotime($item->created));?></td>
                <td>
                    <a href="admin.php?page=list-whatsapp&whatsid=<?php echo $item->id;?>&action=edit">Editar</a>
                    <a href="admin.php?page=list-whatsapp&whatsid=<?php echo $item->id;?>&action=delete">Deletar</a>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
        <div class="tablenav top">
            <input type="submit" name="export-selecteds" value="Exportar selecionados" />
        </div>
        </form>
    </div>
    <?php 
endif; 
?>