<div class="area">
    <h1>Opções Rodrigo Pacheco</h1>

    <div id="tabs">
        <ul>
            <li><a href="#tab-1">Geral</a></li>
            <li><a href="#tab-2">Destinatários E-mail</a></li>
            <li><a href="#tab-3">Item</a></li>
            <li><a href="#tab-4">Item</a></li>
            <li><a href="#tab-5">Item</a></li>
            <li><a href="#tab-6">Item</a></li>
        </ul>
        <form method="post" action="options.php" enctype="multipart/form-data" class="formOption">
            <?php settings_fields("options-group", "options-list"); ?>
            <div id="tab-1" class="box-input">
                <h2>Geral </h2>
                <label>Código Analytics</label>
                <textarea cols="70" rows="14" name="analytics_code"><?php echo get_option("analytics_code"); ?></textarea>

<!--                 <label>Endereço:</label>
                <input type="text" name="address" value="<?php echo get_option("address"); ?>" style="width: 250px;" />
              
                <label>Bairro:</label>
                <input type="text" name="district" value="<?php echo get_option("district"); ?>" style="width: 250px;" />

                <label>Estado / Cidade:</label>
                <input type="text" name="city" value="<?php echo get_option("city"); ?>" style="width: 250px;" />

                <label>Cep:</label>
                <input type="text" name="cep" value="<?php echo get_option("cep"); ?>" style="width: 250px;" />

                <label>Telefone:</label>
                <input type="text" name="phone" value="<?php echo get_option("phone"); ?>" style="width: 250px;" />

                <label>WhatsApp:</label>
                <input type="text" name="whatsapp" value="<?php echo get_option("whatsapp"); ?>" style="width: 250px;" /> -->
            </div>
            <div id="tab-2" class="box-input">
                <h2>Endereços </h2>
                
                <label>E-mail geral:</label>
                <input type="text" name="email_public" value="<?php echo get_option("email_public"); ?>" style="width: 250px;" />
                
                <label>Material de Campanha:</label>
                <input type="text" name="email_three" value="<?php echo get_option("email_three"); ?>" style="width: 250px;" />

                <label>Imprensa</label>
                <input type="text" name="email_one" value="<?php echo get_option("email_one"); ?>" style="width: 250px;" />

                <label>Trabalhe Conosco:</label>
                <input type="text" name="email_two" value="<?php echo get_option("email_two"); ?>" style="width: 250px;" />
              
                <label>Material de Campanha:</label>
                <input type="text" name="email_three" value="<?php echo get_option("email_three"); ?>" style="width: 250px;" />
            </div>
            <div id="tab-3" class="box-input">
            </div>
            <div id="tab-4" class="box-input">
            </div>
            <div id="tab-5" class="box-input">
            </div>
            <div id="tab-6" class="box-input">
            </div>
            <input type="submit" value="Salvar" name="salvar"/> 
        </form>
    </div>
    <div class="content">
        <img src="<?php bloginfo("stylesheet_directory"); ?>/config_panel/img/logo-admin.png" alt="" style="width: 100%;"/>
        <h2 style="line-height: 26px;">Opções do tema Rodrigo Pacheco</h2>
        <p>Esta área é destinada para configurações específicas do tema Rodrigo Pacheco.</p>
        <p>Tendo a finalidade de tratar itens específicos que o portal necessite.</p>
        <!-- <a href="http://orodigital.com.br" title="Oro digital" alt="Oro Digital" target="_blank">
            <img src="<?php //bloginfo("stylesheet_directory"); ?>/config_panel/img/oro_ouro.png" title="Oro digital" alt="Oro Digital"/>
        </a> -->
    </div>
</div>