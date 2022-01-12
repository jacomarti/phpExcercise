# Esercizio "postcards" - versione PHP vanilla

## Richieste dell'esercizio

* come utente, posso inserire il nome e l'indirizzo e-mail di un destinatario
* come utente, posso inserire un messaggio personalizzato
* come utente, posso scegliere una parola chiave corrispondente all'evento
* il sistema seleziona un'immagine casuale da un elenco (o da un servizio online) in base alla parola chiave selezionata
* il sistema costruisce un messaggio e-mail con l'immagine e il messaggio personalizzato e lo invia al destinatario

## Descrizione del progetto

Il progetto si compone di 3 file:

* **functions.php**: il file che contiene le funzioni usate
* **index.php**: la pagina dell'applicativo vero e proprio con il form per l'utente
* **sendPostcard.php**: il file usato come endpoint per la richiesta di invio dell'email

Per la grafica della pagina dell'applicativo viene utilizzato Bootstrap

Per gli script nella pagina dell'applicativo viene usato un mix di JavaScript vanilla e jQuery

## Testing

Per effettuare il testing mi sono servito sia del comando `php -S localhost:port` per eseguire l'applicativo che del programma [MailSlurper](https://www.mailslurper.com/) per creare un server smtp per provare la funzione di invio mail

## Requirements

* PHP 8.0 or higher
