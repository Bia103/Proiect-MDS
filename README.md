# Music Hall Of Fame
---

## Descrierea proiectului


Proiectul „Music Hall Of Fame” este o aplicație web care se folosește de limbajele HTML, CSS, PHP, SQL și JavaScript pentru a implementa un site adresat pasionaților de muzică, pe care utilizatorii își pot face cont și pot realiza diverse acțiuni asupra bazei de date care conține melodii și alte elemente conexe (de exemplu: numele artiștilor care interpretează melodia, numele albumului din care face parte melodia etc.). 

## Conținutul repository-ului

Versiunea finală cu toate funcționalitățile implementate se găsește în folderul [The End of The Hell - Version Finale](https://github.com/Bia103/Proiect-MDS/tree/master/The%20End%20of%20The%20Hell%20-%20Version%20Finale).

Structura acestui folder este următoarea:

- folder-ul [Browser](https://github.com/Bia103/Proiect-MDS/tree/master/The%20End%20of%20The%20Hell%20-%20Version%20Finale/Browser) care conține fișiere php corespunzătoare paginilor de căutare implementate în cadrul proiectului(search.php, searchByLatest.php, searchByMostSearched.php).

- folder-ul [Css](https://github.com/Bia103/Proiect-MDS/tree/master/The%20End%20of%20The%20Hell%20-%20Version%20Finale/Css) care conține toate fișierele folosite pentru stilizarea paginilor.

 - folder-ul [Database](https://github.com/Bia103/Proiect-MDS/tree/master/The%20End%20of%20The%20Hell%20-%20Version%20Finale/Database) care conține baza de date folosită de aplicația web.
 
 - folder-ul [Images](https://github.com/Bia103/Proiect-MDS/tree/master/The%20End%20of%20The%20Hell%20-%20Version%20Finale/Images) care conține imaginile folosite.
 
 - folder-ul [Muzica](https://github.com/Bia103/Proiect-MDS/tree/master/The%20End%20of%20The%20Hell%20-%20Version%20Finale/Muzica) care conține fișierele audio corespunzătoare melodiilor folosite.
 
 - folder-ul [PageOf](https://github.com/Bia103/Proiect-MDS/tree/master/The%20End%20of%20The%20Hell%20-%20Version%20Finale/PageOf) care conține fișiere php auxiliare, de exemplu, folosite pentru afișearea diverselor informații (date despre un album muzical, despre un utilizator, despre un playlist etc).
 
 - fișierele php principale ale aplicației web:
 
        - connect.inc.php
        
        - dashboard.php
        
        - index.php
       
        - menu.php
        
        - myFriends.php
        
        - register.php

De asemenea, în cadrul repository-ului se găsește documentația proiectului în format pdf ([aici](https://github.com/Bia103/Proiect-MDS/blob/master/Documentatie.pdf)).

Au fost create 3 branch-uri:

        -	master: proiectul principal (unde se afla varianta finala a proiectului)
        
        -	menu: proiectul care cuprinde meniul site-ului  
        
        -	testXAMPP: codul sursa realizat pentru conexiunea cu baza de date prin intermediul aplicației 
            XAMPP (pentru restul site-ului s-a folosit MAMP). Acest branch a fost unit cu master (merge).


## Video de prezentare

Video-ul de prezentare al proiectului se găsește [aici](https://www.youtube.com/watch?v=dPKEOQCcJ-A&feature=youtu.be).

## Diagrama UML

În diagrama următoare se pot observa acțiunile pe care le poate face utilizatorul aplicației prin intermediul paginilor web, cât și interdependențele dintre paginile web. 

![image](https://user-images.githubusercontent.com/49486605/84697549-05a5f800-af57-11ea-9982-850c31df7046.png)
    
