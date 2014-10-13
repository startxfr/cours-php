<?php

	/**
	 * Fonction d'execution d'une requete d'insertion
	 *
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @bug Pas de bug
	 * @note copyright : voir la licence
	 * @param $db l'identifiant de la connection a utilisé. Correspond à une clef du tableau $dbConfig
	 * @param $sql la requete SQL
	 * @return un entier avec le nombre de ligne insérée ou false
	 */
	function doSqlInsert($db,$sql)
	{
		global $dbConfig;
		if(array_key_exists($db,$dbConfig) and strtoupper(substr($sql,0,6)) == 'INSERT')
		{
			$type = $dbConfig[$db]['type'];
			$host = $dbConfig[$db]['host'];
			$base = $dbConfig[$db]['base'];
			$user = $dbConfig[$db]['user'];
			$pass = $dbConfig[$db]['pass'];
			$dbc = new PDO($type.':host='.$host.';dbname='.$base, $user, $pass);
			$count = $dbc->exec($sql);
			$dbc = null;
			return $count;
		}
		else  return false;
	}

	/**
	 * Fonction d'execution d'une requete
	 *
	 * @author	Christophe Larue <clarue@startx.fr>
	 * @bug Pas de bug
	 * @note copyright : voir la licence
	 * @param $db l'identifiant de la connection a utilisé. Correspond à une clef du tableau $dbConfig
	 * @param $sql la requete SQL
	 * @return un tableau avec le résultat ou false
	 */
	function doSqlSelect($db,$sql)
	{
		global $dbConfig;
		if(array_key_exists($db,$dbConfig) and strtoupper(substr($sql,0,6)) == 'SELECT')
		{
			$type = $dbConfig[$db]['type'];
			$host = $dbConfig[$db]['host'];
			$base = $dbConfig[$db]['base'];
			$user = $dbConfig[$db]['user'];
			$pass = $dbConfig[$db]['pass'];
			$dbc = new PDO($type.':host='.$host.';dbname='.$base, $user, $pass);
			foreach ($dbc->query($sql) as $row)
			    $o[] = $row;
			$dbc = null;
			return $o;
		}
		else  return false;
	}
?>