<?php
class curlController extends controller {

	public function __construct() {
		
		//Seta as configuracoes do cURL na construct da classe
		$this->ch = curl_init();
		curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->ch, CURLOPT_HEADER, 0);
		
	}

	//Metodo para acessar as paginas e resgatar informacoes 
	public function getPage($url) {
		
		curl_setopt($this->ch, CURLOPT_URL, $url);
		$content = curl_exec($this->ch);
		return $this->getArticles($content);
		
	}

	private function getArticles($content) {
		
		$dom = new DOMDocument();
		@$dom->loadHTML($content);
		$finder = new DOMXPath($dom);
		$classArticle = 'tileItem';
		
		$nodes = $finder->query("//*[contains(@class, '$classArticle')]");
		foreach ($nodes as $node)
		{
			$sub = '';
			$desc = '';
			$urli = '';
			
			//Prepara Titulo 
			$titulo = $node->childNodes[1]->childNodes[1]->nodeValue;	
			
			//Verifica se existe sub
			if($node->childNodes[1]->childNodes[3] && !$node->childNodes[1]->childNodes[5])
				{
					$sub = $node->childNodes[1]->childNodes[3]->nodeValue;
					$urli = $node->childNodes[1]->childNodes[3]->childNodes[1]->getAttribute('href');

				}
				
			//Verifica se existe sub e descricao
			if($node->childNodes[1]->childNodes[6])
				{
					$sub = $node->childNodes[1]->childNodes[3]->nodeValue;
					$desc = $node->childNodes[1]->childNodes[5]->nodeValue;
					$urli = $node->childNodes[1]->childNodes[3]->childNodes[1]->getAttribute('href');

				}
			
			//Verifica se a Url foi preenchida de acordo com as regras acima, senão preenche buscando atributo correto
				if($urli === ''){
				$urli = $node->childNodes[1]->childNodes[1]->childNodes[1]->getAttribute('href');
			}
			
			
			//Prepara Data e hora e coloca no array
			$str = str_replace(' ','', $node->childNodes[3]->nodeValue);
			preg_match('/(\d{2}\/)+(\d{4})\s*(\d{2}h\d{2})/', $str, $match);
			$htodot = str_replace('h', ':', $match[0]);
			$datetime = str_replace('/','-',$htodot);
			$dtimef = date('Y-m-d h:i:s',strtotime($datetime));
			
			//Grava num array o resultado
			$data[] = [
				'sub' => $sub,
				'titulo' => $titulo,
				'data' => $dtimef,
				'desc' => $desc,
				'url' => $urli
			];	
			
		}

		return $data;

	}
	

	

}