<?php
class homeController extends controller {

	public function index() {
		//Instancia a Model
		$n = new Noticias();
		//Define o limite de paginas
		$page_limit = 5;
		//Instancia a classe do Curl
		$curl = new curlController;
		$i = 1;
		$page = 0;
		// Verifica enquanto a pagina for menor do que o limite
		while($i <= $page_limit)
		{
			
			$url = "https://www.gov.br/compras/pt-br/acesso-a-informacao/noticias?b_start:int=".$page."";
			$result[] = $curl->getPage($url);
			$i++;
			$page += 30;
		}
		foreach($result as $r)
		{
			//Faz um loop no retorno e insere no banco
			foreach($r as $line)
			{
				$sub = trim($line['sub']);
				$titulo = trim($line['titulo']);
				$data = trim($line['data']);
				$desc = trim($line['desc']);
				$urli = trim($line['url']);
			    try {
					$n->insertNoticias($sub,$titulo,$data,$desc,$urli);
				} catch (Exception $e){
					echo 'Exceção capturada: ',  $e->getMessage(), "\n";
				}
				
			}
		}
		echo 'Registros importados com sucesso!';
	

	}

}