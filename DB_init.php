
<!-- Copier/Coller le contenu ci-dessous dans tinker pour initialiser
le contenu de la base de données  -->

namespace App;

$user = new User;
$user->id = 1;
$user->username = 'DamienBRGEOIS';
$user->password = bcrypt('password');
$user->email="bourgeois.damien@outlook.fr";
$user->isAdmin = true;
$user->save();

$user = new User;
$user->id = 2;
$user->username = 'DidierGERARD';
$user->password = bcrypt('password');
$user->email="gerard.didier@outlook.fr";
$user->isAdmin = false;
$user->save();

$user = new User;
$user->id = 3;
$user->username = 'AnaisLEFEVRE';
$user->password = bcrypt('password');
$user->email="lefevre.anais@outlook.fr";
$user->isAdmin = false;
$user->save();

$user = new User;
$user->id = 4;
$user->username = 'ValentineBENY';
$user->password = bcrypt('password');
$user->email="beny.valentine@outlook.fr";
$user->isAdmin = false;
$user->save();

$user = new User;
$user->id = 5;
$user->username = 'RaphaelBRGEOIS';
$user->password = bcrypt('password');
$user->email="bourgeois.raphael@outlook.fr";
$user->isAdmin = false;
$user->save();

$projet = new Projet;
$projet->id = 1;
$projet->user_id=1;
$projet->title="Développement d'un site web sous Laravel 5";
$projet->inviteURL = bin2hex(random_bytes(5));
$projet->save();

$projet = new Projet;
$projet->id = 2;
$projet->user_id=3;
$projet->title="Développement d'une API CSS & JavaScript";
$projet->inviteURL = bin2hex(random_bytes(5));
$projet->save();

$tache = new Tache;
$tache->id=1;
$tache->user_id=1;
$tache->projet_id=1;
$tache->title="Apprendre à utiliser Laravel 5";
$tache->body="Visionner tous les tutoriels sur Laracast.com concernaant Laracast 5.";
$tache->done=false;
$tache->save();

$tache = new Tache;
$tache->id=2;
$tache->user_id=3;
$tache->projet_id=1;
$tache->title="Définir une structure de donées";
$tache->body="Déterminer une structure de données permettant de repondre au cahier des charges établi.";
$tache->done=false;
$tache->save();

$tache = new Tache;
$tache->id=3;
$tache->user_id=4;
$tache->projet_id=1;
$tache->title="Trouver un logo pour le site";
$tache->body="Trouver un logo réprésentant le service proposé par le site ainsi que la marque.";
$tache->done=false;
$tache->save();

$tache = new Tache;
$tache->id=4;
$tache->user_id=4;
$tache->projet_id=2;
$tache->title="Définir une charte graphique";
$tache->body="Déterminer une charte graphique que tous les composants de l'API devront respecter.";
$tache->done=true;
$tache->save();

$tache = new Tache;
$tache->id=7;
$tache->user_id=1;
$tache->projet_id=2;
$tache->title="Appliquer la charte graphique";
$tache->body="Appliquer la charte graphique pour tous les composants de l'API.";
$tache->done=true;
$tache->save();

$tache = new Tache;
$tache->id=5;
$tache->user_id=2;
$tache->projet_id=2;
$tache->title="Déterminer un nom pour l'API";
$tache->body="Déterminer un nom court, facilement mémorable correspondant avec l'esprit de l'API.";
$tache->done=true;
$tache->save();

$tache = new Tache;
$tache->id=6;
$tache->user_id=3;
$tache->projet_id=2;
$tache->title="Créer une maquette papier";
$tache->body="Créer une maquette papier representant chacun des éléments ainsi que leurs design & fonctionnalités.";
$tache->done=true;
$tache->save();

factory('App\Projet',50)->create()


