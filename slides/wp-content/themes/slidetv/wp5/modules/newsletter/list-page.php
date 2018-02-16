<?php
if(isset($_GET["action"]) && $_GET["action"] == "edit"){
    
    $data = reset(Newsletter::getNewsletterById($_GET["newsid"]));
?>
<div class="wrap">
    <h2>Editar Cadastrado</h2>
    
    <form action="admin.php?page=list-newsletter" method="POST">
    <table class="form-table">
        <tr class="valign-top">
            <th><label for="newsletterName">Nome:</label></td>
            <td><input type="text" name="name" id="newsletterName" value="<?php echo $data->name;?>" style="width:300px" /></td>
        </tr>
        <tr class="valign-top">
            <th><label for="newsletterEmail">E-mail:</label></td>
            <td><input type="text" name="email" id="newsletterEmail" value="<?php echo $data->email;?>" style="width:300px" /></td>
        </tr>
    </table>
    <p class="submit">
        <input type="hidden" name="id" value="<?php echo $data->id;?>" />
        <input type="submit" name="Submit" value="Atualizar" />
    </p>
    </form>

<?php }else{
    
    $orderby = (isset($_GET["orderby"])) ? $_GET["orderby"] : 'name';
    $order = (isset($_GET["order"])) ? $_GET["order"] : 'asc';

    $newsletter = Newsletter::getNewsletter($orderby,$order);
    
?>
<div class="wrap">
    <h2>Lista de Cadastrados</h2>
    <div class="tablenav top">
        <div class="alignleft actions">
            <a href="admin.php?page=export-newsletter">Exportar todos em csv</a>
        </div>
    </div>
    
    <form action="admin.php?page=export-newsletter&action=export-selecteds" method="POST">
        <div class="tablenav top">
        <input type="submit" name="export-selecteds" value="Exportar selecionados" />
    </div>
    <table class="wp-list-table widefat fixed posts">
        <tr>
            <th id="cbNews" class="manage-column column-cb check-column"><input type="checkbox" /></th>
            <th class="manage-column sorted <?php echo ($orderby=="name" && $order == "asc") ? "desc" : "asc";?>"><a href="admin.php?page=list-newsletter&orderby=name&order=<?php echo ($orderby=="name" && $order == "asc") ? "desc" : "asc";?>"><span>Nome</span><span class="sorting-indicator"></span></a></th>
            <th class="manage-column sorted <?php echo ($orderby=="email" && $order == "asc") ? "desc" : "asc";?>"><a href="admin.php?page=list-newsletter&orderby=email&order=<?php echo ($orderby=="email" && $order == "asc") ? "desc" : "asc";?>"><span>E-mail</span><span class="sorting-indicator"></span></a></th>
            <th class="manage-column sorted <?php echo ($orderby=="created" && $order == "asc") ? "desc" : "asc";?>"><a href="admin.php?page=list-newsletter&orderby=created&order=<?php echo ($orderby=="created" && $order == "asc") ? "desc" : "asc";?>"><span>Data</span><span class="sorting-indicator"></span></a></th>
            <th><a href="javascript:void(0)">Ações</a></th>
        </tr>
        <?php foreach($newsletter as $item):?>
        <tr class="alternate">
            <th class="check-column" scope="row"><input type="checkbox" value="<?php echo $item->id;?>" name="news[]" /></th>
            <td><?php echo $item->name;?>
            </td>
            <td><?php echo $item->email;?></td>
            <td><?php echo date("d/m/Y",strtotime($item->created));?></td>
            <td>
                <a href="admin.php?page=list-newsletter&newsid=<?php echo $item->id;?>&action=edit">Editar</a>
                <a href="admin.php?page=list-newsletter&newsid=<?php echo $item->id;?>&action=delete">Deletar</a>
            </td>
        </tr>
        <?php endforeach;?>
    </table>
    <div class="tablenav top">
        <input type="submit" name="export-selecteds" value="Exportar selecionados" />
    </div>
    </form>
    
</div>
<?php }?>