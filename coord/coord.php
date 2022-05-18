<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <title>Coordonnées des points matérialisés</title>
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
    <header>
      <img src="../img/logo_ensg" alt="logo de l'ENSG" height="150px">
      <div id='title'>
        <h1>Coordonnées des points matérialisés</h1>
      </div>
    </header>

    <div id='content'>
      <a href="..\index.html"> Retour accueil</a>
      <?php
      // debut du tableau (2 premières lignes)
      echo '<table>
              <thead>
                  <tr>
                      <th colspan="1">Point connu</th>
                      <th colspan="2">Coordonnées CC49</th>
                      <th colspan="2">Coordonnées GPS</th>
                  </tr>
              </thead>
              <tbody>
                <tr>
                    <td>Nom</td>
                    <td>X, Est</td>
                    <td>Y, Nord</td>
                    <td>Latitude</td>
                    <td>Longitude</td>
                </tr>';
      // remplissage du tableau
      $file = file('coordonnees.txt');
      $i = 0;
      foreach ($file as $line) {
         $data[] = str_getcsv($line, ',');
         echo '<tr><td><a href="../clous/'.$data[$i][0].'.html" target="point">'.$data[$i][0].'</a></td>';
         echo '<td>'.$data[$i][1].'m</td>';
         echo '<td>'.$data[$i][2].'m</td>';
         echo '<td>'.$data[$i][3].'°</td>';
         echo '<td>'.$data[$i][4].'°</td></tr>';
         // echo '<tr><td>'.implode('</td><td>', $data[$i]).'</td></tr>';
         $i += 1;
      }

      // fermeture du tableau
      echo '</tbody>
          </table>';
      ?>
      <a href="coordonnees.txt" target='_blank'><button class="btn">Télécharger les coordonnées</button></a>
      <a href="Comp3D.pdf" target='_blank'><button class="btn">Télécharger le calcul Comp3D</button></a>
    </div>

    <footer>
      <p><a href="DocTerrain/index.htm" target='_blank' title="documentation temporaire">Documentation terrain</a></p>
      <p>© Images et textes par BENOIT-GONIN Cléis, FEUILLATRE Guillaume et POITIER Pablo</p>
      <p>© Site réalisé par BENOIT-GONIN Cléis | 2022</p>
    </footer>

  </body>
</html>
