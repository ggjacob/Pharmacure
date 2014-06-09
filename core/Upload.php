<?php
// DEBUT DE CLASSE UPLOAD abciweb.net version 2.4
class Telechargement
{

private $index_ses = 'Up5+TzUdDfgt';
private $reload_page = false;
private $extensions_autorisees = null;
private $ses_mes;
private $ses_vis;
private $ses_etat;
private $index_mes;
private $index_etat;
private $repertoire;
private $renomme = false;
private $mode_renommage_incr = false;
private $controle_fichier = false;
private $controle_img = false;
private $verif_ext;
private $file_form;
private $verif_post;
private $verif_get;
private $adresse_repertoire;
private $dim_image_source = null;
private $nouveau_nom = null;
private $nouveau_nom_ext = null;

private $redimension = array();
private $qualite = 88;

private $tab_mes = array(
0 => 'Le poids total maximum du formulaire autorisé par le serveur est dépassé',
1 => 'téléchargé dans le dossier',
2 => 'renommé',
3 => 'problème lors du transfert du fichier',
4 => 'extension non autorisée. Extensions autorisées :',
5 => 'non valide. Veuillez renommer votre fichier avant le téléchargement',
6 => 'ce fichier existe déjà',
7 => 'n\'est pas une image valide. Types de fichiers images autorisés : gif, jpg, jpeg, png',
8 => 'excède la taille maximale de fichier autorisée par le serveur',
9 => 'excède la taille maximale de fichiers autorisée dans le formulaire',
10 => 'non téléchargé. Problème lors du téléchargement vers le serveur',
11 => 'a une résolution trop importante pour être traité. Envoyez un fichier avec une résolution inférieure',
12 => 'problème lors de la création de l\'image intermédiaire. Fichier non traité',
13 => 'problème lors du redimensionnement',
14 => 'problème lors du transfert du fichier redimensionné',
15 => 'redimensionné en',
16 => 'optimisé en',
17 => 'nom de destination du fichier non valide.',
18 => 'téléchargement OK',
19 => 'Nombre maximum autorisé de fichiers en téléchargement simultané : ',
20 => 'Le nombre maximum autorisé de fichiers en téléchargement simultané est dépassé. Seuls les fichiers suivants ont été traités :',
21 => 'x', //Caractère séparant les dimensions des images dans le tableau des messages et le tableau des résultats
22 => ' Suggestion possible : '
);






public function __construct ($repertoire = null, $verif_post = null, $file_form = null, $verif_get = null, $tab_message = null)
{      
	if (!session_id()) session_start();

		 
	$this->repertoire = trim($repertoire);
	$this->verif_post = trim($verif_post);
	$this->file_form = trim($file_form);
	$this->verif_get = trim($verif_get);
	
	$this->Verif_param();
	$this->Verif_repertoire($this->repertoire);
	
	$this->index_mes = $this->verif_post.' '.$this->file_form.'mes';                      
	$this->index_etat = $this->verif_post.' '.$this->file_form;

	$this->ses_mes[$this->index_mes] =& $_SESSION[$this->index_ses][$this->index_mes]; 
	$this->ses_etat[$this->index_etat] =& $_SESSION[$this->index_ses][$this->index_etat];
	
	if (isset($tab_message)) $this->Set_Tab_messages($tab_message);
	
	$this->Verif_max_post();
	$this->Verif_max_nb_fichiers();
}





// FONCTIONS DE CONTROLE DES DONNEES WEBMESTRE
private function Verif_param ()
{
	try
		{
			if($this->repertoire === '' || $this->verif_post === '' || $this->file_form === '')
												 
			throw new Exception('Les trois premiers paramètres de la classe de téléchargement de fichiers, correspondant :<br /><br />- 1/ Au nom du répertoire de destination  <br />- 2/ Au nom du champ $_POST de contrôle d\'envoi du formulaire  <br />- 3/ Au nom du champ $_FILES du formulaire<br /><br /> DOIVENT ETRE RENSEIGNES<br />');                                          
		}
											 
	catch(Exception $e)
			 
		{
			echo $e->getMessage ();
			exit;
		}      
}





private function Verif_repertoire ($rep)
{                              
	try
		{                                                              
			if (!is_dir($this->Adresse_repertoire($rep)))
				{
					throw new Exception('- Chemin du dossier de destination "'.$this->Adresse_repertoire($rep).'" NON VALIDE');
				}
										 
			if (!is_writable($this->Adresse_repertoire($rep)))                  
				{
					throw new Exception('- Chemin du dossier de destination "'.$this->Adresse_repertoire($rep).'" NON ACCESSIBLE EN ECRITURE');
				}
																			 
		}
											 
	catch(Exception $e)
			 
		{
			echo $e->getMessage();
			exit;
		}
}              





private function Verif_tab_extension ()
{            
	try
		{
			if(is_array($this->extensions_autorisees))                                                    
				{
					if(count($this->extensions_autorisees) > 0)  
																																				
						$this->verif_ext = true;
						else
						$this->verif_ext = false;
				}                  
				else if ($this->controle_img === false && count($this->redimension) == 0)
				{
					throw new Exception("Par sécurité, vous devez employer la fonction \"Set_Extensions_accepte\" pour envoyer un tableau d'extensions autorisées après l'initialisation de la classe et avant l'utilisation de la fonction d'upload, excepté si vous employez la fonction \"Set_Controle_dimImg\" qui contrôle des images de type gif, jpg, jpeg ou png, ou si vous employez la fonction \"Set_Redim\" de redimensionnement des images qui effectue ces mêmes contrôles.<br /><br />Alternativement, si vous ne souhaitez pas vérifier l'extension des fichiers, envoyez un tableau vide.");            
				}
		}
																											 
	catch(Exception $e)
											 
		{
			echo $e->getMessage();
			exit;
		}
}





private function Verif_tab_messages ($tab)
{                              
	try
		{                                                              
			if (!is_array($tab))
				{
					throw new Exception('- Le tableau des messages envoyé en paramètre n\'est pas un tableau valide. Il doit correspondre au tableau suivant : <br >');
				}
									 
			if (count($tab) !== count($this->tab_mes))                  
				{
					throw new Exception('- Le tableau des messages envoyé en paramètre n\'a pas le nombre d\'éléments nécessaire (= '.count($this->tab_mes).') correspondant aux libellés suivants : <br >');
				}																		 
		}
											 
	catch(Exception $e)
			 
		{
			echo $e->getMessage();
			echo '<pre>';
			print_r($this->tab_mes);
			echo '</pre>';
			exit;
		}
}              





private function Verif_nouveau_nom ($nom, $param = null)
{
	try
		{                                                              
			$nom_fichier = $this->Nettoie_Nom_fichier($nom);
			 
			if($nom_fichier === false)
				{
					throw new Exception('- Le nom de fichier "'.$nom.'" n\'est pas un nom de fichier valide.');
				}      
					 
			if($nom_fichier !== $nom)
				{
					throw new Exception('- Le nom de fichier "'.$nom.'" n\'est pas un nom de fichier valide. Suggestion possible : "'.$nom_fichier.'"');
				}                                                                                          
		}

	catch(Exception $e)
			 
		{
			if (empty($param))
				{
					echo $e->getMessage();
					exit;
				}
				else
				{
					$suggestion = $nom_fichier !== false && $nom_fichier !== $nom && !empty($this->tab_mes[22]) ? $this->tab_mes[22].$nom_fichier : null;
					if (!empty($this->tab_mes[17])) $this->Set_message('', '', '"'.$nom.'" : '.$this->tab_mes[17].$suggestion);
					$this->nouveau_nom = false;
				}
		}
}              





// FONCTIONS PUBLIQUES  
// Set_public
public function Set_Extensions_accepte ($extensions_autorisees)
{
	$this->extensions_autorisees = $extensions_autorisees;
}





public function Set_Renomme_fichier ($incr = null)
{
	if (isset($incr) && trim($incr) !== '') $this->mode_renommage_incr = true;
										 
	$this->renomme = true;
}





public function Set_Nomme_fichier ($nom = null, $extension = null, $param = null)
{
	$nom = trim($nom);
	$param = trim($param);
	
	$this->Verif_nouveau_nom($nom,$param);
										 
	$this->nouveau_nom = isset($this->nouveau_nom)? $this->nouveau_nom : $nom;
	 
	if(isset($extension) && trim($extension) != '') $this->nouveau_nom_ext = true;
}





public function Set_Controle_fichier ()
{
	$this->controle_fichier = true;
}





public function Set_Controle_dimImg ()
{
	$this->controle_img = true;
}





public function Set_Message_court ($message = null)
{
	$this->tab_mes[1] = null;
	if(isset($message) && trim($message) !== '') $this->tab_mes[18] = $message;
}





public function Set_Separateur_dimImg ($separateur = null)
{
	if(isset($separateur) && trim($separateur) !== '') $this->tab_mes[21] = trim($separateur);
}





public function Set_Redim ($largeur_max = null, $hauteur_max = null, $rep_redim = null, $qualite = null, $limit_redim = null)
{											 
	$rep_redim = !empty($rep_redim) && trim($rep_redim) != '' ? trim($rep_redim) : $this->repertoire;
				 
	if($rep_redim != $this->repertoire) $this->Verif_repertoire($rep_redim);
				 
				 
	$largeur_max =  isset($largeur_max) && trim($largeur_max) != '' ? trim($largeur_max) : null;
	$this->redimension[$rep_redim]['L_max'] = is_numeric($largeur_max) && !empty($largeur_max) ? abs(intval($largeur_max)) : null;
				 
	$hauteur_max = !empty($hauteur_max) && trim($hauteur_max) != '' ? trim($hauteur_max) : null;
	$this->redimension[$rep_redim]['H_max'] = is_numeric($hauteur_max) && !empty($hauteur_max) ? abs(intval($hauteur_max)) : null;
				 
	$qualite = !empty($qualite) && trim($qualite) != '' ? trim($qualite) : null;
	$this->redimension[$rep_redim]['Qualite'] = is_numeric($qualite) && $qualite > 0 && $qualite < 101 ? intval($qualite) : $this->qualite;
				 
	$this->redimension[$rep_redim]['Limit_redim'] = isset($limit_redim) && trim($limit_redim) != '' ? false : true;
}





public function Set_Tab_messages ($tab = null)
{
	$this->Verif_tab_messages($tab); 

	$this->tab_mes = array_map('trim',$tab);
}




// Get_public
public function Get_Tab_message ()
{
	if (isset($this->ses_mes[$this->index_mes]))
		{
			$tab_result = $this->ses_mes[$this->index_mes];
												 
			$this->ses_mes[$this->index_mes] = null;
												 
			return $tab_result;
		}
											 
	else return array();                          
}





public function Get_Tab_upload ()
{  
	if (isset($this->ses_etat[$this->index_etat]))
										 
		{
			$tab_result = array();

			$infos_formulaire = explode(' ',$this->index_etat);
				 
			$tab_result['identifiant'] = $infos_formulaire[0];
												 
			$tab_result['champ'] = isset($infos_formulaire[1])? $infos_formulaire[1] : '';
												 
			$tab_result['resultat'] = array();
												 
															 
			foreach($this->ses_etat[$this->index_etat] as $num => $rep)
				{                                          
					foreach ($rep as $key => $value)      
						{
							$infos_fichier = explode(' ',$value);
																																
							$tab_result['resultat'][$num][$key]['nom'] = $infos_fichier[0];
							$tab_result['resultat'][$num][$key]['dim'] = isset($infos_fichier[1])? $infos_fichier[1] : '';        
						}
				}

			$this->ses_etat[$this->index_etat] = null;
												 
			return $tab_result;
		}
													 
		else return array();
}      





public function Get_Reload_page ()
{
	header("Location:".$_SERVER['PHP_SELF']);
	exit;  
}      





public function Return_Octets($val)
{
	$val = trim($val);
	$last = strtolower($val[strlen($val)-1]);

	switch($last)
			{
				case 'g':  $val *= 1024;
				case 'm': $val *= 1024;
				case 'k':  $val *= 1024;
			}

	return $val;
}







// UPLOAD MOTEUR
public function Upload ($reload = null)
{
	if (isset($reload) && trim($reload) != '') $this->reload_page = true;
										 
	$this->Upload_Liste();
}





// FONCTION UPLOAD : Liste (dans le cas d'un tableau) le champ spécifié de type $_FILES et envoie le résultat à la fonction Upload_fichier puis effectue ou non un reload
private function Upload_Liste ($reload = null)
{             
	$this->Verif_tab_extension();
	
																																																	
	if (isset($_POST[$this->verif_post],$_FILES[$this->file_form]))
	{                       
		$localfile = $_FILES[$this->file_form]['name'];
																										
		if (is_array($localfile))
		{      
			foreach ($localfile as $index_champ => $nom_fichier)
				{
					$nom_local = $_FILES[$this->file_form]['name'][$index_champ];
					$nom_temp = $_FILES[$this->file_form]['tmp_name'][$index_champ];
					$erreur = $_FILES[$this->file_form]['error'][$index_champ];	
					
					$this->Upload_fichier ($index_champ,$nom_local,$nom_temp,$erreur);
				}																												
		 }                                
		 else                                      
		 {
			$nom_local = $_FILES[$this->file_form]['name'];
			$nom_temp = $_FILES[$this->file_form]['tmp_name'];
			$erreur = $_FILES[$this->file_form]['error'];
																													
			$this->Upload_fichier (0,$nom_local,$nom_temp,$erreur);
		}
																										 
		if ($this->reload_page === true) $this->Get_Reload_page();                       
	}            
}





// FONCTION UPLOAD FICHIER          
private function Upload_fichier ($index_champ, $nom_local, $nom_temp, $erreur)
{			 
	$adresse_fichier = $this->Verif_upload_fichier($index_champ, $nom_local, $nom_temp, $erreur);
				 
	if ($adresse_fichier === false) return false;
																 
	if ($this->renomme === true) $adresse_fichier = $this->Rename_fich($adresse_fichier);


	if (count($this->redimension) > 0)
	{
		$redim = $this->Redim_liste ($index_champ, $nom_local, $nom_temp, $adresse_fichier);
									 
		if($redim === false) return false;
		
		if (array_key_exists($this->repertoire,$this->redimension)) return false;
	}

										 
	if (@move_uploaded_file($nom_temp, $adresse_fichier))
	{
		$nom_fichier = basename($adresse_fichier);
															 
		$resultat1 = !empty($this->tab_mes[1]) ? '"'.$nom_local.'" '.$this->tab_mes[1].' "'.$this->repertoire.'"' : null;
		$resultat2 = !empty($this->tab_mes[1]) && !empty($this->tab_mes[2]) ? '"'.$nom_local.'" '.$this->tab_mes[2].' "'.$nom_fichier.'" '.$this->tab_mes[1].' "'.$this->repertoire.'"' : null;

		$resultat = $nom_local === $nom_fichier ?  $resultat1 : $resultat2;
		
		if (isset($resultat)) 
		$this->Set_message ($this->repertoire, $index_champ, $resultat);
		else
		$this->Set_message ($this->repertoire, $index_champ, '"'.$nom_local.'" '.$this->tab_mes[18]);

		if (($this->controle_img === true || count($this->redimension) > 0) && isset($this->dim_image_source))
			{
				$dim = implode($this->tab_mes[21],$this->dim_image_source);
																			 
				$this->Set_result ($this->repertoire, $index_champ, $nom_fichier.' '.$dim);
			}                                                                      
			else 
			{
				$this->Set_result ($this->repertoire, $index_champ, $nom_fichier);
			}
	}                          
	else      
	{
		if (!empty($this->tab_mes[3])) $this->Set_message ($this->repertoire, $index_champ, '"'.$nom_local.'" '.$this->tab_mes[3]);
		$this->Set_result ($this->repertoire, $index_champ, false);
															 
		@unlink($nom_temp);
	}
}





// FONCTION VERIF UPLOAD FICHIER
private function Verif_upload_fichier ($index_champ, $nom_local, $nom_temp, $erreur)
{  
	// Si $erreur != 0 problème lors de l'upload ou champ vide (=4)      
	if ($erreur !== 0)                    
		{
			if ($erreur != 4) 
				{
					if ($this->Files_erreur($erreur,$nom_local) != null) $this->Set_message ($this->repertoire, $index_champ, $this->Files_erreur($erreur,$nom_local));
				}
												 
			$this->Set_result ($this->repertoire, $index_champ, false);
			
			return false;
		}                  


	// Si le témoin de vérification "$this->verif_ext" sur les extensions retourne true
	if ($this->verif_ext === true)                                                  
		{
			 if ($this->Verif_extension($nom_local) === false)
				{
					$liste_extensions = implode(', ',$this->extensions_autorisees);
														 
					if (!empty($this->tab_mes[4])) $this->Set_message ($this->repertoire, $index_champ, '"'.$nom_local.'" '.$this->tab_mes[4].' '.$liste_extensions);
					
					$this->Set_result ($this->repertoire, $index_champ, false);
					
					return false;                                      
				 }      
		}


	//Si nouveau_nom et nouveau_nom_ext définis -> nouveau_nom prend l'extension du fichier téléchargé
	if (isset($this->nouveau_nom) && $this->nouveau_nom !== false)
		{
			$nom_fichier = isset($this->nouveau_nom_ext)? $this->nouveau_nom.'.'. strtolower(substr($nom_local,strrpos($nom_local, ".")+1)) : $this->nouveau_nom;
		}        

	// Nettoyage du nom de fichier pour avoir un nom de fichier valide sur le serveur
	if(!isset($this->nouveau_nom)) $nom_fichier = $this->Nettoie_Nom_fichier($nom_local);
	
	// A ce niveau du script soit $nom_fichier est défini soit $this->nouveau_nom est défini et est égal à false
	// Si $nom_fichier est défini et égal à false ou si $this->nouveau_nom est défini et égal à false => on sort
	if ((isset($nom_fichier) && $nom_fichier === false) || (isset($this->nouveau_nom) && $this->nouveau_nom === false))
		{
			if (isset($this->nouveau_nom) && $this->nouveau_nom === false) //$this->nouveau_nom === false défini par la fonction  "Verif_nouveau_nom" qui enregistre également un message d'information correspondant
			 
				return false;
				 
				else
				{
					if (!empty($this->tab_mes[5])) $this->Set_message ($this->repertoire, $index_champ, '"'.$nom_local.'" '.$this->tab_mes[5]);
														 
					$this->Set_result ($this->repertoire, $index_champ, false);

					return false;
				}
		 }

	// Si l'on a employé la fonction "Set_Controle_fichier"                                
	if ($this->controle_fichier === true)
		{
			if (is_file($this->Adresse_repertoire($this->repertoire).$nom_fichier))
				{
					$nom = isset($this->nouveau_nom)? $this->nouveau_nom : $nom_local;
					 
					if (!empty($this->tab_mes[6])) $this->Set_message ($this->repertoire, $index_champ, '"'.$nom.'" '.$this->tab_mes[6]);
														 
					$this->Set_result ($this->repertoire, $index_champ, false);
					
					return false;
				}                      
		}
																		 
																		 
	// Si l'on a employé la fonction "Set_Controle_dimImg"
	if ($this->controle_img === true && count($this->redimension) == 0)
		{
			$this->dim_image_source = null;
												 
			$infos_images = $this->Infos_image($nom_temp);
												 
			if ($infos_images === false)
				{                                                      
					if (!empty($this->tab_mes[7])) $this->Set_message ($this->repertoire, $index_champ, '"'.$nom_local.'" '.$this->tab_mes[7]);
					$this->Set_result ($this->repertoire, $index_champ, false);
																																																																
					return false;
				}
				else
				{
					$this->dim_image_source = array_slice($infos_images, 0, 2);
				}
		}

	// Si on arrive ici c'est que tout c'est bien passé et l'on retourne l'adresse de destination du fichier
	return $this->Adresse_repertoire($this->repertoire).$nom_fichier;																															
}





private function Set_message ($repertoire = null, $index = null, $message)
{
	if (isset($index) && is_numeric($index)) $this->ses_mes[$this->index_mes][$index][$repertoire] = $message;
										 
	else
										 
	$this->ses_mes[$this->index_mes]['mes'][] = $message;
}





private function Set_result ($repertoire = null, $index, $message)
{              
	$this->ses_etat[$this->index_etat][$index][$repertoire] = $message;
}





private function Verif_extension ($fichier)
{
	$extension = strtolower(substr($fichier,strrpos($fichier, ".")+1));
						 
	if (in_array($extension,$this->extensions_autorisees))
						 
	return true;
	else
	return false;                  
}





private function Verif_max_post()
{   
	if (isset($_GET[$this->verif_get]))
	{
		if (!isset($_POST[$this->verif_post]))
			{
				if (!empty($this->tab_mes[0])) $this->Set_message ('', '', $this->tab_mes[0]);
				
				$this->Get_Reload_page ();                      
			}
	}
	else if (function_exists('error_get_last'))
	{
		$derniere_erreur = error_get_last();
		if(isset($derniere_erreur) && $derniere_erreur['type'] == 2 && strpos($derniere_erreur['message'],'POST Content-Length') !== false)
			{
				if (!empty($this->tab_mes[0])) $this->Set_message ('', '', $this->tab_mes[0]);
				
				$this->Get_Reload_page ();                      
			}
	}
}





private function Verif_max_nb_fichiers()
{
	if (function_exists('error_get_last'))
	{
		$derniere_erreur = error_get_last();
		if(isset($derniere_erreur) && $derniere_erreur['type'] == 2 && strpos($derniere_erreur['message'],'Maximum number of allowable file uploads has been exceeded') !== false)
		{
			$nbmax = ini_get('max_file_uploads');
			$nbmax = $nbmax != false && is_numeric($nbmax) ? $nbmax : null;
			
			if(isset($nbmax,$this->tab_mes[19])) $this->Set_message ('', '', $this->tab_mes[19].$nbmax);
			
			if(isset($this->tab_mes[20])) $this->Set_message ('', '', $this->tab_mes[20]);
		}
	}
}





private function Adresse_racine()
{
	$adresse_racine = (substr($_SERVER['DOCUMENT_ROOT'],-1) == '/')? $_SERVER['DOCUMENT_ROOT'] : $_SERVER['DOCUMENT_ROOT'].'/' ;
										 
	return $adresse_racine;
}              




											 
private function Adresse_repertoire($rep)
{
	return $this->Adresse_racine().$rep.'/';
}





public function Nettoie_Nom_fichier($nom_fichier)
{
	$cible = array(
	'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ă', 'Ą',
	'Ç', 'Ć', 'Č', 'Œ',
	'Ď', 'Đ',
	'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ă', 'ą',
	'ç', 'ć', 'č', 'œ',
	'ď', 'đ',
	'È', 'É', 'Ê', 'Ë', 'Ę', 'Ě',
	'Ğ',
	'Ì', 'Í', 'Î', 'Ï', 'İ',
	'Ĺ', 'Ľ', 'Ł',
	'è', 'é', 'ê', 'ë', 'ę', 'ě',
	'ğ',
	'ì', 'í', 'î', 'ï', 'ı',
	'ĺ', 'ľ', 'ł',
	'Ñ', 'Ń', 'Ň',
	'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ő',
	'Ŕ', 'Ř',
	'Ś', 'Ş', 'Š',
	'ñ', 'ń', 'ň',
	'ò', 'ó', 'ô', 'ö', 'ø', 'ő',
	'ŕ', 'ř',
	'ś', 'ş', 'š',
	'Ţ', 'Ť',
	'Ù', 'Ú', 'Û', 'Ų', 'Ü', 'Ů', 'Ű',
	'Ý', 'ß',
	'Ź', 'Ż', 'Ž',
	'ţ', 'ť',
	'ù', 'ú', 'û', 'ų', 'ü', 'ů', 'ű',
	'ý', 'ÿ',
	'ź', 'ż', 'ž',
	'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р',
	'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'р',
	'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я',
	'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'
	);
				 
	$rempl = array(
	'A', 'A', 'A', 'A', 'A', 'A', 'AE', 'A', 'A',
	'C', 'C', 'C', 'CE',
	'D', 'D',
	'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'a', 'a',
	'c', 'c', 'c', 'ce',
	'd', 'd',
	'E', 'E', 'E', 'E', 'E', 'E',
	'G',
	'I', 'I', 'I', 'I', 'I',
	'L', 'L', 'L',
	'e', 'e', 'e', 'e', 'e', 'e',
	'g',
	'i', 'i', 'i', 'i', 'i',
	'l', 'l', 'l',
	'N', 'N', 'N',
	'O', 'O', 'O', 'O', 'O', 'O', 'O',
	'R', 'R',
	'S', 'S', 'S',
	'n', 'n', 'n',
	'o', 'o', 'o', 'o', 'o', 'o',
	'r', 'r',
	's', 's', 's',
	'T', 'T',
	'U', 'U', 'U', 'U', 'U', 'U', 'U',
	'Y', 'Y',
	'Z', 'Z', 'Z',
	't', 't',
	'u', 'u', 'u', 'u', 'u', 'u', 'u',
	'y', 'y',
	'z', 'z', 'z',
	'A', 'B', 'B', 'r', 'A', 'E', 'E', 'X', '3', 'N', 'N', 'K', 'N', 'M', 'H', 'O', 'N', 'P',
	'a', 'b', 'b', 'r', 'a', 'e', 'e', 'x', '3', 'n', 'n', 'k', 'n', 'm', 'h', 'o', 'p',
	'C', 'T', 'Y', 'O', 'X', 'U', 'u', 'W', 'W', 'b', 'b', 'b', 'E', 'O', 'R',
	'c', 't', 'y', 'o', 'x', 'u', 'u', 'w', 'w', 'b', 'b', 'b', 'e', 'o', 'r'
	);
		 
	$nom_fichier = str_replace($cible, $rempl, $nom_fichier);

	$nom_fichier = preg_replace('#[^.a-z0-9_-]+#i', '', $nom_fichier);
						 
	if (trim($nom_fichier) !== '')						 
	return $nom_fichier;
	else
	return false;
}





private function Rename_fich($adresse_fichier)
{
	if (is_file($adresse_fichier))
		{
			$info = pathinfo($adresse_fichier);
			$extension = isset($info['extension'])? '.'.$info['extension'] : null;
			$dossier = $info['dirname'];
			$basename = $info['basename'];

			$filename = isset($extension) && strrpos($basename,$extension) !== false ? substr($basename,0,strrpos($basename,$extension)) : $basename;
			
			if ($this->mode_renommage_incr === true)
				{
					$file = addcslashes($filename,'.');
					
					$ext = isset($extension) ? addcslashes($extension,'.') : null;
										
					$match = isset($extension)? '#^'.$file.'_[0-9]+'.$ext.'$#' : '#^'.$file.'_[0-9]+$#';
					
					$tab_identique = array();
					
					if(class_exists('RegexIterator'))
						{
							$files = new RegexIterator(new DirectoryIterator($dossier),$match);
							foreach ($files as $fileinfo) $tab_identique[] = $fileinfo->getFilename();
						}	
						else
						{	
							$files = new DirectoryIterator($dossier);			
							foreach ($files as $fileinfo) if (preg_match($match,$fileinfo->getFilename())) $tab_identique[] = $fileinfo->getFilename();	
						}
					
					natsort($tab_identique);
					
					$dernier = array_pop($tab_identique);
					
					unset($tab_identique);
								
					
					$dernier = isset($dernier)? basename($dernier,$extension) : '';																																			
					
					$file = preg_replace_callback('#([0-9]+$)#', create_function('$matches','return $matches[1]+1;'), $dernier, '1', $count);
									 
					$filename = !empty($count)? $file : $filename.'_1';
					
				}
				else
				{
					$filename .= '_'.uniqid();
				}
																														 
			$filename = !empty($extension) ? $filename.$extension : $filename;
															 
																					 
			$adresse = $dossier.'/'.$filename;
			
			if (!is_file($adresse)) return $adresse;
			else																													
			return $this->Rename_fich($adresse_fichier);                        
	}
																					 
	else 
	{
		return $adresse_fichier;
	}
}




			 
private function Files_erreur ($file_error, $nom_fichier)
{
	$message = null;
						 
	switch ($file_error)
		{
			case "1" : $message = !empty($this->tab_mes[8]) ? '"'.$nom_fichier.'" '.$this->tab_mes[8] : null; break;
			case "2" : $message = !empty($this->tab_mes[9]) ? '"'.$nom_fichier.'" '.$this->tab_mes[9] : null; break;
			case "3" :
			case "4" :
			case "6" :
			case "7" :
			case "8" : $message = !empty($this->tab_mes[10]) ? '"'.$nom_fichier.'" '.$this->tab_mes[10] : null; break;
		}          

	return $message;
}





private function Enoughmem ($x, $y, $max_mem, $rgb = 3) 
{	
	if (function_exists('memory_get_usage')) 
		{
			//http://www.php.net/manual/fr/function.imagecreatetruecolor.php#99623
			return ( $x * $y * $rgb * 1.7 < $max_mem - memory_get_usage() );
		}
	else return true;
}





private function Infos_image ($fich)
{
	$types_accepte = array(1,2,3);
	 
	$infos = @getimagesize($fich);     
				 
	if (!empty($infos[0]) && !empty($infos[1]) && !empty($infos[2]) && in_array($infos[2],$types_accepte))
				 
	return array($infos[0], $infos[1], $infos[2]);                 
	else       
	return false;
}





private function Redim_liste ($index_champ, $nom_local, $nom_temp, $adresse_fichier)
{                              
	$info_image = $this->Infos_image ($nom_temp);
	 
	$this->dim_image_source = null;

	if ($info_image === false)            
	{
		if (!empty($this->tab_mes[7])) $this->Set_message ($this->repertoire, $index_champ, '"'.$nom_local.'" '.$this->tab_mes[7]);
		$this->Set_result ($this->repertoire, $index_champ, false);
																																				
		return false;
	}
	else
	{
		$this->dim_image_source = array_slice($info_image, 0, 2);
	}      
 
	$dim_max = true;
 
	if ($info_image[2] == 2)               
	{                      
		$m_limit = ini_get('memory_limit');
		$m_limit = $m_limit !== false ? $this->Return_Octets($m_limit) : $m_limit;

		if ($m_limit !== false && !$this->Enoughmem($info_image[0],$info_image[1],$m_limit))
			{
				$dim_max = false;                                      
			}
	}

	$nouvelle_image = $dim_max === true ? $this->Image_create ($nom_temp, $info_image[2]) : false;

	$nom_fichier = basename($adresse_fichier);

	foreach ($this->redimension as $rep => $value)
	{
		if($dim_max === false)
			{
				if (!empty($this->tab_mes[11])) $this->Set_message ($rep, $index_champ, '"'.$nom_local.'" '.$this->tab_mes[11]);
				$this->Set_result ($rep, $index_champ, false);
				
				break;
			}
 
 
		if ($nouvelle_image === false && $dim_max === true)
			{
				if (!empty($this->tab_mes[12])) $this->Set_message ($rep, $index_champ, '"'.$nom_local.'" '.$this->tab_mes[12]);
													 
				$this->Set_result ($rep, $index_champ, false);
				 
				break;
			}

		$largeur_max = $value['L_max'];
		$hauteur_max = $value['H_max'];
		$qualite = $value['Qualite'];
		$limit_redim = $value['Limit_redim'];                          

		$redimensionnement = true;

		if(empty ($largeur_max) && empty ($hauteur_max))
			{
				$largeur_destination = $info_image[0];
				$hauteur_destination = $info_image[1];
				$redimensionnement = false;
			}
			else          
			{
				$ratio_orig = $info_image[0]/$info_image[1];
							 
				if(!empty ($largeur_max) && empty ($hauteur_max))
					{                      
						$largeur_destination = intval ($largeur_max);
						$hauteur_destination = intval ($largeur_max/$ratio_orig);
					}
					else if (empty ($largeur_max) && !empty ($hauteur_max))
					{      
						$largeur_destination = intval ($hauteur_max*$ratio_orig);
						$hauteur_destination = intval ($hauteur_max);
					}
					else
					{
						$ratioh = $hauteur_max/$info_image[1];
						$ratiow = $largeur_max/$info_image[0];
						$ratio = min($ratioh, $ratiow);
	 
						$largeur_destination = intval ($ratio*$info_image[0]);
						$hauteur_destination  = intval ($ratio*$info_image[1]);        
					}

				if(($largeur_destination > $info_image[0] || $hauteur_destination > $info_image[1]) && $limit_redim === true)
					{
						$largeur_destination = $info_image[0];
						$hauteur_destination = $info_image[1];
						$redimensionnement = false;
					}      
			}


		if ($redimensionnement && $nouvelle_image !== false)
			{    
				$dim_desti = true;
				 
				if ($info_image[2] == 2)               
					{
						if ($m_limit !== false && !$this->Enoughmem($largeur_destination,$hauteur_destination,$m_limit))
						$dim_desti = false;
					}

				$ressource = $dim_desti == true ? @imagecreatetruecolor ($largeur_destination, $hauteur_destination) : false;
							 
				if (!is_resource ($ressource))
					{
						if (!empty($this->tab_mes[11])) $this->Set_message ($rep, $index_champ, '"'.$nom_local.'" '.$this->tab_mes[11]);
															 
						$this->Set_result ($rep, $index_champ, false);

						break;
					}

				$redimensionnement = @imagecopyresampled ($ressource, $nouvelle_image, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, $info_image[0], $info_image[1]);
							 
				if ($redimensionnement == false)
					{
						if (!empty($this->tab_mes[13])) $this->Set_message ($rep, $index_champ, '"'.$nom_local.'" '.$this->tab_mes[13]);
															 
						$this->Set_result ($rep, $index_champ, false);

						break;
					}
											 
											 
				$envoi = $this->Envoi_image ($ressource, $this->Adresse_repertoire($rep).$nom_fichier, $info_image[2], $qualite);
							 
				@imagedestroy($ressource);

				if ($envoi === false)
					{
						if (!empty($this->tab_mes[14])) $this->Set_message ($rep, $index_champ, '"'.$nom_local.'" '.$this->tab_mes[14]);
															 
						$this->Set_result ($rep, $index_champ, false);

						break;
					}
								 
					else
								 
					{						
						$resultat1 = !empty($this->tab_mes[15]) && !empty($this->tab_mes[1]) ? '"'.$nom_fichier.'" '.$this->tab_mes[15].' '.$largeur_destination.$this->tab_mes[21].$hauteur_destination.' '.$this->tab_mes[1].' '.$rep.'' : null;
						
						$resultat2 = !empty($this->tab_mes[15]) && !empty($this->tab_mes[1]) && !empty($this->tab_mes[2]) ? '"'.$nom_local.'" '.$this->tab_mes[2].' "'.$nom_fichier.'" '.$this->tab_mes[15].' '.$largeur_destination.$this->tab_mes[21].$hauteur_destination.' '.$this->tab_mes[1].' '.$rep.'' : null;

						$resultat = $nom_local === $nom_fichier ?  $resultat1 : $resultat2;
		
						if (isset($resultat)) 
						$this->Set_message ($rep, $index_champ, $resultat);
						else
						$this->Set_message ($rep, $index_champ, '"'.$nom_local.'" '.$this->tab_mes[18]);

						$dim = $largeur_destination.$this->tab_mes[21].$hauteur_destination;
																	 
						$this->Set_result ($rep, $index_champ, $nom_fichier.' '.$dim);
					}
			}

			else if ($nouvelle_image !== false)
					 
			{
				$envoi = $this->Envoi_image ($nouvelle_image, $this->Adresse_repertoire($rep).$nom_fichier, $info_image[2], $qualite);
							 
				if ($envoi === false)
					{
						if (!empty($this->tab_mes[3])) $this->Set_message ($rep, $index_champ, '"'.$nom_local.'" '.$this->tab_mes[3]);
															 
						$this->Set_result ($rep, $index_champ, false);
																													
						break;
					}
					else
					{
						$resultat1 = !empty($this->tab_mes[16]) && !empty($this->tab_mes[1]) ? '"'.$nom_fichier.'" '.$this->tab_mes[16].' '.$largeur_destination.$this->tab_mes[21].$hauteur_destination.' '.$this->tab_mes[1].' '.$rep.'' : null;
						
						$resultat2 = !empty($this->tab_mes[16]) && !empty($this->tab_mes[1]) && !empty($this->tab_mes[2]) ? '"'.$nom_local.'" '.$this->tab_mes[2].' "'.$nom_fichier.'" '.$this->tab_mes[16].' '.$largeur_destination.$this->tab_mes[21].$hauteur_destination.' '.$this->tab_mes[1].' '.$rep.'' : null;

						$resultat = $nom_local === $nom_fichier ?  $resultat1 : $resultat2;
		
						if (isset($resultat)) 
						$this->Set_message ($rep, $index_champ, $resultat);
						else
						$this->Set_message ($rep, $index_champ, '"'.$nom_local.'" '.$this->tab_mes[18]);
						
									 
						$dim = $largeur_destination.$this->tab_mes[21].$hauteur_destination;
																	 
						$this->Set_result ($rep, $index_champ, $nom_fichier.' '.$dim);
					}			 
			}											 
	}
	
	@imagedestroy($nouvelle_image);
}





private function Image_create($fich, $type)
{
	switch ($type)
		{
			case "1" : $nouvelle_image = @imagecreatefromgif($fich); break;
			case "2" : $nouvelle_image = @imagecreatefromjpeg($fich); break;
			case "3" : $nouvelle_image = @imagecreatefrompng($fich); break;
						 
			default : $nouvelle_image = null;
		}
					 
	if (is_resource($nouvelle_image))
 
	return $nouvelle_image;
	else
	return false;
}





private function Envoi_image($ressource, $destination, $type, $qualite)
{              
	switch ($type)
		{
			case "1" : $envoi = @imagegif($ressource, $destination); break;
			case "2" : $envoi = @imagejpeg($ressource, $destination, $qualite); break;
			case "3" : $qualite = $qualite == 0 ? 1 : $qualite;
					$qualite = 10 - ceil($qualite/10);                          
					$envoi = @imagepng($ressource, $destination, $qualite); break;
						 
			default : $envoi = false;
		}
								 
	if ($envoi != false)
				 
	return true;  
	else
	return false;
}

}
//FIN DE CLASSE

?>