<?php
class Noticias extends model {

	public function insertNoticias($sub,$titulo,$data,$desc,$urli) 
	{
		
		$sql = $this->db->prepare("SELECT url FROM noticias WHERE url = :urli");
		$sql->bindValue(":urli", $urli);
		$sql->execute();

		if($sql->rowCount() == 0) {

			$sql = $this->db->prepare("INSERT INTO noticias SET subtitulo = :sub, titulo = :titulo, descricao = :descricao, data = :data, url = :urli");
			$sql->bindValue(":sub", $sub);
			$sql->bindValue(":titulo", $titulo);
			$sql->bindValue(":descricao", $desc);
			$sql->bindValue(":data", $data);
			$sql->bindValue(":urli", $urli);
			$sql->execute();

			return true;

		} else {
			return false;
		}

	}

}
?>