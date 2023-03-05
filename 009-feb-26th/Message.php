<?php
include_once "Model.php";
class Message extends Model
{
  public $adresse_exp, $sujet, $date_envoi, $contenu, $etat;

  public function __construct($adresse_exp, $sujet, $date_envoi, $contenu, $etat)
  {
    $this->$adresse_exp = $adresse_exp;
    $this->$sujet = $sujet;
    $this->$date_envoi = $date_envoi;
    $this->$contenu = $contenu;
    $this->$etat = $etat;
  }


  public static function mapToModel(array $dbRecord)
  {
    return new Message(
      $dbRecord['adresse_exp'],
      $dbRecord['sujet'],
      $dbRecord['date_envoi'],
      $dbRecord['contenu'],
      $dbRecord['etat']
    );
  }

}
