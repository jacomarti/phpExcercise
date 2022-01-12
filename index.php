<!doctype html>
<html class="no-js" lang="it">

<head>
  <!--head settings -->
  <meta charset="utf-8">
  <title>Invia la tua cartolina</title>
  <meta name="description" content="Invia la tua cartolina">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <meta name="theme-color" content="#fafafa">

  <!--script for the async request -->
  <script>
    function sendPostcard(){
      const postcardEndpoint = "sendPostcard.php";
      let form = new FormData($('#sendPostcard')[0]);
      const request = new Request(postcardEndpoint, {method:"POST", body:form});
      fetch(request).
        then(response => {
          if(response.status === 200) {
              response.text().then(function (text){
              $("#resultSection").html('<h1> Ecco il risultato:</h1>'+text);
            });
          } else if (response.status === 500){
            $("#errorModal").modal('show');
          }
        });
    };
  </script>
</head>

<body>
  <!-- error modal -->
  <div class="container">
    <div class="modal" tabindex="-1" id="errorModal" data-toggle="modal" data-target="#myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Errore!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Qualcosa è andato storto, riprovare!</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
          </div>
        </div>
      </div>
    </div>

    <h1>Invia la tua cartolina</h1>
    <form id="sendPostcard">
      <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input required type="text" name="name" id="name" placeholder="Inserisci qui il nome del destinatario..." class="form-control">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input required type="email" name="email" id="email" placeholder="Inserisci qui l'email del destinatario..." class="form-control">
      </div>
      <div class="mb-3">
        <libel for="message" class="form-label">Messaggio</label>
        <textarea required name="message" id="message" class="form-control" placeholder="Inserisci qui il testo del messaggio..."></textarea>
      </div>
      <div class="mb-3">
        <label for="event" class="form-label">Evento</label>
        <select required class="form-select" name="event" id="event">
          <option value="A">Anno Nuovo</option>
          <option value="B">Battesimo</option>
          <option value="C">Compleanno</option>
        </select>
      </div>
      <div class="mb-3">
        <button type="button" onclick="sendPostcard()" class="btn-primary form-control">Invia</button>
      </div>
    </form>

    <div id="resultSection">
    </div>
    
  </div>
</body>

</html>
