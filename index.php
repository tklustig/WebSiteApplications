<?php
session_start();

function makeDownload($file) {
    header("Content-Disposition: attachment; filename=\"$file\"");
    header("Content-Length: " . filesize($file));
    header("Content-Type: application/octet-stream;");
    readfile($file);
}

function dateiGroesse($file) {
    if (!file_exists($file))
        return 0;
    else {
        $size = filesize($file);
        $massEinheit = array("Byte", "KB", "MB");

        foreach ($massEinheit as $potenz => $Einheit) {
            if ($size / pow(1024, $potenz) < 1024)
                return number_format($size / pow(1024, $potenz), 1, ",", ".") . ' ' . $Einheit;
        }
    }
}

function senden($content) {
//$url = 'index.php';
    try {
        $_SESSION['message'] = $content;
        $heute = date("Y-m-d H:i:s");
        $to = 'kipp.thomas@tklustig.de';
        $subject = 'Installationsprobleme u.a.';
        $nachricht = "eine neue Message vom " . $heute . ":<br>" . $content;
        $fromName = "Thomas Kipp";
        $fromEmail = "kipp.thomas@tklustig.de";
        $header = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $header .= 'From:  ' . $fromName . ' <' . $fromEmail . '>' . " \r\n" .
                'Reply-To: ' . $fromEmail . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        $umlaute = array("ä", "ö", "ü", "Ä", "Ö", "Ü", "ß");
        $ersetzen = array("ae", "oe", "ue", "Ae", "Oe", "Ue", "ss");
        $send_mail = str_replace($umlaute, $ersetzen, $nachricht);
        mail($to, $subject, $send_mail, $header);
        $datei = fopen("nachricht.txt", "a+");
        $ausgabe = "$nachricht\r\n";
        echo"Folgende Parameter wurden verschickt:<br><br>Absender:$fromEmail<br>Empfänger:$to<br>Betreff:$subject<br>$nachricht<br>Rumpf:$header";
        fputs($datei, $heute);
        fputs($datei, $ausgabe); // schreibt die Nachricht i.d.Datei
        fclose($datei);
    } catch (Exception $e) {
        print_r($e->getMessage() . ' at line ' . $e->getLine() . ' in file ' . $e->getFile());
        return;
    }
}

$filename1 = "SchachClient.zip";
$filename2 = "Vokabeltrainer.zip";
$filename3 = "PuzzleGame.zip";
$filename4 = "Backgammon.zip";
$filename5 = "Memory.zip";
$filename6 = "DirectX_SpaceDemo.zip";
$filename7 = "Snaker.zip";
$filename8 = "SpaceShooter.zip";
$filename9 = "Halma.zip";

if (!empty($_REQUEST["download1"])) { // Prüfe ERST, ob das Formular schon gesendet wurde (= Ein Knopf gedrückt wurde)
    if (file_exists($filename1) && isset($_SESSION['boolIsSolved']) && $_SESSION['boolIsSolved'] == true) {
        makeDownload($filename1);
    } else {
        echo("<center><h2>Datei nicht existent oder Captcha nicht korrekt gelöst</h3></center>");
    }
}
if (!empty($_REQUEST["download2"])) {
    if (file_exists($filename2)) {
        makeDownload($filename2);
    } else {
        echo("<center><h3>Datei nicht existent</h3></center>");
    }
}
if (!empty($_REQUEST["download3"])) {
    if (file_exists($filename3)) {
        makeDownload($filename3);
    } else {
        echo("<center><h3>Datei nicht existent</h3></center>");
    }
}
if (!empty($_REQUEST["download4"])) {
    if (file_exists($filename4)) {
        makeDownload($filename4);
    } else {
        echo("<center><h3>Datei nicht existent</h3></center>");
    }
}
if (!empty($_REQUEST["download5"])) {
    if (file_exists($filename5)) {
        makeDownload($filename5);
    } else {
        echo("<center><h3>Datei nicht existent</h3></center>");
    }
}
if (!empty($_REQUEST["download6"])) {
    if (file_exists($filename6)) {
        makeDownload($filename6);
    } else {
        echo("<center><h3>Datei nicht existent</h3></center>");
    }
}
if (!empty($_REQUEST["download7"])) {
    if (file_exists($filename7)) {
        makeDownload($filename7);
    } else {
        echo("<center><h3>Datei nicht existent</h3></center>");
    }
}
if (!empty($_REQUEST["download8"])) {
    if (file_exists($filename8)) {
        makeDownload($filename8);
    } else {
        echo("<center><h3>Datei nicht existent</h3></center>");
    }
}
if (!empty($_REQUEST["download9"])) {
    if (file_exists($filename9)) {
        makeDownload($filename9);
    } else {
        echo("<center><h3>Datei nicht existent</h3></center>");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta charset='utf-8'><!-- charset[utf-8:]  definiert den deutschen Zeichensatz -->
        <meta name='msvalidate.01' content='8B12875037645A4090EE64488042FDA9' /><!--validiert die Website für Bing und Yahoo-->
        <meta name='date' content='2017-02-3T08:49:37+02:00'>		<!-- Angaben, wann die Seite publiziert wurde-->
        <meta name='keywords' content='DownloadArea'>	<!-- versorgt die Spider der Suchmaschinen mit Informationen zwecks Suchbegriffen -->
        <meta name='description' content='myWebSites und Downloads'>	<!-- Beschreibung, die in den Suchmaschinen erscheinen soll. -->
        <meta name='robots' content='index,follow'>			<!-- Links sollen mitindiziert werden //NOINDEX:Seite soll nicht aufgenommen werden//NOFOLLOW Links werden nicht verfolgt-->
        <meta name='audience' content='alle'>				<!-- definiert die Zielgruppe der Website  -->
        <meta name='page-topic' content='Dienstleistung'>		<!-- Zuordnungsdefinition für die Suchmaschine -->
        <meta name='revisit-after' CONTENT='7 days'>			<!-- definiert den erneuten Besuch des Spiders//hier:nach sieben Tagen  -->
        <title>Login Done</title>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
        <link rel='icon' href='data:;base64,iVBORw0KGgo='>
        <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
        <script src='plugin/ckeditor/ckeditor.js'></script>
        <script src='js/Alert.js'></script>
        <script src='js/detectBrowser.js'></script>
        <link href='css/style.css' rel='stylesheet'>
    </head>
    <body>
        <script>
            var breiteCheck = window.innerWidth < 990 ? true : false;
            if (breiteCheck) {
                var alertWidth = 350;
                var alertHeight = 200;
                var xAlertStart = screen.top;
                var yAlertStart = screen.left;
                var alertTitle = "<p class='pTitle'><strong>! Warnung !</strong></p>";
                var alertText = "<p class='pAlert'>Für die mathematische Dummheit von Smartphonebenutzern ist diese Website ungeeignet!</p>";
                showAlert(alertWidth, alertHeight, xAlertStart, yAlertStart, alertTitle, alertText);
            }
            var output = detect();
            document.body.innerHTML = output;
        </script>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Home
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">      
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="phpinfo.php" target="_blank">PHP Info</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            My Websites
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="http://tklustig.de/Bewerbungen/index.php" target="_blank">Bewerbungen</a>
                            <a class="dropdown-item" href="http://tklustig.de/temperatur/index.php" target="_blank">Temperaturmessungen</a>
                            <a class="dropdown-item" href="http://tklustig.de/Yii2_ErkanImmo/frontend/web/index.php"target="_blank">Maklerapplikation(Demoversion)</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="col-md-12">
            <img class="imgCounter" src="counter.php" title="Pic1" alt="Picture1">
        </div>
        <div class="jumbotron">
            <div class = "container">
                <div class="row">                  
                    <!--   <form action="senden.php" class="form-inline" method="post" > -->
                    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-inline" method="post">                    
                        <div class="col-md-6">
                            <div class="page-header">
                                <h2>Downloadbereich <small>Laden Sie meine Applikationen runter.... </small></h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nachrichten hier!</label>
                                <textarea  rows="6"cols="175" id="comment"  name="MsgBox" placeholder="MessageBox:Nachrichten hier!"><?php
                                    if (!empty($_SESSION['message'])) {
                                        echo $_SESSION['message'];
                                    }
                                    ?>
                                </textarea>
                                <script>
                                    CKEDITOR.replace('comment');
                                </script>
                            </div>

                            <br>
                            <input type="submit" name="message" class="btn btn-success btn-sm"  value="Absenden">
                            <button class="btn btn-primary btn-sm" onclick="Reload()">Reload Page</button>
                        </div>
                        <input class="solve" type=text name="cap" placeholder="Captcha:">
                        <input class="butCap" type="submit" name="push" value="Loesen">
                    </form>
                </div>
                <div class="row">

                    <div class="well">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="alert alert-info" role="alert">Pushen Sie auf einen der Downloadbuttons, um die entsprechende Applikation runterzuladen. Entpacken Sie die komprimierte Datei in einen beliebigen Ordner und starten Sie die jeweilige EXE-Datei.</div>
                                <ul>
                                    <li>
                                        Bei Problemen lesen Sie - sofern vorhanden- die ReadmeFirst.txt aufmerksam durch
                                    </li>
                                    <li>
                                        Sollten dennoch Probleme während der Installation auftreten, die Applikation läuft partout nicht, dann schicken Sie mir bitte eine Nachricht in der MessageBox.
                                    </li>
                                    <li>
                                        u.U. kann die Zip File durch den Download beschädigt und somit nicht extrahiert werden. In diesem Falle hilft <a href="https://www.diskinternals.com/zip-repair/" target="_blank">dieses</a> Tool weiter.
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <div class="table-responsive">
                                    <form action="<?= $_SERVER['SCRIPT_NAME']; ?>"  method="post" >
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>Rubrik</th>
                                                    <th>Applikation</th>
                                                    <th>Programmiersprache</th>
                                                    <th>Download</th>
                                                    <th>Dateigröße(Bytes)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Logik</td>
                                                    <td>Schach-Client</td>
                                                    <td>C#</td>
                                                    <td><input type="submit" name="download1" class="btn btn-info btn-sm" value="<?= $filename1; ?>"></td>
                                                    <td><?= dateiGroesse($filename1); ?></td>
                                                </tr>                        
                                                <tr>
                                                    <td>Sprachen</td>
                                                    <td>Vokabeltrainer</td>
                                                    <td>C#</td>
                                                    <td><input type="submit" name="download2" class="btn btn-info btn-sm"  value="<?= $filename2; ?>"></td>
                                                    <td><?= dateiGroesse($filename2); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>DirectX</td>
                                                    <td>Puzzle zusammen setzen</td>
                                                    <td>DarkBasic</td>
                                                    <td><input type="submit" name="download3" class="btn btn-info btn-sm" value="<?= $filename3; ?>"></td>
                                                    <td><?= dateiGroesse($filename3); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Glück</td>
                                                    <td>Backgammon (Human vs. PC)</td>
                                                    <td>VB.NET</td>
                                                    <td><input type="submit" name="download4" class="btn btn-info btn-sm" value="<?= $filename4; ?>"></td>
                                                    <td><?= dateiGroesse($filename4); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Logik</td>
                                                    <td>Memory(special edition)</td>
                                                    <td>C#</td>
                                                    <td><input type="submit" name="download5" class="btn btn-info btn-sm" value="<?= $filename5; ?>"></td>
                                                    <td><?= dateiGroesse($filename5); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>DirectX</td>
                                                    <td>3D Shooter (Demoversion)</td>
                                                    <td>C++</td>
                                                    <td><input type="submit" name="download6" class="btn btn-info btn-sm" value="<?= $filename6; ?>"></td>
                                                    <td><?= dateiGroesse($filename6); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>DirectX</td>
                                                    <td>Spiel</td>
                                                    <td>DarkBasic</td>
                                                    <td><input type="submit" name="download7" class="btn btn-info btn-sm" value="<?= $filename7; ?>"></td>
                                                    <td><?= dateiGroesse($filename7); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>DirectX</td>
                                                    <td>Spiel</td>
                                                    <td>DarkBasic</td>
                                                    <td><input type="submit" name="download8" class="btn btn-info btn-sm" value="<?= $filename8; ?>"></td>
                                                    <td><?= dateiGroesse($filename8); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Logik</td>
                                                    <td>Halma</td>
                                                    <td>C#</td>
                                                    <td><input type="submit" name="download9" class="btn btn-info btn-sm" value="<?= $filename9; ?>"></td>
                                                    <td><?= dateiGroesse($filename9); ?></td>
                                                </tr>										
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function Reload() {
                alert("Inhalt wird über JavaScript neu geladen...");
                location.reload();
            }
        </script>
        <?php
//verarbeite Trigger1: Absenden-Submitbutton wurde gepusht und Messagebox ist nicht leer
        if (isset($_REQUEST['message']) && !empty($_REQUEST['MsgBox'])) {
            senden($_REQUEST['MsgBox']);

//verarbeite Trigger2:Absenden-Submitbutton wurde gepusht und Messagebox ist leer
        } else if (isset($_REQUEST['message']) && empty($_REQUEST['MsgBox'])) {
            ?>
            <script>
                var alertWidth = 350;
                var alertHeight = 200;
                var xAlertStart = window.innerWidth / 2 - alertWidth / 2;
                var yAlertStart = window.innerHeight / 2 - alertHeight / 2;
                var alertTitle = "<p class='pTitle'><strong>! Warnung !</strong></p>";
                var alertText = "<p class='pAlert'>Bitte vermeiden Sie unnötigen Traffic und schreiben Sie eine Nachricht.</p>";
                showAlert(alertWidth, alertHeight, xAlertStart, yAlertStart, alertTitle, alertText);
            </script>
            <?php
        }
//verarbeite Trigger3: Loesen-Submittbutton wurde gedrückt und Captchabox ist leer
        if (isset($_REQUEST['push']) && empty($_REQUEST['cap'])) {
            ?>
            <script>
                var alertWidth = 350;
                var alertHeight = 200;
                var xAlertStart = window.innerWidth / 2 - alertWidth / 2;
                var yAlertStart = window.innerHeight / 2 - alertHeight / 2;
                var alertTitle = "<p class='pTitle'><strong>! Warnung !</strong></p>";
                var alertText = "<p class='pAlert'>Bitte Captchacode eingeben";
                showAlert(alertWidth, alertHeight, xAlertStart, yAlertStart, alertTitle, alertText);
            </script>
            <?php
            //verarbeite Trigger4:Loesen-Submitbutton wurde gedrückt und Captchbox ist nicht leer
        } else if (isset($_REQUEST['push']) && !empty($_REQUEST['cap'])) {
            //verarbeite Trigger4.1:Captcha wurde korrekt eingegeben
            if (isset($_SESSION['captcha']) && $_REQUEST['cap'] == $_SESSION['captcha']['code']) {
                $_SESSION['boolIsSolved'] = true;
                ?>
                <script>
                    var alertWidth = 350;
                    var alertHeight = 200;
                    var xAlertStart = window.innerWidth / 2 - alertWidth / 2;
                    var yAlertStart = window.innerHeight / 2 - alertHeight / 2;
                    var alertTitle = "<p class='pTitle'><strong>! Warnung !</strong></p>";
                    var alertText = "<p class='pAlert'>Captcha wurde gelöst";
                    showAlert(alertWidth, alertHeight, xAlertStart, yAlertStart, alertTitle, alertText);
                </script>
                <?php
                //verarbeite Trigger5:Captcha wurde inkorrekt eingegeben
            } else {
                $_SESSION['boolIsSolved'] = false;
                ?>
                <script>
                    var alertWidth = 350;
                    var alertHeight = 200;
                    var xAlertStart = window.innerWidth / 2 - alertWidth / 2;
                    var yAlertStart = window.innerHeight / 2 - alertHeight / 2;
                    var alertTitle = "<p class='pTitle'><strong>! Warnung !</strong></p>";
                    var alertText = "<p class='pAlert'>Captcha wurde nicht gelöst";
                    showAlert(alertWidth, alertHeight, xAlertStart, yAlertStart, alertTitle, alertText);
                </script>
                <?php
            }
        }
        require_once ("SimplePhpCaptcha.php");
        $_SESSION['captcha'] = simple_php_captcha();
        $captcha = '<img class="imgCaptcha" src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';
        echo $captcha;
        $_REQUEST = array();
        ?>
    </body>
</html>
