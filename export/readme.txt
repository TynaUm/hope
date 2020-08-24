2020-04-10 / Walter Jaich
*****************************

1) Strukturieren des Projektverzeichnisses:
 Projektverzeichnis mit Unterverzeichnisse:  
   img   
   js   
  css   
  export

2) Wiederverwendete Teile sind in PHP Dateien ausgelagern:  
  mainHeader.php  
  mainFooter.php  
  navbar.php

3) Aufteilung CSS und Javascript dateien:   i) Code der für alle Seiten verwendet werden:      - main.css      - main.js
   ii) "Seitenspezifische Code :     
       z.B.: für index.html     
             - index.css     
             - index.js

    Ich würde vorschlagen das Sie diese für alle Seiten mal anlegen, auch wenn sie derzeit nicht 
    gebraucht werden - dann bleiben sie halt leer.

3) Als Seiten werden die PHP Dateien aufgerufen ( Index.php - Statt index.html)

4) Ich hab Ihnen mal das Framework (ohne Inhalt) für die Seiten:  
     - login.php und   
     - register.php      
  erstellt (die restlichen Seiten dann noch selber erstellen)

5) Index - Seite:   
   i) keine Inline-Styles im HTML verwenden (style="...") 
      -> Alle Style in der CSS Datei definieren (sind jetzt in CSS ausgelagert)

   ii) kein mehrfachen Zeilenumbrüche <br><br>...... in HTML verwenden um Text zu positionieren ! 
     -> Die Inhalte in CSS positionieren (siehe index.CSS)- z.B:

	.header {
 	  display:block;
	   position:relative;
	   top:40px;
	}

	.spenden {
	   display:block;
 	  position:relative;
 	  top:40px;
	}

    Wenn die obigen Punkte nicht beachtet werden, dann verlieren Sie die Möglichkeit die Styles und Positionierungen responsive zu gestalten. Im Allgemeinen sollte man immer den Inhalt und die Gestaltung trennen.

   iii) Ich habe Ihnen noch den Text des Teaserbildes reponsive gestaltet, 
      Sie können das dann auch noch bei dem restlichen Text der Indexseite probieren. (Textgröße oder Positionierung anpassen)

6) CSS- Dateien:  Media Queries
   Das erste Media Query hab ich entfernt (ist eigentlich nicht notwendig) :Alle CSS Definitionen die ganz oben abgegeben wurden sind immer gültig, außer Sie werden durch eine CSS - Definition die unterhalb ist überschrieben. 
   D.H man kann dann durch die Media-Queries unterhalb für kleinere Geräte gezielt bestimmte Eigenschaften überschreiben.

7) hope- Image
   Hab das Hope - Image transparent und ohne Rand gemacht:
   -> dann sieht man den Unterschied von den Weiss-Schattierungen nicht-> Auf Ausrichtung achten  - siehe Padding Anweisungen in CSS ("CSS-Box Modell")

8) Anmerkungen zum Menü:
   i)    das Hope Image mit der Index-Seite verlinkenii)   "Hauptmenü" umbenennen auf "Home oder Startseite"iii)   Menüeintrag "Register" fehlt noch.

9) Formulare
   i) nocheinmal der Link zum Beispile des PHP-Login Scripts :https://www.php-einfach.de/experte/php-codebeispiele/loginscript/ 
 
   ii) Anbei noch ein Link wo Formulare allgemein recht gut beschrieben sind
   
   https://www.mediaevent.de/html/html-formular-beispiel.html 

   bzw. die Seiten von W3schools:

   https://www.w3schools.com/html/html_forms.asp  
   https://www.w3schools.com/php/php_forms.asp  


   iii) für die Gestaltung:  Bootstrap:
   
   https://getbootstrap.com/docs/4.0/components/forms/ 


***************************************************************************************************************************