<?php get_header(); the_post(); 

$terms = wp_get_post_terms($post->ID,'Area'); 


$args = array('taxonomy' => 'proposals');


$args = array('post_type' => 'proposals','field' => $terms->ID, 'terms' => $terms->slug);

$posts = get_posts($args);

$terms = get_the_terms( $post->ID , 'Area');
if($terms) {
    foreach( $terms as $term ) {
		$nome = $term->name;
		$slug = $term->slug;
		$id =  $term->term_taxonomy_id;
    }
}

$argments = array(
	'post_type' => 'proposals',
	'tax_query' => array(
	    array(
	        'taxonomy' => 'Area',
	        'field' => 'term_id',
	        'terms' => $id
	    )
	)
);



$query = new WP_Query($argments);

?>
<section id="internas">
	<div class="row">
		<div class="col-md-12">
			<div class="mask">
				<div class="imgEventGalerie">
					<img class="sgallerie" src="<?php echo get_template_directory_uri() ?>/dist/imgs/banner_pequeno.png" alt="">
				</div>
				<div class="mask-hover">
					<div class="col-md-6 col-md-offset-3 title-page">
						<?php foreach ($terms as $term): ?>
	          				<h1><?php echo $term->name ; ?></h1>
	          			<?php endforeach ?>
					</div>
					<div class="col-md-4 col-md-offset-4 title-page">
						<nav class="iconsMedia">
				          	<p>
				          		<a id="a_menos" class="diminuir" alt="Diminuir tamanho do texto" title="Diminuir tamanho do texto"><span class="rp-minus"></span></a>
								<a id="a_mais" class="aumentar" alt="Aumentar tamanho do texto" title="Aumentar tamanho do texto"><span class="rp-plus"></span></a>
								<a id="contraste" href="#" onclick="setActiveStyleSheet('normal'); return false;"><span class="rp-contrast"></a>
								<a id="contrasteOne"  href="#" onclick="setActiveStyleSheet('contraste'); return false;" style="display:none;"><span class="rp-contrast"></a>
				          	</p>
				        </nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="propostas">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-4 col-md-offset-4">
					<select name="tipo-proposta" id="tipo-proposta" style="width:100%;margin-bottom:3rem;margin-top:2rem;">
						<option value="">Filtre por Área</option>
						<option value="<?php bloginfo('url'); ?>/area/cultura">Cultura</option>
						<option value="<?php bloginfo('url'); ?>/area/desenvolvimento-economico">Desenvolvimento Econômico</option>
						<option value="<?php bloginfo('url'); ?>/area/educacao">Educação</option>
						<option value="<?php bloginfo('url'); ?>/area/esporte-e-lazer">Esporte e Lazer</option>
						<option value="<?php bloginfo('url'); ?>/area/funcionalismo-publico">Funcionalismo Público</option>
						<!--<option value="<?php bloginfo('url'); ?>/area/governanca">Governança</option>-->
						<option value="<?php bloginfo('url'); ?>/area/infraestrutura-e-servicos-urbanos">Infraestrutura e Serviços Urbanos</option>
						<option value="<?php bloginfo('url'); ?>/area/meio-ambiente">Meio ambiente</option>
						<option value="<?php bloginfo('url'); ?>/area/mobilidade-urbana">Mobilidade Urbana</option>
						<option value="<?php bloginfo('url'); ?>/area/planejamento-e-gestao">Planejamento e Gestão</option>
						<option value="<?php bloginfo('url'); ?>/area/politicas-sociais">Políticas Sociais</option>
						<option value="<?php bloginfo('url'); ?>/area/saude">Saúde</option>
						<option value="<?php bloginfo('url'); ?>/area/seguranca">Segurança</option>
						<option value="<?php bloginfo('url'); ?>/area/tecnologia-e-inovacao">Tecnologia e Inovação</option>
						<option value="<?php bloginfo('url'); ?>/area/transparencia">Transparência</option>
						<option value="<?php bloginfo('url'); ?>/area/vilas-e-favelas">Vilas e Favelas</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="container">
				<div class="col-md-12">
					<div class="col-md-4 col-md-offset-4">
					<a class="anchorPropostaDownload" href="http://rodrigo15.com.br/wp-content/uploads/2016/09/Plano-de-Governo-RODRIGO15.pdf" download onclick="ga('send', 'event', 'link','click', 'Download Proposta');" style="margin-top:3rem ;">Baixar o Plano de governo</a>
					</div>
				</div>
			</div>
		</div>

  	</div>
</section>
<section id="internas" style="margin-top:0;">
	<div class="row">
		<div class="container">
			<div class="col-md-12">
				<?php 
					switch ($id) {
                        //Cultura
					    case 98:
					        ?>
					        <div class="col-md-12 content">
					        <p>É compromisso da gestão Rodrigo Pacheco promover a cultura, levando-se em conta as políticas que valorizam o nosso patrimônio histórico e os movimentos culturais, gerando emprego e renda para o cidadão.</p>

								<strong style="color:#7a4f89">PROPOSTAS</strong>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Criar as Rotas de Turismo de Minas Gerais, colocando Belo Horizonte como cidade central
								da região e, a partir da capital, traçar roteiros culturais. Entre eles, Grutas e Cavernas, Cidades
								Históricas e Museus.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Resgatar e valorizar a história da cidade, suas características históricas e algumas de suas
								novas referências de cultura, como a cultura popular, de vilas e favelas, entre outras.
								Implantar as Casas de Cultura nas regionais, trazendo as expressões culturais de cada localidade
								e transformando-as em instrumento de desenvolvimento, educação e combate às
								drogas, retirando as crianças e adolescentes das ruas.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Implantar um corredor de arte, cultura, lazer e gastronomia, por meio da Rua Viva.
								Expandir os investimentos em cultura para todas as regiões da cidade, apoiando os Pontos
								de Cultura nos bairros.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Investir na manutenção e na conservação de prédios públicos de relevante fator cultural e histórico,
								buscando suas origens e disponibilizando-os para a apreciação e a visitação do público.
								Investir na manutenção da arquitetura do entorno da Lagoa da Pampulha.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Apoiar os diversos tipos de manifestação cultural oriundos das vilas e favelas.
								Viabilizar a realização de espetáculos internacionais de música, teatro e exposições na cidade,
								trazendo Belo Horizonte para o circuito cultural internacional.</p>


								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Viabilizar novos centros de exposições e convenções na cidade.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Resgatar a autoestima do belo-horizontino, melhorando a plástica da cidade e apresentando
								roteiros culturais para os moradores da cidade conhecerem as atrações.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Incentivar as escolas de samba e agremiações da cidade, ampliando o carnaval de rua e os
								seus blocos.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Viabilizar o programa Prefeitura Amiga do Circo, disponibilizando local para a montagem
								de circos itinerantes.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Apoiar e incentivar o calendário de eventos, tais como: carnaval, Semana Santa, Parada do
								Orgulho LGBT, coletivos culturais, festivais, dança de ruas, entre outros.</p>
							</div>
					        <?php
					        break;
					    //Desenvolvimento Econômico
					    case 18:
					        ?>
					        <div class="col-md-12 content">

								<p>A Prefeitura Integral vai incentivar o crescimento econômico e social visando à geração de emprego, de trabalho e de renda.</p>


								<strong style="color:#7a4f89">PROPOSTAS</strong>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Integração da Região Metropolitana: articular e negociar a integração de Belo Horizonte aos
								municípios da Região Metropolitana, com o objetivo de potencializar investimentos, novos
								projetos públicos e arranjos econômicos, aumentando o intercâmbio comercial via ampliação
								dos investimentos e do mercado consumidor.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar a geração de emprego e de renda em Belo Horizonte a partir da transformação
								da cidade em polo cultural e comercial por meio de: programas de valorização e qualificação
								do comércio popular; montagem de uma rede de apoio ao comércio sofisticado e
								ao turismo de negócios, cultural e ecológico; montagem de uma rede de equipamentos
								de formação de recursos humanos voltados para atividades culturais, científicas e tecnológicas;
								recuperação da área cultural da cidade e sua transformação no principal equipamento
								de lazer e vivência da cidade.</p>

								<strong style="color:#7a4f89">COMO FAZER:</strong>

								<p class="destaque">Criar o Centro do Pequeno Empreendedor – CEPEM com foco no desenvolvimento
								econômico, incentivando a parceria entre Prefeitura, SEBRAE e outros órgãos e instituições
								afins, além do pequeno empreendedor.</p>

								<p class="destaque">Viabilizar a implantação do Porto Seco, aproveitando a localização privilegiada e central
								de Belo Horizonte, equidistante das grandes capitais do país. Isso facilitará o trabalho
								e a logística de muitas empresas e, para a cidade, será uma nova oportunidade de
								movimentar a economia.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Incentivar o desenvolvimento de alternativas científicas e tecnológicas locais, de baixo
								impacto ambiental e socialmente relevante, para solucionar os problemas gerados pelo
								atual modelo de crescimento da cidade, realizando parcerias com instituições de ensino
								e pesquisa e organizações do terceiro setor, bem como implementando programas nacionais
								adequados às demandas locais.</p>

								<strong style="color:#7a4f89">COMO FAZER:</strong>

								<p class="destaque">Incentivar a Indústria Tecnológica, pois BH é uma cidade onde 75% de suas atividades
								estão ligadas à prestação de serviços. Sua estrutura e localização privilegiada, central e
								de fácil direcionamento de logística para dentro e fora do estado, está preparada para
								abrigar empresas e indústrias de produção tecnológica, tais como: energias alternativas
								(energia solar e eólica), eletrônicas etc.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Apoiar e incentivar a implantação da economia solidária.</p>

								<strong style="color:#7a4f89">COMO FAZER:</strong>

								<p class="destaque">Estruturar a Economia Solidária fazendo o levantamento do potencial técnico e profissional
								da população local e incentivando a formação de microempreendimentos para
								atender à comunidade, principalmente àquela que vive em risco social. Além disso,
								colaborar na criação de cooperativas produtivas que podem compartilhar seus bens e
								serviços com as regiões vizinhas e com a própria Prefeitura.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Simplificar o processo de emissão de Alvará de Funcionamento de Empreendimentos, reduzindo
								o prazo e a burocracia e ampliando a integração dos sistemas da Prefeitura com os
								dos órgãos de licenciamento.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar o número de serviços da PBH disponibilizados pela Internet e por telefones móveis.</p>
								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Articular, juntamente com os prefeitos da RMBH, a integração da oferta de serviços, indústria
								e comércio da região.</p>


								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Desenvolver roteiros turísticos, incluindo atrações locais e das cidades circunvizinhas,
								transformando BH em polo turístico para os belo-horizontinos, mineiros e para todo o
								Brasil e o mundo.</p>

								<strong style="color:#7a4f89">COMO FAZER:</strong>

								<p class="destaque">Criar roteiros culturais dentro de BH e parcerias com as cidades vizinhas, proporcionando
								a ampliação de ofertas na cultura, na gastronomia, no entretenimento e no
								lazer para o turista, além do acolhimento na rede hoteleira local.</p>

								<p class="destaque">Construir um novo centro de convenções para colocar Belo Horizonte no mapa dos
								eventos nacionais e internacionais, gerando mais oportunidades, emprego e renda.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Desenvolver o programa de Inteligência Tributária, visando incentivar setores de interesse
								do município.</p>

								<strong style="color:#7a4f89">COMO FAZER:</strong>

								<p class="destaque">Implementar a Nova Política Tributária, que proporcionará melhores condições para as
								empresas que estejam buscando um local para instalação. BH precisa rever suas práticas
								e buscar uma política tributária mais atraente para os investidores.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Desenvolver a indústria verde e criativa aproveitando melhor os recursos, competências e
								empreendedores locais, aproveitando a vocação natural da cidade.</p>

								<strong style="color:#7a4f89">COMO FAZER:</strong>

								<p class="destaque">Transformar BH em uma cidade verde, entendendo que o que é descartado pode se
								tornar fonte de energia, emprego e renda por meio da reciclagem e do beneficiamento.
								Ver o lixo como uma oportunidade para buscar formas sustentáveis de desenvolvimento
								econômico.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Incentivar a implantação de empresas dos setores de microeletrônicos, tecnologia da
								informação, ensino, biotecnologia, indústria de diagnósticos, aeronáutica, turismo, moda,
								saúde e cervejarias artesanais, dentre outras.</p>

								<strong style="color:#7a4f89">COMO FAZER:</strong>

								<p class="destaque">Redução de impostos municipais para os segmentos.</p>

								<p class="destaque">Criar estrutura para abrigar projetos e empreendimentos em fase de implantação,
								também chamados de incubadoras.</p>

								<p class="destaque">Oferecer, por meio de convênios, treinamento e qualificação de mão de obra.</p>
								
								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Desenvolver o turismo cultural e de negócios.</p>

								<strong style="color:#7a4f89">COMO FAZER:</strong>

								<p class="destaque">Implantar o Corredor Cultural e de Lazer entre a Praça da Estação e a Praça da Liberdade,
								interligadas pela Rua da Bahia, em conexão com a Praça de Santa Tereza.  A Rua da Bahia será requalificada como uma rua 24 horas, a Rua Viva, com amplos
								calçadões, boulevard e cobertura transparente em alguns trechos, abrigando bares
								e restaurantes tradicionais, como os do Maletta. Nesse corredor, serão instalados
								espaços de multimídia, rede wi-fi, cafés, cervejarias, bibliotecas, museus, lojas de
								conveniência e espaços para apresentação de arte popular e shows.</p>
							</div>
					        <?php
					        break;
					    //Educação
					    case 7:
					        ?>
					        <div class="col-md-12 content">

					        	<p>A Prefeitura Integral acredita que a população de Belo Horizonte, principalmente as crianças, precisa de uma educação de qualidade aliada a uma constante promoção do educador, criando cidadãos conscientes e com chances iguais de obter um futuro melhor.</p>

								
								<strong style="color:#7a4f89">PROPOSTAS</strong>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Melhorar a qualidade do ensino básico e buscar a equidade na Rede Municipal de Ensino,
independente das condições social, econômica, étnico-racial e cultural da população.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Promover a avaliação e a adequação dos processos e das metodologias de ensino da Rede
Municipal, reforçando a intencionalidade educativa e possibilitando a inovação e potencialização
da aprendizagem.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Rever o processo de cadastramento e matrícula de crianças nas UMEIs.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Aumentar o investimento na educação infantil com a ampliação de vagas pautadas no contínuo
crescimento da qualidade, com garantia de oferta a todas as crianças de quatro a
cinco anos e ampliação na faixa de zero a três anos.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Desenvolver e implantar sistema de tecnologia da informação capaz de receber todas as
informações dos alunos e transmiti-las aos responsáveis, para melhoria do controle de frequência
e notas, aumentando a relação da família com a escola.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Valorizar e investir nos professores e gestores escolares, promovendo a formação continuada,
por meio de parcerias com instituições de ensino da capital, além de melhorias nas
condições de trabalho para esses profissionais.</p>


								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Aumentar a disponibilidade de vagas no Programa Escola Integrada (PEI), com uma forte
articulação com as áreas do esporte, da ciência e da cultura, ampliando as atividades extracurriculares,
principalmente nas regiões de maior vulnerabilidade.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Equipar as escolas municipais com bibliotecas abertas à população e infraestrutura de informática
para atender aos alunos e à comunidade.</p>

							</div>
					        <?php
					        break;
				        //Esporte e Lazer
				        case 99:
					        ?>
					        <div class="col-md-12 content">

					        <p>Incentivar o esporte e o lazer, por meio de políticas para o bem-estar dos belo-horizontinos, é compromisso da Prefeitura Integral.</p>

								<strong style="color:#7a4f89">Propostas</strong>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Incrementar a utilização das Academias a Céu Aberto em parceria com a Secretaria Municipal
								de Saúde, de Educação e de Esportes, buscando parcerias com entidades particulares
								para aulas e acompanhamento da população nas atividades.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar o projeto Domingo a Rua é Nossa para todos os bairros, criando um ponto de referência
								de lazer e entretenimento para a população.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar o número de bicicletários próximo a parques, atrações turísticas, estações de ônibus
								e metrô, estimulando a população a utilizar esse modal para pequenos deslocamentos,
								integração entre transportes e lazer.</p>


								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar as ações do projeto Ruas de Lazer para todos os bairros, em parceria com a iniciativa
								privada e com associações de bairro.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Incentivar as competições das regionais de Belo Horizonte, apoiando os times de várzea e
								melhorando as condições dos campos da PBH.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Criar mecanismos para a redução da obesidade, trabalhando parcerias com empresas privadas,
								clubes e academias para a disponibilização de vagas para pessoas de baixa renda.</p>

								Utilizar toda a estrutura deixada pela Copa de 2014 e pelas Olimpíadas de 2016 para trazer
								para a cidade eventos nacionais e internacionais de esporte, colocando BH na rota esportiva
								nacional.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Atuar juntamente com a Secretaria Municipal de Educação para disponibilizar atividades
								extraclasse de esporte e recreação desenvolvidas pelos programas “Segundo Tempo”, “Esporte
								Esperança”, “Brincando na Vila”, “Domingo a Rua é Nossa”, “Caminhar na Escola”, “Esporte
								para Todos”, “BH Descobrindo Talentos” e outras ações desenvolvidas pela Secretaria Municipal
								de Esporte e Lazer (SMEL), que também contribuem na prevenção do uso de drogas.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Construção e manutenção de pistas de skate em todas as regionais.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar o apoio a eventos esportivos, de ecoturismo e de turismo de aventura que utilizam
								o patrimônio natural.</p>


								<!--<strong style="color:#7a4f89">IDOSOS</strong>

								<p>Ampliar o atendimento ao idoso pelas equipes da ESF – Estratégia de Saúde da Família,
								viabilizando a aplicação de vacinas, exames preventivos e estabelecendo horários diferenciados
								e especiais para o atendimento de consultas eletivas nas UBSs e UPAs.</p></p>

								<p>Disponibilizar leitos preferenciais reservados para idosos nas UPAs, a exemplo dos assentos
								nos ônibus, vagas de estacionamento, filas e caixas de atendimento em bancos e supermercados,
								por exemplo. Dessa forma, os idosos seriam priorizados e, o leito, assegurado.</p></p>

								<p>Com relação ao Centro de Referência da Pessoa Idosa − CRPI, desenvolver medidas imediatas
								para o aumento da segurança e da equipe de atendimento, garantindo o pleno funcionamento
								das atividades.</p></p>

								<p>Estudar a criação de novas unidades do CRPI, mais próximas das regiões Leste, Sul, Nordeste
								e Barreiro, podendo, inclusive, estar alocadas nas Unidades de Vida Articulada, que serão
								criadas na Gestão Rodrigo Pacheco. Com isso, garantiremos o atendimento aos idosos das
								comunidades de vilas e favelas de forma a incluí-los nas atividades da cidade. O CRPI deve
								atuar em parceria com as Secretarias Municipais de Esporte e de Cultura para ampliar o
								número de atividades oferecidas, atuando de forma integral.</p></p>

								<p>Criar o Programa Vocacional do Idoso para que possam atuar como monitores em várias
								frentes da PBH, como na Escola Integral e Posso Ajudar?, entre outros. Os idosos podem
								atuar, por exemplo, em oficinas de contação de histórias para crianças e adolescentes, aproveitando-
								se os profissionais da área de educação, e no Posso Ajudar? dos postos de saúde.</p></p>

								<p>Além da inserção produtiva junto à sociedade, o programa vai aumentar a autoestima e a
								saúde física e mental.</p></p>


								<p>Incluir o atendimento psicológico como uma atividade oferecida pelo CRPI, com o intuito
								de combater e assistir profissionalmente aos casos de depressão do idoso, doença grave já
								reconhecida pela Organização Mundial de Saúde.</p></p>

								<p>Intensificar o trabalho do Conselho do Idoso, que já é deliberativo, com a criação da Secretaria
								Adjunta do Idoso. A população de BH está envelhecendo e a expectativa do número de
								idosos na cidade deve crescer consideravelmente nos próximos anos. Atualmente, o Conselho
								do Idoso está ligado à Secretaria Adjunta de Direitos e Cidadania. A Secretaria Adjunta
								do Idoso ficará responsável por todas as atividades relacionadas a esse público, atuando em
								conjunto com as Secretarias de Saúde, de Transporte, de Educação, entre outras, de forma
								integral, priorizando e respondendo pelas atividades relacionadas aos idosos e tendo à frente
								um profissional da área de geriatria.</p>

								<p>Realizar novo diagnóstico do idoso em BH para redefinir as políticas públicas visando à proteção
								do idoso, além do levantamento do orçamento a eles destinado dentro do orçamento
								geral da PBH.</p>

								<strong style="color:#7a4f89">LGBT</strong>

								<p>Criar um centro de qualificação profissional para a comunidade LGBT, que vai funcionar de
								forma mais efetiva do que o modelo atual, com encaminhamento profissional do segmento
								para o mercado de trabalho. E, ainda, por meio de incentivos, a criação de um selo “Empresa
								cidadã” para aquelas que contratarem profissionais da comunidade LGBT oriundos do plano
								de qualificação da PBH.</p>

								<p>Incluir o tema LGBT no conteúdo de concursos, peças culturais e campanhas para que a
								população possa conviver com o tema por meio de conteúdo orientado, contribuindo para
								a quebra de preconceitos.</p>

								<p>Incentivar, com benefícios mais abrangentes, as companhias e as empresas da área de Cultura
								a explorarem a temática LGBT de forma educativa, por meio da Lei de Patrocínio Cultural.
								Criar um disque-denúncia focado na comunidade com atuação mais efetiva e com mais
								agilidade, formado por uma equipe multidisciplinar para abordar os casos de violência moral
								e física, por exemplo.</p>-->
							</div>
					        <?php
					        break;
					    //Funcionalismo Público
					    case 96:
					        ?>
					        <div class="col-md-12 content">

								<strong style="color:#7a4f89">PROPOSTAS</strong>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar o número de vagas de capacitação e de qualificação para os servidores municipais,
								principalmente para melhorar a qualidade de atendimento ao público.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Assegurar o cumprimento dos direitos dos servidores da PBH, analisando o plano de carreira
								de cada setor e propondo melhorias.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar o Programa de Bonificação por Resultados para todas as secretarias.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Incrementar as ações do Centro de Educação em Saúde (CES), ampliando o número de
								vagas e aprimorando o processo de qualificação continuada dos profissionais do SUS-BH.
								Investir continuamente na atualização dos servidores da Rede Municipal de Ensino (RME),
								em cursos de pós graduação e de mestrado profissional.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Viabilizar a criação da Escola de Governo Municipal, visando formar gestores públicos municipais
								com amplo conhecimento e competência na gestão municipal.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Aprimorar o programa Mesa de Negociação Permanente, abrindo espaço ao diálogo dos
								servidores e de seus representantes com o Prefeito e os Secretários.</p>
							</div>
					        <?php
					        break;
						//Infraestrutura e Serviços Urbanos
						case 101:
					        ?>
					        <div class="col-md-12 content">

					        <p>A Prefeitura Integral vai planejar, de forma consciente, as melhorias estruturais para a cidade e vai aprimorar os serviços oferecidos ao cidadão.</p>

								<strong style="color:#7a4f89">PROPOSTAS</strong>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Investir continuamente na manutenção de espaços públicos, iluminação pública, tapa buraco
								e poda de árvores, entre outros serviços, aumentando o número de equipes nas regionais
								e ampliando a interligação entre o cidadão e a PBH, através de aplicativos móveis e novos
								canais de comunicação.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Reformular a estrutura funcional da SUDECAP, capacitar os servidores das diretorias e criar
								procedimentos operacionais padrão para perenizar o conhecimento.</p>


								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Realizar análise minuciosa e promover a atualização do Plano Diretor, Código de Posturas e
								Código de Obras.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Criar a Mesa Multisetorial de Análise e Aprovação de Projetos, encaminhando de uma só vez
								todos os documentos e dados necessários para o empreendedor ou construtor iniciar seu
								empreendimento.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Transferir e fiscalizar a responsabilidade das concessionárias de água, luz e gás em realizar
								reparos nas vias públicas após intervenções.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Priorizar a eliminação do passivo de obras paradas ou não concluídas do Orçamento Participativo
								(OP).</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Eleger as intervenções prioritárias em vias e em espaços públicos em cada uma das regionais
								e realizá-las nos primeiros meses de governo.</p>
							</div>
					        <?php
					        break;
					    //Meio ambiente e Saneamento Básico
					    case 100:
					        ?>
					        <div class="col-md-12 content">

					        <p>A Prefeitura Integral vai implementar ações sustentáveis, transformando Belo Horizonte, cada dia mais, em uma cidade verde.</p>

								<strong style="color:#7a4f89">PROPOSTAS</strong>

								<p>Dotar os órgãos de fiscalização de recursos materiais e humanos necessários ao correto desempenho
								das atribuições.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Combater as construções irregulares, realizando e mantendo o embargo das obras, bem como
								executando a demolição daquelas que efetivamente estão agredindo o meio ambiente.
								Definir as regras para o Manual de Construção Sustentável, possibilitando incentivos fiscais
								às construtoras que aderirem ao modelo.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Promover a limpeza e a manutenção contínua dos parques e espaços públicos preservados.
								Executar obras de sistemas de esgotamento sanitário que visem aumentar o percentual de
								população atendida.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Estimular a adaptação das edificações já existentes quanto ao uso de componentes e equipamentos
								hidrossanitários de baixo consumo e medição individualizada do volume de água
								consumido.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Elaborar o plano de coleta seletiva e reciclagem, incluídos os resíduos orgânicos, devendo
								contemplar os direitos das associações/cooperativas de catadores garantidos por lei,
								além do estímulo ao número de catadores.</p>

								<strong style="color:#7a4f89">COMO FAZER:</strong>

								<p class="destaque">Transformar BH em uma cidade verde, entendendo que o que é descartado pode
								se tornar fonte de energia, emprego e renda por meio da reciclagem e do beneficiamento.
								Ou seja: ver o lixo como uma oportunidade para buscar formas sustentáveis de
								desenvolvimento econômico.</p>

								<p class="destaque">Ampliar a coleta seletiva para as periferias e investir em educação ambiental, incentivando
								a implantação de empresas de beneficiamento e usinas de energia limpa, criando uma moeda social para gratificação à comunidade, transformando BH em uma cidade verde.</p>

								<p class="destaque">Apoiar os catadores de forma organizada fornecendo equipamentos e locais de armazenamento do lixo reciclável, em transversalidade com o programa de economia solidária.</p>

								<p class="destaque">Estudar a viabilidade da construção de uma usina de transformação do lixo orgânico
								em energia elétrica (experiência de Oslo).</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Fortalecer o programa de coleta seletiva de resíduos recicláveis para aumento da massa de
								resíduos recicláveis desviados da coleta convencional.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Otimizar os roteiros de coleta especial, varrição e limpeza de ruas, com alteração de frequência,
								horários, percursos e pessoal envolvido, de forma a manter a cidade mais limpa.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Projetar e implantar sistema de infiltração e detenção de águas pluviais nas áreas urbanas,
								com prioridade para áreas de maior risco de inundação.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Elaborar projetos visando à minimização de inundações nas áreas delimitadas de alto risco
								de inundação.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Aprimorar o sistema de alerta contra enchentes de forma articulada com a Defesa Civil.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Reduzir o consumo de papel e de materiais descartáveis nos prédios da PBH.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Substituir gradativamente as lâmpadas convencionais por lâmpadas LED nos prédios da PBH.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Criar políticas públicas que garantam que as novas obras e edificações sejam construções
								sustentáveis, que utilizem energia limpa, reaproveitamento de água e iluminação natural,
								dentre outras tecnologias que contribuem para a economia dos recursos naturais.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Incentivar, por meio de revisão dos impostos, que as construções antigas possam fazer uma
								readaptação sustentável. Isso vai transformar a cidade e ainda trazer mais consciência e
								educação ambiental para todos.</p>
							</div>
					        <?php
					        break;
					    //Mobilidade Urbana
					    case 94:
					        ?>
					        <div class="col-md-12 content">

								<p>Resolver o problema do trânsito de Belo Horizonte com soluções integradas de mobilidade urbana.</p>

								<strong style="color:#7a4f89">PROPOSTAS</strong>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Garantir mobilidade urbana de qualidade na cidade, priorizando o transporte coletivo, com
								a integração de todos modais de transporte, de modo a enfrentar conjuntamente as causas
								e os efeitos do desenvolvimento urbano no trânsito e no transporte urbano de passageiros
								e mercadorias.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar o número de vagas e construir novos estacionamentos públicos e bicicletários
								nas principais estações de ônibus e de metrô, aumentando a possibilidade de integração
								dos modais.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Revisar e descentralizar o modelo de ciclorrotas (ciclovias, ciclo faixas e caminhos compartilhados)
								e bicicletários/paraciclos, criando uma rede de bicicletas integrada com todos os
								modais, principalmente na interligação dos bairros com as estações de ônibus.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Assegurar equidade no uso do espaço público de circulação, vias e logradouros, além da
								circulação segura e confortável de passageiros do transporte coletivo, pedestres, ciclistas,
								motociclistas e motoristas individuais.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Viabilizar que as avenidas Cristiano Machado e Pres. Antônio Carlos se tornem vias expressas,
								com a construção de passarelas e intervenções de tráfego, aumentando a fluidez do
								trânsito.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Avaliar todas as intervenções necessárias e efetivá-las, dentro dos limites orçamentários, para
								aumentar a fluidez do trânsito de maneira a atender a todas as regiões de Belo Horizonte.
								Analisar a possibilidade de liberação da pista do MOVE para veículos particulares com 4 ou
								mais passageiros, incentivando a carona solidária.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Estudar, construir e divulgar para a população novas possibilidades de rotas alternativas
								para interligação entre bairros, alterando o tráfego de ruas e de avenidas, construindo novos
								acessos e melhorando a sinalização vertical, de maneira a racionalizar caminhos, minimizar
								os tempos de deslocamento e criar conforto para os usuários.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Realizar estudo e promover a sincronização dos sinais de trânsito, assim como a sua eliminação
								em pontos de pouco fluxo de pedestres e a construção de passarelas para aumentar
								a fluidez.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Articular com as prefeituras da RMBH e viabilizar, juntamente com o governo federal, recursos
								para a construção do Rodoanel Metropolitano.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Articular com os órgãos de trânsito da RMBH a integração e a sincronização dos transportes,
								diminuindo o tempo de espera nas baldeações.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Articular com o governo federal a liberação de recursos para a ampliação do atendimento
								do metrô em Belo Horizonte, tanto no trecho que liga o Barreiro ao Calafate quanto nas demais
								regiões, seja na forma de metrô tradicional, seja de forma inovadora.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Rever o plano de acessibilidade da capital, garantindo o acesso aos prédios públicos, praças
								e vias urbanas, ampliando o número de ônibus e equipamentos com acessibilidade disponíveis
								no sistema de transporte.</p>
							</div>
					        <?php
					        break;
						//Planejamento e Gestão
						case 95:
					        ?>
					        <div class="col-md-12 content">

					        	<p>O governo Rodrigo Pacheco vai assegurar um novo modelo de gestão para priorizar um planejamento baseado em uma abordagem participativa, estabelecendo processos que possam ser acessados publicamente, o tempo todo. Esse modelo de gestão se fundamenta na articulação entre a administração e a população. Nesse sentido, a nova gestão favorecerá a participação dos diferentes segmentos da sociedade.</p>

								<strong style="color:#7a4f89">PROPOSTAS</strong>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Capacitar a gestão tornando-a mais eficaz, eficiente e transparente. A gestão das secretarias
								e cargos estratégicos será feita por pessoas com especialização/qualificação técnica na área.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Implantar um modelo de gestão por desempenho com foco em metas e resultados, regido
								por objetivos, metas e indicadores claramente definidos.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Construir uma gestão pública baseada na transparência, na ética e na austeridade dos gastos
								públicos, promovendo uma relação de confiança entre o governo e a sociedade.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Implantar programas de qualidade a fim de iniciar uma reforma administrativa para a transformação
								da estrutura organizacional, criando uma nova “cultura” na administração municipal.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">A coordenação das mudanças será feita pelo Comitê Interno da Qualidade.</p>


								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Promover a junção de secretarias e autarquias em prédios próprios, reduzindo as despesas
								operacionais da PBH.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Implantar o Centro de Serviços Compartilhados, centralizando as atividades de área por
								meio dos diversos órgãos da Administração Direta da Prefeitura, como Compras, Viagens,
								Recursos Humanos e Patrimônio, dentre outros, visando à otimização de recursos físicos e
								financeiros; padronização e otimização de processos, permitindo qualidade e agilidade nos
								atendimentos das demandas internas a um custo reduzido.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Modernizar a gestão municipal por meio de novos processos de trabalho e de novas tecnologias
								de gestão, visando a uma maior eficiência e redução de custos.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Pactuar com os secretários os Compromissos de Gestão, realizando reuniões mensais com
								o prefeito para análise do status das ações e possíveis correções em metas não atingidas.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Elaborar o Plano Estratégico da PBH, contemplando o Curto (100 dias), médio (primeiro
								ano) e longo prazo.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Reestruturar os principais processos da PBH, visando à redução da burocracia e do prazo.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar as ações do Programa BH Metas e Resultados, promovendo a discussão e a revisão
								das Áreas de Resultado e dos Projetos Sustentadores, aberta à ampla participação dos servidores
								e da sociedade por meio da realização de uma agenda de reuniões internas e de
								audiências públicas, visando tornar essas políticas públicas mais efetivas, garantindo melhor
								alocação dos recursos físicos e financeiros.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Revisar de forma democrática e compartilhada com os servidores municipais e a população
								de Belo Horizonte, por meio dos Conselhos, as metas do Programa BH 2030, adequando-se
								às novas realidades do município.</p>
							</div>
					        <?php
					        break;
					    //Políticas Sociais
					    case 97:
					        ?>
					        <div class="col-md-12 content">

								<p>A Prefeitura Integral tem como objetivo uma sociedade com oportunidades, justa e democrática, implementando políticas sociais que irão melhorar a cidade e a vida de sua população.</p>

								<strong style="color:#7a4f89">PROPOSTAS</strong>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Revitalizar o hipercentro, estimulando a moradia no centro da cidade e a utilização do comércio
								local.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Criar projetos de desenvolvimento econômico e social específicos para cada regional, explorando
								suas vocações e transformando-as em regiões independentes, com ampla rede
								de comércio, serviços e lazer.</p>

								<strong style="color:#7a4f89">COMO FAZER:</strong>

								<p class="destaque">Criar o Banco do Povo, que irá conceder microcrédito sem juros para a população de
								baixa renda para desenvolvimento de empreendimentos produtivos como ferramenta
								de fomento às atividades de subsistência e geração de trabalho e renda.</p>

								<p class="destaque">Prover serviços bancários à população de baixa renda, eliminando a exploração tradicionalmente
								feita por agiotas.</p>

								<p class="destaque">Criar novas oportunidades de autoemprego para a vasta população desempregada na
								cidade de Belo Horizonte.</p>

								<p class="destaque">Trazer a população carente para o seio de um sistema orgânico para que possam compreender
								e administrar sozinhos.</p>

								<p class="destaque">Reverter o antigo círculo vicioso de “baixa renda, baixa poupança e baixo investimento”,
								injetando crédito para torná-lo um círculo virtuoso de “investimento, maior renda, maior
								poupança”.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Criar as UVAs – Unidades de Vida Articulada: os projetos BH Cidadania e Vila Viva, entre
								outros existentes atualmente em BH, serão ampliados e melhorados por meio das UVAs –
								Unidades de Vida Articulada. Os programas sociais serão executados de forma integrada,
								melhorando os resultados junto ao público-alvo.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar o programa habitacional Minha Casa Minha Vida, buscando parceria com o governo
								federal, assistindo um número muito maior de famílias.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Implantar projetos e atividades da Economia Solidária, estimulando a formação de cooperativas
								e associações produtivas, além de microempreendimentos. Profissionais como costureiros,
								cabeleireiros, doceiros, padeiros, entre outros, serão objeto desse programa, que
								contará com apoio financeiro, treinamento e suporte gerencial. Além disso, a Prefeitura dará
								preferência na compra dos produtos da economia solidária, contribuindo, assim, para a geração
								de trabalho e renda nos locais de vulnerabilidade social.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar o programa de Segurança Alimentar orientando o aproveitamento dos alimentos e
								a alimentação de qualidade, nutritiva e bem-feita como fonte de saúde e bem-estar.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar a quantidade de restaurantes populares, levando-os para as regiões de maior demanda
								de trabalhadores e de pessoas que possam se beneficiar com uma alimentação
								mais barata.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Implantar o fornecimento de marmitas às famílias abaixo da linha da pobreza e pessoas das
								áreas de risco e de maior vulnerabilidade.</p>
								Implantar cozinhas comunitárias nas UVAs.</p>
							</div>
					        <?php
					        break;
					    //Saúde
					    case 10:
					        ?>
					        <div class="col-md-12 content">			

								<p>O Plano de Governo de Rodrigo Pacheco contempla um conjunto de propostas para fazer funcionar, em sua integralidade, as equipes de saúde da família, de saúde bucal, os centros de saúde, as unidades de pronto atendimento, os hospitais e os demais equipamentos de saúde do município.</p>

								<strong style="color:#7a4f89">PROPOSTAS</strong>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Garantir e melhorar o acesso da população a serviços de qualidade, com equidade e em
								tempo adequado ao atendimento das necessidades de saúde, mediante o aprimoramento
								da política de atenção básica e da atenção especializada.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Gerenciar a qualidade da atenção à saúde tendo como proposta básica a avaliação de desempenho
								de serviços e prestadores de serviços de saúde.
								Buscar recursos com os governos federal e estadual para garantir o pleno funcionamento do
								Hospital do Barreiro.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Incrementar as ações dos CERSAM (Centro de Referência à Saúde Mental) e CERSAM AD
								(Centro de Referência à Saúde Mental – Álcool e Drogas), aumentando o número de unidades
								e ampliando as equipes.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Melhorar a estrutura física, os equipamentos e os insumos das Unidades de Saúde, sobretudo
								nos Hospitais Municipais e UPAs.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Revisar o Código Sanitário do município a fim de adequá-lo às novas necessidades, melhorando
								o processo e o prazo de emissão do alvará sanitário e intensificando a fiscalização.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Promover a atenção integral à saúde da mulher, dos idosos e da criança, com ênfase nas
								áreas e populações de maior vulnerabilidade.</p>


								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Intensificar as ações rotineiras e permanentes da Prefeitura e de comunicação para o combate
								ao mosquito Aedes aegypti, transmissor dos vírus da dengue, da chikungunya e da zika.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar o atendimento da Atenção Básica em saúde bucal, principalmente com a implantação
								das Equipes de Saúde Bucal na Estratégia Saúde da Família.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar e qualificar a Atenção Especializada, especialmente com a implantação dos Centros
								de Especialidades Odontológicas (CEOs) e a reabilitação protética, realizando visitas
								periódicas às escolas municipais.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Reduzir as filas de espera para consultas especializadas e cirurgias eletivas mediante a parceria
								com os governos estadual e federal, além da disponibilização de mais profissionais de
								saúde e investimento nos programas de prevenção de doenças.</p>
							</div>
					        <?php
					        break;
						//Segurança
						case 11:
					        ?>
					        <div class="col-md-12 content">

								<p>A gestão de Rodrigo Pacheco vai implementar políticas integradas de segurança para que a população e a Prefeitura estejam comprometidas com o combate à violência urbana.</p>

								<strong style="color:#7a4f89">PROPOSTAS</strong>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Modernizar e ampliar a infraestrutura de iluminação pública e vídeomonitoramento, incrementando
								a sala de monitoramento e inserindo servidores cedidos pela PBH para auxiliar
								na Central de Operações da Cidade.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Implementar intervenções em pontos viários de grande incidência de acidentes, construindo
								passarelas e melhorando a passagem de pedestres.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Revitalizar áreas degradadas pelo uso e venda de drogas, juntamente com profissionais da
								saúde, assistentes sociais e guarda municipal.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Equipar e treinar a guarda municipal para que ela se transforme em instrumento de combate
								a delitos de baixo potencial ofensivo.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Promover a integração da base de dados da PBH com as polícias Militar e Civil, ampliando a
								inteligência da gestão de segurança pública e atuando em conjunto na prevenção de crimes.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Elaborar o Plano Municipal de Segurança, visando realizar o levantamento dos principais problemas
								e pontos críticos de cada região de BH e desenvolver ações pontuais para trata-los.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Revitalizar o hipercentro, estimulando a moradia no centro da cidade. Uma maior densidade
								de moradores que vivem e circulam pelo centro ajuda a afastar a criminalidade.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Apoiar as ações da PMMG junto às escolas municipais, como o PROERD, retirando a criança
								e o adolescente do consumo de drogas.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Desenvolver aplicativo para a população realizar denúncias on-line de ocorrências, de forma
								discreta e segura, utilizando o cruzamento da localização da ocorrência com o da viatura
								mais próxima, aumentando a chance de inibição do crime.</p>
							</div>
					        <?php
					        break;
					    //Tecnologia e Inovação
					    case 105:
					        ?>
					        <div class="col-md-12 content">

					        	<p>A Prefeitura Integral vai fazer o uso inteligente da tecnologia disponível, utilizada nas principais cidades do mundo, para se conectar com a população por meio de celulares e de aplicativos. Se as pessoas e as cidades estão conectadas, os serviços públicos também precisam estar.</p>

								<strong style="color:#7a4f89">PROPOSTAS</strong>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar a divulgação e a utilização do BH Resolve Mobile para todos os serviços prestados
								pela PBH.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar os serviços disponibilizados via internet para o cidadão e para as empresas.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Realizar levantamento dos principais processos de emissão de licenças, alvarás e certidões
								da PBH visando à redução do prazo para a execução da solicitação.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar o programa de acesso ao serviço de internet em vilas, favelas, praças e prédios públicos,
								fornecendo internet banda larga sem fio gratuitamente para a comunidade.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Criar aplicativo voltado para sugestões e reclamações sobre o transporte público, táxi e demais
								serviços de mobilidade oferecidos pelo município, dando ao cidadão poder de avaliar,
								propor mudanças e identificar os prestadores de serviço que não se enquadram nos critérios.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Articular juntamente ao governo estadual a criação do Programa Nota Fiscal Mineira, incentivando
								o cidadão a solicitar a Nota Fiscal de produtos e, com isso, receber incentivos fiscais
								oriundos do ICMS.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Criar dispositivo para monitoramento em tempo real das obras da PBH, interligando as medições
								à SUDECAP e Secretaria Municipal de Finanças.</p>
							</div>
					        <?php
					        break;
					    //Transparência
					    case 104:
					        ?>
					        <div class="col-md-12 content">
								<p>Construir uma gestão pública baseada na transparência, na ética e na austeridade dos gastos
								públicos, promovendo uma relação de confiança entre o governo e a sociedade.</p>


								<strong style="color:#7a4f89">PROPOSTAS</strong>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Implantar um modelo de gestão por desempenho com foco em metas e em resultados, regido
								por objetivos, metas e indicadores claramente definidos e dando publicidade aos atos
								da administração municipal perante a população, além dos previstos em leis.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Criar dispositivo para monitoramento em tempo real das obras da PBH, interligando as medições
								à SUDECAP e à Secretaria Municipal de Finanças.</p>
							</div>
					        <?php
					        break;
						//Vilas e Favelas
						case 102:
					        ?>
					        <div class="col-md-12 content">

					        <p>A gestão Rodrigo Pacheco vai garantir aos moradores de vilas e favelas a redução das desigualdades em todas as suas dimensões, com propostas que irão promover o acesso à renda, à cultura, ao lazer, às oportunidades e ao desenvolvimento pessoal e profissional de todos.</p>
					
								<strong style="color:#7a4f89">PROPOSTAS</strong>


								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar o número de Unidades Habitacionais disponibilizadas para moradores de áreas de
								risco geológico muito alto e alto, em condições de vulnerabilidade.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Concluir as obras e as ações que se encontram paralisadas ou em atraso no Orçamento Participativo.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar as ações de melhoria nas condições de saneamento básico e abastecimento de
								água e energia nas vilas e favelas.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Implantar alertas nas localidades com maior risco geológico.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Criar centros comerciais dentro das vilas e favelas, promovendo o artesanato, a produção e o
								comércio local, além de ampliar o número de atividades financeiras na localidade, por meio
								de incentivos e parcerias com entidades de classe e iniciativa privada.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Promover concurso público para a elaboração de novas soluções arquitetônicas de vilas e favelas,
								buscando novas referências e melhorias para os espaços comuns e para as habitações.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Implantar em todas as Unidades Habitacionais disponibilizadas dispositivos de coleta de
								lixo, incentivando a reciclagem e a reutilização de resíduos.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Ampliar a oferta de habitações pelo programa Minha Casa Minha Vida, em parceria com o
								governo federal.</p>

								<p><img src="<?php echo get_template_directory_uri() ?>/dist/imgs/bullet.jpg" alt="" style="margin-right: 15px;border-radius:50%;">Promover a regularização urbanística e jurídica de assentamentos de interesse social ocupados
								de forma irregular por população de baixa renda.</p>
							</div>
					        <?php
					        break;
					}
				?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>